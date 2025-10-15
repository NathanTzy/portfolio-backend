<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function index()
    {

        $comments = Comment::orderBy('created_at', 'desc')->get();
    
        return view('backend.comment.index', compact('comments'));
    }
    

    // Simpan komentar baru
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Ambil token user dari session, jangan bikin baru setiap kali
        $userToken = session()->get('user_token');
        if (!$userToken) {
            $userToken = Str::random(40);
            session(['user_token' => $userToken]);
        }

        Comment::create([
            'name'       => $request->name,
            'message'    => $request->message,
            'user_token' => $userToken,
        ]);

        return redirect()->back()->with('success', 'Pesan kamu sudah tersampaikan 😎👍');
    }


    // Hapus komentar (user bisa hapus komentar sendiri)
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
    
}
