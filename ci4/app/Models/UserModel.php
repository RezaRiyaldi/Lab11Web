<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}