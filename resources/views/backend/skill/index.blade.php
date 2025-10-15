@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Daftar Skill</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">+ Tambah Skill</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>
                    <ul>
                        @foreach($skill->details as $detail)
                            <li>{{ $detail }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('skills.edit', $skill) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus skill ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3">Belum ada skill</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
