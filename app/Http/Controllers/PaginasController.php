<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function inicio () {
        return view ("welcome");
    }

    public function quienessomos () {
        return view ("quienessomos");
    }

    public function dondeestamos () {
        return view ("dondeestamos");
    }

    public function foro () {
        return view ("foro");
    }
}
