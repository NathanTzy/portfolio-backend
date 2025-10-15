@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kontak</h2>

    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">+ Tambah Kontak</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Nama</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->title }}</td>
                    <td>{{ $contact->name }}</td>
                    <td><a href="{{ $contact->link }}" target="_blank">{{ $contact->link }}</a></td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin mau hapus kontak ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
