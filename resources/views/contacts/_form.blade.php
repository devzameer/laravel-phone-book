@php
    $isEdit = isset($contact);
    $submitLabel = $submitLabel ?? ($isEdit ? 'Update Contact' : 'Save Contact');
@endphp

<div class="row g-4">
    <div class="col-12 col-xl-4">
        <div class="surface-card p-4 h-100">
            <div class="text-uppercase small fw-semibold text-muted mb-2">Contact Avatar</div>
            @if ($isEdit && $contact->profile_image)
                <img src="{{ asset('storage/' . $contact->profile_image) }}" alt="{{ $contact->name }}" class="img-fluid rounded-4 border mb-3" style="width:100%;max-height:280px;object-fit:cover;">
            @else
                <div class="soft-card d-flex align-items-center justify-content-center mb-3" style="height:280px;">
                    <div class="text-center">
                        <div class="avatar-circle mx-auto mb-3" style="width:88px;height:88px;font-size:2rem;">{{ $isEdit ? strtoupper(substr($contact->name, 0, 1)) : 'PB' }}</div>
                        <div class="fw-semibold">Profile image preview</div>
                        <div class="subtle-text small">Upload a clean image for a polished contact record.</div>
                    </div>
                </div>
            @endif

            <label class="form-label fw-semibold">Profile Image</label>
            <input type="file" name="profile_image" class="form-control rounded-4" accept="image/*">
            <div class="form-text">Allowed formats: JPG, JPEG, PNG, WEBP. Max size 2 MB.</div>
        </div>
    </div>

    <div class="col-12 col-xl-8">
        <div class="surface-card p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" class="form-control form-control-lg rounded-4" placeholder="Enter contact name">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" class="form-control form-control-lg rounded-4" placeholder="Enter email address">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="form-control form-control-lg rounded-4" placeholder="Enter phone number">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', isset($contact) && $contact->date_of_birth ? $contact->date_of_birth->format('Y-m-d') : '') }}" class="form-control form-control-lg rounded-4">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea name="address" rows="4" class="form-control rounded-4" placeholder="Enter address">{{ old('address', $contact->address ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Notes</label>
                    <textarea name="notes" rows="4" class="form-control rounded-4" placeholder="Add notes about this contact">{{ old('notes', $contact->notes ?? '') }}</textarea>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-end mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-light rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-brand rounded-pill px-4 fw-semibold">{{ $submitLabel }}</button>
            </div>
        </div>
    </div>
</div>