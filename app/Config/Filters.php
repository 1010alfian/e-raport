<?php

namespace Config;

use App\Filters\FilterAdmin;
use App\Filters\FilterGuru;
use App\Filters\Filterlogin;
use App\Filters\FilterUser;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'filteradmin' => FilterAdmin::class,
        'filterguru' => FilterGuru::class,
        'filterlogin' => Filterlogin::class,
        'blockUsers' => FilterUser::class,
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
            'csrf',
            'filterlogin' => ['except' => [
                '/', '/*',
            ]],
            
            
        ],
        'after' => [
            'filteradmin' => ['except' =>[
                '/dashboard',
                '403',
                'KelolaGuru', 'KelolaGuru/*',
                'KelolaSiswa', 'KelolaSiswa/*',
                'KelolaMapel', 'KelolaMapel/*',
                'keterampilan', 'keterampilan/*',
            ]],
            'filterguru' => ['except' =>[
                '/dashboard',
                '403',
                'KelolaSiswa', 'KelolaSiswa/*',
                'keterampilan', 'keterampilan/*',
            ]],
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
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
        'isLoggedIn' => [
        ],

    ];
}
