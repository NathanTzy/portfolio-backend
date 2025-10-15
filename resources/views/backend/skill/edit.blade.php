@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Skill</h2>

    <form action="{{ route('skills.update', $skill) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name">Nama Skill</label>
            <input type="text" name="name" class="form-control" value="{{ $skill->name }}" required>
        </div>

        <div class="mb-3">
            <label>Detail Skill</label>
            <div id="detail-wrapper">
                @foreach($skill->details as $detail)
                    <div class="d-flex mb-2 detail-item">
                        <input type="text" name="details[]" value="{{ $detail }}" class="form-control me-2" required>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeDetail(this)">X</button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addDetail()" class="btn btn-sm btn-secondary">+ Tambah Detail</button>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
function addDetail() {
    const wrapper = document.getElementById('detail-wrapper');
    const div = document.createElement('div');
    div.className = "d-flex mb-2 detail-item";

    const input = document.createElement('input');
    input.type = "text";
    input.name = "details[]";
    input.className = "form-control me-2";
    input.placeholder = "Isi detail...";
    input.required = true;

    const btn = document.createElement('button');
    btn.type = "button";
    btn.className = "btn btn-danger btn-sm";
    btn.innerText = "X";
    btn.onclick = function() { removeDetail(btn); };

    div.appendChild(input);
    div.appendChild(btn);
    wrapper.appendChild(div);
}

function removeDetail(button) {
    const wrapper = document.getElementById('detail-wrapper');
    // jangan hapus kalau tinggal 1 item
    if (wrapper.querySelectorAll('.detail-item').length > 1) {
        button.parentElement.remove();
    } else {
        alert("Minimal harus ada 1 detail!");
    }
}
</script>
@endsection
