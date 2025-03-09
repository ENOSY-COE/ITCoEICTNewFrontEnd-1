<?php
namespace App\Http;
    protected $Middleware = [

        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
    ];