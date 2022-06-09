<?php

namespace App\Controllers;

class Page extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Home',
            'content' => 'Selamat datang di halaman Home'
        ];

        return view('home', $data);
    }

    // public function article()
    // {
    //     $data = [
    //         'title' => 'Article',
    //         'content' => 'Ini adalah halaman article, banyak hal yang bisa diambil dan dipelajari didalam halaman ini. Enjoy'
    //     ];

    //     return view('article', $data);
    // }

    public function about()
    {
        $data = [
            'title' => "About",
            'content' => "Reza Riyaldi Irawan"
        ];
        return view('about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => "Contact"
        ];
        return view('contact', $data);
    }
}
