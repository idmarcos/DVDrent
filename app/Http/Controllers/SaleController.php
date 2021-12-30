<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dvd;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=DVD::select()->whereHas('users')->get();
        

        return view('admin.sales.index', compact('sales'));
    }
}
