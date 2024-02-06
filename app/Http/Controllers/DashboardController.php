<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard', ['menu' => 'dashboard']);
    }

    public function age() {
        return view('dashboard', ['menu' => 'age']);
    }

    public function gender() {
        return view('dashboard', ['menu' => 'gender']);
    }

    public function geo() {
        return view('dashboard', ['menu' => 'geo']);
    }
}
