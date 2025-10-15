@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <h2 class="text-3xl font-bold mb-6">Kelola Komentar</h2>

        <div class="flex flex-col gap-4">
            @foreach ($comments as $comment)
                <div class="card p-4 flex flex-col gap-2 bg-gray-800 rounded-lg">
                    <div class="flex justify-between items-center">
                        <!-- Nama bold + tanggal di samping -->
                        <span class="font-semibold text-black">
                            {{ $comment->name }} — {{ $comment->created_at->format('d/m/y') }}
                        </span>


                    </div>

                    <!-- Konten komentar -->
                    <p class="text-white/80 mt-1">{{ $comment->message }}</p>
                    <!-- Tombol hapus -->
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
                            Hapus
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
