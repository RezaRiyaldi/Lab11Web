<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;

class Artikel extends Controller
{
    protected $artikel;

    public function __construct()
    {
        $this->artikel = new ArtikelModel();
    }

    public function index()
    {
        $title = 'Daftar Artikel';
        $artikels = $this->artikel->findAll();

        return view('artikel/home', compact('title', 'artikels'));
    }

    public function detail_artikel($slug)
    {
        $artikel = $this->artikel->where([
            'slug' => $slug
        ])->first();


        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];

        return view('artikel/detail_artikel', compact('title', 'artikel'));
    }

    public function admin()
    {
        $title = 'Daftar Artikel';
        $artikels = $this->artikel->findAll();

        return view('artikel/admin', compact('title', 'artikels'));
    }

    public function add_artikel()
    {

        $title = 'Tambah Artikel';
        return view('artikel/tambah_artikel', compact('title'));
    }

    public function store()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judulnya diisi dong sayang'
                ],
            ],
            'isi' => [
                'rules' => 'min_length[10]',
                'errors' => [
                    'min_length' => 'Isi konten 10 karakter aja kok, yok bisa yok'
                ]
            ]
        ])) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // var_dump($this->request->getPost()); die();

        $this->artikel->insert([
            'judul' => ucwords(strtolower($this->request->getPost('judul'))),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title(strtolower($this->request->getPost('judul'))),
            'date_created' => Time::now()
        ]);

        session()->setFlashdata('success', 'Berhasil menambah data');
        return redirect()->to('artikel/admin');
    }

    public function edit($slug)
    {
        $data =[
            'title' => 'Edit Artikel',
            'artikel' => $this->artikel->where('slug', $slug)->first()
        ];

        return view('artikel/edit_artikel', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judulnya diisi dong sayang'
                ],
            ],
            'isi' => [
                'rules' => 'min_length[10]',
                'errors' => [
                    'min_length' => 'Isi konten 10 karakter aja kok, yok bisa yok'
                ]
            ]
        ])) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back();
        }

        // var_dump($this->request->getPost()); die();

        $this->artikel->update($id, [
            'judul' => ucwords(strtolower($this->request->getPost('judul'))),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title(strtolower($this->request->getPost('judul')))
        ]);

        session()->setFlashdata('success', 'Berhasil mengubah data');
        return redirect()->to('artikel/admin');
    }

    public function delete($slug)
    {
        if($this->artikel->where('slug', $slug)->first() === NULL) {
            throw PageNotFoundException::forPageNotFound('Data tidak ditemukan!');
        }

        $this->artikel->where('slug', $slug)->delete();

        session()->setFlashdata('success', 'Berhasil hapus data');
        return redirect('artikel/admin');
    }
}
