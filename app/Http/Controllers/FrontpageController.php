<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FrontpageController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }
}
