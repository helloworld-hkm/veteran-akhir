<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Authfilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('log')!= true) {
            return redirect()->to(base_url('auth/login'));
        }
        else{
            // return redirect()->to(base_url('admin'));
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
        if (session()->get('log')== true && session()->get('role')== 1 ) {
            return redirect()->to(base_url('admin'));
        }
    }
}