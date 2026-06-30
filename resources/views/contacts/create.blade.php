@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="surface-card p-4 mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3 align-items-md-center">
            <div>
                <div class="text-uppercase small fw-semibold text-muted mb-2">Contacts</div>
                <h1 class="page-title mb-1">Create Contact</h1>
                <p class="subtle-text mb-0">Add a new person to your dashboard.</p>
            </div>
        </div>
    </div>

    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('contacts._form', ['submitLabel' => 'Save Contact'])
    </form>
</div>
@endsection