@extends('layouts.app')
@section('content')
<div class="container-fluid px-0">
    <div class="row g-4 mb-4">
        <div class="col-12 col-xl-8">
            <div class="surface-card p-4 h-100">
                <div class="d-flex flex-column flex-md-row justify-content-between gap-3 align-items-md-center">
                    <div>
                        <div class="text-uppercase small fw-semibold text-muted mb-2">Dashboard</div>
                        <h1 class="page-title mb-2">Contacts Overview</h1>
                        <p class="subtle-text mb-0">Manage your contacts from one place with fast create, edit, and delete actions.</p>
                    </div>
                    <a href="{{ route('contacts.create') }}" class="btn btn-brand rounded-pill px-4 py-2 fw-semibold">Create Contact</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="soft-card p-4 h-100 d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-uppercase small fw-semibold text-muted mb-2">Total Contacts</div>
                    <div class="display-6 fw-bold mb-1">{{ $contactCount }}</div>
                    <div class="subtle-text">Stored in the phone book database</div>
                </div>
                <div class="avatar-circle" style="width:72px;height:72px;font-size:1.5rem;">{{ $contactCount }}</div>
            </div>
        </div>
    </div>

    <div class="surface-card p-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
            <div>
                <h2 class="h4 mb-1">All Contacts</h2>
                <div class="subtle-text">Latest records appear first.</div>
            </div>
            <a href="{{ route('contacts.create') }}" class="btn btn-outline-primary rounded-pill px-4">New Contact</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Notes</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if ($contact->profile_image)
                                        <img src="{{ asset('storage/' . $contact->profile_image) }}" alt="{{ $contact->name }}" class="rounded-circle border" style="width:52px;height:52px;object-fit:cover;">
                                    @else
                                        <div class="avatar-circle">{{ strtoupper(substr($contact->name, 0, 1)) }}</div>
                                    @endif
                                </div>
                            </td>
                            <td class="fw-semibold">{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ optional($contact->date_of_birth)->format('M d, Y') }}</td>
                            <td style="max-width: 240px;">{{ \Illuminate\Support\Str::limit($contact->address, 48) }}</td>
                            <td style="max-width: 240px;">{{ \Illuminate\Support\Str::limit($contact->notes, 48) }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this contact?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">No contacts found. Create the first contact to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $contacts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection