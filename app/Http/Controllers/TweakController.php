<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweak;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TweakController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $tweaks = Tweak::with('user')->latest()->take(20)->get();
        return view('home', ['tweaks' => $tweaks]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something',
            'message.max' => 'The message may not be greater than 255 characters.',
        ]);

        auth()->user()->tweaks()->create($validatedData);

        return redirect()->back()->with('success', 'Tweak posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweak $tweak)
    {
        $this->authorize('update', $tweak);

        return view('tweaks.edit', compact('tweak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweak $tweak)
    {
        $this->authorize('update', $tweak);

        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something',
            'message.max' => 'The message may not be greater than 255 characters.',
        ]);

        $tweak->update($validatedData);

        return redirect('/')->with('success', 'Your tweak have been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweak $tweak)
    {
        $this->authorize('delete', $tweak);
        $tweak->delete();
        return redirect('/')->with('success', 'your tweak have been deleted!');
    }
}
