<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        return view('home.about')
            ->with('title', 'About us - Online Store')
            ->with('subtitle', 'About us')
            ->with('description', 'This is an about page ...')
            ->with('author', 'Developed by: Alejandro Correa');
    }
}
