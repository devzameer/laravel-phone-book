<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts\StoreContactRequest;
use App\Http\Requests\Contacts\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactCrudController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = (int) Auth::id();
        $data['profile_image'] = $request->file('profile_image')->store('contact-images', 'public');

        Contact::create($data);

        return redirect()->route('dashboard')->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        $this->ensureUserOwnsContact($contact);

        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->ensureUserOwnsContact($contact);

        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            if ($contact->profile_image) {
                Storage::disk('public')->delete($contact->profile_image);
            }

            $data['profile_image'] = $request->file('profile_image')->store('contact-images', 'public');
        } else {
            unset($data['profile_image']);
        }

        $contact->update($data);

        return redirect()->route('dashboard')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $this->ensureUserOwnsContact($contact);

        if ($contact->profile_image) {
            Storage::disk('public')->delete($contact->profile_image);
        }

        Contact::query()
            ->whereKey($contact->getKey())
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('dashboard')->with('success', 'Contact deleted successfully.');
    }

    private function ensureUserOwnsContact(Contact $contact): void
    {
        abort_if((int) $contact->user_id !== (int) Auth::id(), 404);
    }
}