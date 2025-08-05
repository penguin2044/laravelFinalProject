<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatagoryControler extends Controller
{
    public function category()
    {
        if (Auth::user()->admin) {
            $categories = Category::all();
            return view('category', compact('categories'));
        } else {
            return redirect('home');
        }
    }
}
