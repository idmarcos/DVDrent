<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=User::select()->whereHas('dvds')->get();

        return view('admin.clients.index', compact('clients'));
    }
}
