<?php

namespace App\Http\Controllers\Historial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        return view('historial.historials.index');
    }
}
