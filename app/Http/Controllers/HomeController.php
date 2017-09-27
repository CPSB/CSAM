<?php

namespace ActivismeBE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package ActivismeBE\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the index view for the application.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function indexFront(): View
    {
        return view('auth.login');
    }
}
