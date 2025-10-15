@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Project</h2>

        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label for="name">Nama Project</label>
                <input type="text" name="name" class="form-control" value="{{ $project->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control" required>{{ $project->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="name">Link Project</label>
                <input type="text" name="link" class="form-control" placeholder="Contoh: https://nathaniello.com"
                    required>
            </div> 

            <div class="mb-3">
                <label for="image">Gambar Project</label><br>
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" width="120" class="mb-2"><br>
                @endif
                <input type="file" name="image" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>

            <div class="mb-3">
                <label>Teknologi yang Dipakai</label>
                <div id="tech-wrapper">
                    @foreach ($project->technologies as $tech)
                        <div class="d-flex mb-2 tech-item">
                            <input type="text" name="technologies[]" value="{{ $tech }}"
                                class="form-control me-2" required>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeTech(this)">X</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="addTech()" class="btn btn-sm btn-secondary">+ Tambah Teknologi</button>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        function addTech() {
            const wrapper = document.getElementById('tech-wrapper');
            const div = document.createElement('div');
            div.className = "d-flex mb-2 tech-item";

            const input = document.createElement('input');
            input.type = "text";
            input.name = "technologies[]";
            input.className = "form-control me-2";
            input.placeholder = "Contoh: React";
            input.required = true;

            const btn = document.createElement('button');
            btn.type = "button";
            btn.className = "btn btn-danger btn-sm";
            btn.innerText = "X";
            btn.onclick = function() {
                removeTech(btn);
            };

            div.appendChild(input);
            div.appendChild(btn);
            wrapper.appendChild(div);
        }

        function removeTech(button) {
            const wrapper = document.getElementById('tech-wrapper');
            if (wrapper.querySelectorAll('.tech-item').length > 1) {
                button.parentElement.remove();
            } else {
                alert("Minimal harus ada 1 teknologi!");
            }
        }
    </script>
@endsection
