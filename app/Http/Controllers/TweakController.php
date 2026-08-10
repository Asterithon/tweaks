<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweaks = [
            ['user' => 'bob', 'message' => 'eat meatballs today!', 'time' => '2024-06-01 10:00:00'],
            ['user' => 'alice', 'message' => 'i think earth is indeed round', 'time' => '2024-06-01 11:00:00'],
            ['user' => 'charlie', 'message' => 'today is leg day!', 'time' => '2024-06-01 12:00:00'],
        ];
        return view('home', ['tweaks' => $tweaks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
