<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); // Certifique-se de que a view 'login.blade.php' existe
    }
}
