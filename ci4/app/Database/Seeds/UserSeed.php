<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeed extends Seeder
{
    public function run()
    {
        $model = model('UserModel');
        $model->insert([
            'username' => 'admin',
            'useremail' => 'admin@hotmail.com',
            'userpassword' => password_hash('admin', PASSWORD_DEFAULT)
        ]);
    }
}
