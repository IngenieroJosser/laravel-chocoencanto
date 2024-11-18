<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado con éxito.');
    }

    public function index()
    {
        $comments = Comment::with('user')->get(); // Cargar comentarios con el usuario relacionado
        $users = UserModel::all(); // Obtener todos los registros de la tabla `users`
        
        return view('comments.index', compact('comments', 'users'));
    }
}
