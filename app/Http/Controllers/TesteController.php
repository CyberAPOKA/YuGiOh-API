<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TesteController extends Controller
{
    public function drag()
    {
        return Inertia::render('Teste');
    }
}
