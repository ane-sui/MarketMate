<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Http\Requests\StoremessageRequest;
use App\Http\Requests\UpdatemessageRequest;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.messages', [
            'messages' => message::latest()->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'message'=> 'required|string|max:255',

        ]);
        message::create($validated);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        return view('users.msgview', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemessageRequest $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $message)
    {
        //
    }
}
