@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Skill</h2>

    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama Skill</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Detail Skill</label>
            <div id="detail-wrapper">
                <div class="d-flex mb-2">
                    <input type="text" name="details[]" class="form-control me-2" placeholder="Isi detail...">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeDetail(this)">X</button>
                </div>
            </div>
            <button type="button" onclick="addDetail()" class="btn btn-sm btn-secondary">+ Tambah Detail</button>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
function addDetail(){
    const wrapper = document.getElementById('detail-wrapper');
    const div = document.createElement('div');
    div.className = "d-flex mb-2";
    div.innerHTML = `
        <input type="text" name="details[]" class="form-control me-2" placeholder="Isi detail...">
        <button type="button" class="btn btn-danger btn-sm" onclick="removeDetail(this)">X</button>
    `;
    wrapper.appendChild(div);
}

function removeDetail(button){
    const wrapper = document.getElementById('detail-wrapper');
    if(wrapper.children.length > 1){
        button.parentElement.remove();
    } else {
        alert("Minimal harus ada 1 detail!");
    }
}
</script>
@endsection
