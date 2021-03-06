<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller.
 */
class Controller extends BaseController
{
    /**
     * The request object.
     *
     * @var \Laravel\Lumen\Application|mixed
     */
    protected $request;

    public function __construct()
    {
        $this->request = app('request');
    }
}
