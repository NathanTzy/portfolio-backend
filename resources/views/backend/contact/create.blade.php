@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kontak</h2>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Kontak</label>
            <input type="text" name="title" class="form-control" placeholder="Misal: WhatsApp" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Misal: Nathaniello" required>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" class="form-control" placeholder="https://wa.me/..." required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
