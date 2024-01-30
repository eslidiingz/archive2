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
        '/checkout/credit/return',
        'http://127.0.0.1:8000/*',
        'https://paytest.treepay.co.th/*',
        'https://paytest.treepay.co.th/total/*',
        'https://paytest.treepay.co.th/total/CardApprove.tp',
        'https://pay.treepay.co.th/*',
        'https://pay.treepay.co.th/total/*',
        'https://pay.treepay.co.th/total/CardApprove.tp',

    ];
}
