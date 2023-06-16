<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\User;

class AdministratorController extends Controller
{
    public function usuarios(){
        return Inertia::render('Usuarios', [
            'users'=>User::query()
            ->when(Request::input('search'), function($query, $search){
                $query->where('name', 'like', '%' . $search . '%');

            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user)=>[
                'name'=>$user->name,
                'id'=>$user->id
            ]),
            'filter'=>Request::only(['search'])

        ]); 
    }
}
