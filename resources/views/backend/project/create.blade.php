@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Project</h2>

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name">Nama Project</label>
                <input type="text" name="name" class="form-control" placeholder="Contoh: Portfolio Website" required>
            </div>

            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Ceritakan tentang project ini..."
                    required></textarea>
            </div>

            <div class="mb-3">
                <label for="name">Link Project</label>
                <input type="text" name="link" class="form-control" placeholder="Contoh: https://nathaniello.com" required>
            </div>

            <div class="mb-3">
                <label for="image">Gambar Project</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Teknologi yang Dipakai</label>
                <div id="tech-wrapper">
                    <div class="d-flex mb-2 tech-item">
                        <input type="text" name="technologies[]" class="form-control me-2" placeholder="Contoh: Laravel"
                            required>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeTech(this)">X</button>
                    </div>
                </div>
                <button type="button" onclick="addTech()" class="btn btn-sm btn-secondary">+ Tambah Teknologi</button>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
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
            input.placeholder = "Contoh: Vue.js";
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
