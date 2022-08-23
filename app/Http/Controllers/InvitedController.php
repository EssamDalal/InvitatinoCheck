<?php

namespace App\Http\Controllers;

use App\Models\Invited;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvitedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inviteds = Invited::all();
        return Inertia::render('Invited/Index', [
            'inviteds' => $inviteds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Invited/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email',
        ]);

        $invited = Invited::create([
            'email' => $request->email,
        ]);


        return redirect()->route('admin.invited.index')->with('success', 'Invited created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function show(Invited $invited)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function edit(Invited $invited)
    {
        return Inertia::render('Invited/Edit', ['invited' => $invited]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invited $invited)
    {
        $request->validate([
            'email' => 'required|min:3',
        ]);

        $invited->update($request->all());

        return redirect()->route('admin.invited.index')->with('success', 'Invited updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invited $invited)
    {
        $invited->delete();

        return redirect()->route('admin.invited.index')->with('delete', 'Invited deleted successfully');
    }
}
