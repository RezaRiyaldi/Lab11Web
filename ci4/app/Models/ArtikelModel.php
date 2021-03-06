<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model {
    protected $table = 'artikel';
    protected $primary = 'id';
    protected $setAutoIncrement = TRUE;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar', 'date_created'];
}