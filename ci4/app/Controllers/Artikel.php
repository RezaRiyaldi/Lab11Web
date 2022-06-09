<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends Controller {
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikels = $model->findAll();

        return view('artikel/home', compact('title', 'artikels'));
    }

    public function detail_artikel($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where([
            'slug' => $slug
        ])->first();

        
        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        $title = $artikel['judul'];
        
        return view('artikel/detail_artikel', compact('title', 'artikel'));
    }
}