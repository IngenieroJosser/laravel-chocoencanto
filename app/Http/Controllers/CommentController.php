<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Asegúrate de incluir esta línea

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(), // Obtener el ID del usuario autenticado
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado con éxito.');
    }

    public function index()
    {
        $comments = Comment::with('user')->get(); // Cargar los comentarios con la relación de usuario
        return view('comments.index', compact('comments'));
    }
}
