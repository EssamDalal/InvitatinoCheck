<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invited;
use App\Models\Registered;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $registereds = Registered::all()->count();

        $inviteds = Invited::all()->count();

        return Inertia::render('Dashboard', [
            'registereds' => $registereds,
            'inviteds' => $inviteds,
        ]);
    }
}
