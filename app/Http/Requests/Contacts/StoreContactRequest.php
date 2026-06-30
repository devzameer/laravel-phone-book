<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'profile_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('contacts', 'email')->where(fn ($query) => $query->where('user_id', Auth::id())),
            ],
            'phone' => ['required', 'string', 'min:10', 'max:13'],
            'address' => ['required', 'string', 'max:1000'],
            'date_of_birth' => ['required', 'date', 'before_or_equal:today'],
            'notes' => ['required', 'string', 'max:2000'],
        ];
    }
}