<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://eventsmap.ru/api/user/registration',
        'http://eventsmap.ru/api/user/listevent',
        'http://eventsmap.ru/api/user/getmarks',
    ];
}
