<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\Authfilter;
use App\Filters\noAuth;
use App\Filters\filterSiswa;
use App\Filters\filterGuru;
use App\Filters\filterAdmin;
class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authfilter'    =>Authfilter::class,
        'noauth'        =>noAuth::class,
        'filterSiswa'        =>filterSiswa::class,
        'filterGuru'        =>filterGuru::class,
        'filterAdmin'        =>filterAdmin::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            'authfilter'=>['except' => 'auth/*'],
            'csrf',
            // 'invalidchars',
        ],
        'after' => [
            
            // 'toolbar',
            // 'authfilter'=>['except' => [
            //     'siswa'=>'siswa',
            //     'admin1'=>'admin',
            //     'admin'=>'admin/*'
            // ]],
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'filterAdmin' =>['before' => ['admin/*']],
        'filterGuru' =>['before' => ['guru/*']],
        'filterSiswa' =>['before' => ['siswa/*']],



    ];
}
