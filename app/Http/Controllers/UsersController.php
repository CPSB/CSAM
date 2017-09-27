<?php

namespace ActivismeBE\Http\Controllers;

use ActivismeBE\Repositories\UsersRepository;
use Illuminate\Http\RedirectResponse;
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
        $model = $this->usersRepository;

        return view('users.index', [
            'users' => $model->paginate(25),
        ]);
    }

    /**
     * Geef een specifieke gebruiker weer in het systeem.
     *
     * @param  integer $userId The unique identifier in the database.
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($userId): View
    {
        $user = $this->usersRepository->find($userId) ?: abort(404);
        return view('users.show', compact('user'));
    }

    /**
     * Verwijder een gebruiker uit de community.
     *
     * @param  integer $userId The unique identifier in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($userId): RedirectResponse
    {
        $user = $this->usersRepository->findOrFail($userId) ?: abort(404);

        if ($this->usersRepository->delete($userId)) {
            flash("{$user->name} is verwijderd uit de community.")->success();
        }

        return redirect()->route('users.index');
    }
}
