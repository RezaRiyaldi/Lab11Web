<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface {
    public function before(RequestInterface $request, $arguments = NULL)
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('errors', "Login dulu bre biar asik");
            return redirect()->to('user/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL)
    {
        // Do something here
    }
}