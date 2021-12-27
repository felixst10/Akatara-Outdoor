<?php

namespace App\Http\Controllers;


use App\Models\Beranda;
use App\Models\Category;

class BerandaController extends Controller
{
    public function index()
    {
        $title ='';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('beranda', [
            "title" => "Home" . $title,
            "active" => "home",
            "beranda" => Beranda::latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString()
        ]);
    }


    public function show(Beranda $home) //route model binding
    {
        return view('home', [
            "title" => "single post",
            "active" => "home",
            "beranda" => $home
        ]);
    }
}
