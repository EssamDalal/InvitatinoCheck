<?php

namespace App\Http\Controllers;

use App\Exports\RegisteredsExport;
use App\Models\Invited;
use App\Models\Registered;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registereds = Registered::all();

        return Inertia::render('Registered/Index', [
            'registereds' => $registereds,
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new RegisteredsExport, 'Registereds.xlsx');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Inertia::render('Welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        if (Invited::where('email', $request->email)->first()) {
            if (Registered::where('email', $request->email)->first()) {
                return Inertia::render('Check/AlreadyCheck');
            } else {

                $request->validate([
                    'name' => 'required|min:3|max:20',
                    'email' => 'required|email',
                    'phone' => 'required|numeric',
                    'position' => 'required|min:3|max:20',
                    'jeha' => 'required|min:3|max:20',
                    'come' => 'required',
                ]);

                $registered_last = Registered::all()->last();
                $registered_id = $registered_last->id + 1;

                if ($request->come == 1) {
                    $registered = Registered::create([
                        'site_number' => $registered_id,
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'position' => $request->position,
                        'jeha' => $request->jeha,
                        'come' => $request->come,
                        'questions' => $request->questions,
                    ]);
                } else {
                    $registered = Registered::create([
                        'site_number' => null,
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'position' => $request->position,
                        'jeha' => $request->jeha,
                        'come' => $request->come,
                        'questions' => $request->questions,
                    ]);
                }


                return Inertia::render('Check/Thanks');
            }
        } else {
            return Inertia::render('Check/EmailExists');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registered  $registered
     * @return \Illuminate\Http\Response
     */
    public function show(Registered $registered)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registered  $registered
     * @return \Illuminate\Http\Response
     */
    public function edit(Registered $registered)
    {
        return Inertia::render('Registered/Edit', ['registered' => $registered]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registered  $registered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registered $registered)
    {
        $request->validate([
            'site_number' => 'required|numeric',
        ]);

        $registered->update($request->all());

        return redirect()->route('admin.registered.index')->with('success', 'Registered updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registered  $registered
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registered $registered)
    {
        $registered->delete();

        return redirect()->route('admin.registered.index')->with('delete', 'Registered deleted successfully');
    }
}
