@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp
@php($user = $user ?? auth()->user())

<div class="container-fluid px-0">
    <div class="surface-card p-4 p-md-5 mb-4">
        <div class="row align-items-center g-4">
            <div class="col-12 col-lg-8">
                <div class="text-uppercase small fw-semibold text-muted mb-2">Profile</div>
                <h1 class="page-title mb-2">Edit your personal details</h1>
                <p class="subtle-text mb-0">Keep your account information, contact details, and profile picture up to date.</p>
            </div>
            <div class="col-12 col-lg-4">
                <div class="soft-card p-4 d-flex align-items-center gap-3 justify-content-lg-end">
                    <div class="avatar-circle" style="width:72px;height:72px;font-size:1.4rem;">
                        @if ($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="avatar-image">
                        @else
                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <div class="fw-bold">{{ $user->name }}</div>
                        <div class="subtle-text">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-4">
            <div class="surface-card p-4 h-100">
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="avatar-circle mb-3" style="width:124px;height:124px;font-size:2.25rem;">
                        @if ($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="avatar-image">
                        @else
                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                        @endif
                    </div>
                    <h2 class="h4 mb-1">{{ $user->name }}</h2>
                    <p class="subtle-text mb-3">Tap the avatar in the top-right corner to return here anytime.</p>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <div class="soft-card p-3">
                            <div class="small text-uppercase text-muted fw-semibold mb-1">Email</div>
                            <div class="fw-semibold text-break">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="soft-card p-3">
                            <div class="small text-uppercase text-muted fw-semibold mb-1">Phone</div>
                            <div class="fw-semibold">{{ $user->phone ?? 'Not set' }}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="soft-card p-3">
                            <div class="small text-uppercase text-muted fw-semibold mb-1">Location</div>
                            <div class="fw-semibold">{{ $user->address ? Str::limit($user->address, 70) : 'Not set' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-8">
            <div class="surface-card p-4 p-md-5 h-100">
                <div class="d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center mb-4">
                    <div>
                        <h2 class="h4 mb-1">Update profile</h2>
                        <div class="subtle-text">Edit your personal information and upload a new profile picture.</div>
                    </div>
                    <div class="badge text-bg-light rounded-pill px-3 py-2">Profile is private</div>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="row g-4">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label class="form-label fw-semibold">Profile picture</label>
                        <div class="soft-card p-4 d-flex flex-column flex-md-row align-items-center gap-4">
                            <div class="avatar-circle" style="width:108px;height:108px;font-size:2rem;">
                                @if ($user->profile_image)
                                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="avatar-image">
                                @else
                                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                @endif
                            </div>
                            <div class="flex-grow-1 w-100">
                                <input type="file" name="profile_image" class="form-control rounded-4 @error('profile_image') is-invalid @enderror" accept="image/*">
                                <div class="form-text">PNG, JPG, JPEG, or WEBP. Max 2 MB.</div>
                                @error('profile_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full name</label>
                        <input type="text" name="name" class="form-control rounded-4 @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email address</label>
                        <input type="email" name="email" class="form-control rounded-4 @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone number</label>
                        <input type="text" name="phone" class="form-control rounded-4 @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}" placeholder="03XXXXXXXXX">
                        @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control rounded-4 @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth', optional($user->date_of_birth)->format('Y-m-d')) }}">
                        @error('date_of_birth')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Address</label>
                        <textarea name="address" rows="3" class="form-control rounded-4 @error('address') is-invalid @enderror" placeholder="Enter your address">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Notes</label>
                        <textarea name="notes" rows="4" class="form-control rounded-4 @error('notes') is-invalid @enderror" placeholder="Add a short bio or any useful notes">{{ old('notes', $user->notes) }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex flex-column flex-sm-row gap-3 justify-content-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4">Back to dashboard</a>
                        <button type="submit" class="btn btn-brand rounded-pill px-4">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection