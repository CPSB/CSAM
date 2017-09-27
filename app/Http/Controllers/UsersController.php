<?php

namespace ActivismeBE\Http\Controllers;

use ActivismeBE\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class UsersController
 *
 * @package ActivismeBE\Http\Controllers
 */
class UsersController extends Controller
{
    private $usersRepository; /** @var UsersRepository $usersrepository */

    /**
     * UsersController constructor.
     *
     * @param  UsersRepository $usersRepository The database absraction layer for the users table.
     * @return void
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Get the index page for the user management.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => $this->usersRepository->paginate(25)
        ]);
    }
}
