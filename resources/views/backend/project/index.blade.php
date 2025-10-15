@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Daftar Project</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">+ Tambah Project</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Teknologi</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>
                    @if($project->image)
                        <img src="{{ asset('storage/'.$project->image) }}" width="80">
                    @endif
                </td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    <ul>
                        @foreach($project->technologies as $tech)
                            <li>{{ $tech }}</li>
                        @endforeach
                    </ul>
                </td>
                <td><a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></td>
                <td>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus project ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">Belum ada project</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
