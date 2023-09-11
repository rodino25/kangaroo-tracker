<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request) {
        return view("home.index");
    }
}
