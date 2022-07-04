<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class filterGuru implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('role')!= 3) {
           if (session()->get('role')== 1) {
                return redirect()->to(base_url('admin'));
            }
            elseif (session()->get('role')== 2) {
                return redirect()->to(base_url('siswa'));
            }
            
        }
        
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}