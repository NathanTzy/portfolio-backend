@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>
        <p class="text-muted">Selamat datang di backend portfolio kamu 👋</p>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Skill</h5>
                        <p class="card-text">Kelola daftar keahlianmu</p>
                        <a href="{{ route('skills.index') }}" class="btn btn-primary btn-sm">Kelola</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Project</h5>
                        <p class="card-text">Kelola daftar project</p>
                        <a href="{{ route('projects.index') }}" class="btn btn-primary btn-sm">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Kontak</h5>
                        <p class="card-text">Kelola info kontak</p>
                        <a href="{{ route('contacts.index') }}" class="btn btn-primary btn-sm">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Komen"</h5>
                        <p class="card-text">Kelola Komen</p>
                        <a href="{{ route('comments.index') }}" class="btn btn-primary btn-sm">Kelola</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
