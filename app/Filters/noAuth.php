<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class noAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('log')== true) {
            if (session()->get('role')== 1) {
                return redirect()->to(base_url('admin'));
            }elseif (session()->get('role')== 2) {
                return redirect()->to(base_url('siswa'));
            }
            elseif (session()->get('role')== 3) {
                return redirect()->to(base_url('guru'));
            }
            
        }
        
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}