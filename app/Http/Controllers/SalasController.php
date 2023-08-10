<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Profesor;
use App\Models\User;
use App\Models\Clase;
use App\Models\Comment;
use App\Models\Sesion;
use Illuminate\Support\Facades\Redirect;

use App\Models\Post;

class SalasController extends Controller
{
    public function misala(){

        $clase = Clase::with(['contenido'])->where('profesor_id', '=', auth()->user()->profesor->id)->get();
        $posts = Post::with(['comment'])->where('user_id', '=', auth()->user()->id)->paginate(2);

        return Inertia::render('Salas/Misala', [
            'user' => [
                'name' => auth()->user()->name,
                'lastname' => auth()->user()->lastname,
                'username'=> auth()->user()->username,
                'signatures' => auth()->user()->profesor->signature,
                'clases'=> $clase

            ],
            'posts'=>$posts
        ]);
    }

    public function sala(User $user){
        $clase = Clase::with(['contenido'])->where('profesor_id', '=', $user->profesor->id)->get();
        $sesiones=Sesion::with(['clase'])->where('profesor_id', '=', $user->profesor->id)->get();

        if($user->profesor == null){
            return error_log('El usuario no es un profesor');
        }else{
            return Inertia::render('Salas/Sala', [
                'user'=>$user,
                'asignaturas'=>$user->profesor->signature,
                'clases'=>$clase,
                'sesiones'=>$sesiones
            ]);
        }

    }

    public function storepost(Request $request){
        $request->validate([

            'name' => 'required|max:255',
            'body' => 'required|max:750',
            'pkey1' =>'required|max:750',
            'pkey2' =>'required|max:750',
            'discusion'=>'required|bool',
        ]);
        
        Post::create([
            'name' => request('name'),
            'body' => request('body'),
            'pkey1' =>request('pkey1'),
            'pkey2' =>request('pkey2'),
            'discusion'=>request('discusion'), 
            'user_id'=>auth()->user()->id
        ]);


    }



    public function destroypost(Post $post){
        $post->delete();
        return redirect('/inicio');
    }

    public function editarpost(Post $post){

        return Inertia::render('Salas/EditarPost', [
            'post' => $post
        ]);
    }

    public function update(Post $post, Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'body' => 'required|max:750',
            'pkey1' =>'required|max:750',
            'pkey2' =>'required|max:750',
            'discusion'=>'required|bool',
        ]); 

        $post->update([
            'name' => request('name'),
            'body' => request('body'),
            'pkey1' =>request('pkey1'),
            'pkey2' =>request('pkey2'),
            'discusion'=>request('discusion'), 
            'user_id'=>auth()->user()->id
        ]);
    }

    public function storecomment(Request $request, Post $post){
        $request->validate([
            'comment'=>'required',
            'user'=>'required',
        ]);

        Comment::create([
            'comment'=>request('comment'),
            'user_id'=>request('user'),
            'post_id'=>$post->id
        ]);
    }

    public function destroycomment(Comment $comment){
        $comment->delete();
        return redirect('/inicio');
    }

    public function seguirusuario(User $user){
        $actualuser = auth()->user();
        if ($actualuser->id === $user->id) {
            return Redirect::back()->withErrors([
                'miusuario' => 'No puedes seguirte'
            ])->withInput(); 
        }
        $actualuser->following()->attach($user->id);
        return Redirect::route('/inicio');
    }

}
