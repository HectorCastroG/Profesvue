<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Sesion;

class CalendarController extends Controller
{
    public function calendar(){


        $sesion = Sesion::with(['clase'])->where('profesor_id', '=', auth()->user()->profesor->id)->get();
        return Inertia::render('Calendar/Calendar',[
            'sesion'=>$sesion,
            'clases'=>auth()->user()->profesor->clase
        ]);
    }
}
