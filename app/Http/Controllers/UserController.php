<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Product;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
       $users=User::paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function chart()
    {
        return view('users.charts');
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        User::create($request->validated());
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function view()
    {
        return view('users.view', [
            'products' => Product::with('user')->latest()->paginate(6),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');

    }
}
