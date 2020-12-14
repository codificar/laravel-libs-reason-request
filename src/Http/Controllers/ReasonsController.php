<?php

namespace Codificar\ReasonsRequest\Http\Controllers;

use App\Http\Controllers\Controller;

class ReasonsCOntroller extends Controller
{

    public function renderAdd()
    {
        return view('reasons::add');
    }
}