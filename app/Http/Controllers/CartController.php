<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        return Inertia::render('Site/Cart');
    }

    public function checkout()
    {
        return Inertia::render('Site/Checkout');
    }
}
