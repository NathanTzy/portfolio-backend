@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kontak</h2>

    <form action="{{ route('contacts.update', $contact) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul Kontak</label>
            <input type="text" name="title" value="{{ $contact->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $contact->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" value="{{ $contact->link }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
