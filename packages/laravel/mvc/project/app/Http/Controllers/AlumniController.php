<?php

namespace App\Http\Controllers;

use App\Alumnus;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumnus::all();
        return view('alumni.index', [
            'alumni' =>  $alumni
        ]);
    }
}
