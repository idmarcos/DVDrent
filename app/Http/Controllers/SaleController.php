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

        $n=count($sales);

        for($i=0; $i<=$n; $i++){
            if(isset($sales[$i]->rent_date)){
                $sales[$i]->rent_date=date('d/m/Y', strtotime($sales[$i]->rent_date));
            }
            if(isset($sales[$i]->return_date)){
                $sales[$i]->return_date=date('d/m/Y', strtotime($sales[$i]->return_date));
            }
        }

        return view('admin.sales.index', compact('sales'));
    }
}
