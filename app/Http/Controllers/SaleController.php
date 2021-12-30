<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserDvd;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=UserDvd::select()->with('dvd', 'user')->get();

        return view('admin.sales.index', compact('sales'));
    }
}
