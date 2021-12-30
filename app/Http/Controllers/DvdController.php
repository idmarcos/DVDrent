<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dvd;
use App\Models\UserDvd;

use Auth;

class DvdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dvds=Dvd::all();

        return view('admin.movies.index', compact('dvds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $duration = $request->input('duration');
        $year = $request->input('year');
        $gender = $request->input('gender');
        $synopsis = $request->input('synopsis');
        $cast = $request->input('cast');
        $age_rating = $request->input('age_rating');

        $dvd = new Dvd();

        $dvd->title = $title;
        $dvd->duration = $duration;
        $dvd->year = $year;
        $dvd->gender = $gender;
        $dvd->synopsis = $synopsis;
        $dvd->cast = $cast;
        $dvd->age_rating = $age_rating;
        $dvd->available = 1;
        
        $dvd->save();

        return redirect('/movies')->with('success', 'Nueva pel&iacute;cula creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dvd=Dvd::find($id);

        return view('admin.movies.edit', compact('dvd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $duration = $request->input('duration');
        $year = $request->input('year');
        $gender = $request->input('gender');
        $synopsis = $request->input('synopsis');
        $cast = $request->input('cast');
        $age_rating = $request->input('age_rating');

        $dvd=Dvd::find($id);

        $dvd->title = $title;
        $dvd->duration = $duration;
        $dvd->year = $year;
        $dvd->gender = $gender;
        $dvd->synopsis = $synopsis;
        $dvd->cast = $cast;
        $dvd->age_rating = $age_rating;
        
        $dvd->save();

        return redirect('/movies')->with('success', 'Pel&iacute;cula editada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dvd=Dvd::find($id);

        $dvd->delete();

        return redirect('/movies')->with('success', 'Pel&iacute;cula eliminada.');
    }

    /**
     * Display a list of movies. 
     */
    public function movieList()
    {
        $dvds=Dvd::all();

        return view('movies.index', compact('dvds'));
    }
    
    /**
     * Show the form for rent the movie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function movieFormRent($id)
    {
        $dvd=Dvd::find($id);

        return view('movies.rent', compact('dvd'));
    }

     /**
     * Rent a movie. 
     */
    public function movieRent(Request $request, $id)
    {
        $address = $request->input('address');
        $postal_code = $request->input('cp');
        $state = $request->input('state');

        $user=Auth::user();
        $dvd=Dvd::find($id);
        $current_date=date('Y-m-d');

        $user_dvd = new UserDvd();

        $user_dvd->user_id = $user->id;
        $user_dvd->dvd_id = $id;
        $user_dvd->rent_date = $current_date;
        $user_dvd->address = $address;
        $user_dvd->postal_code = $postal_code;
        $user_dvd->state = $state;

        $user_dvd->save();

        $dvd->available=0;
        $dvd->save();

        return redirect('/list/movies')->with('success', 'Nueva pel&iacute;cula alquilada.');
    }

    /**
     * Show all user rents
     */
    public function userRents()
    {
        $user=Auth::user();

        $rents=$user->dvds;
        $n=count($rents);

        for($i=0; $i<=$n; $i++){
            if(isset($rents[$i]->pivot->rent_date)){
                $rents[$i]->pivot->rent_date=date('d/m/Y', strtotime($rents[$i]->pivot->rent_date));
            }
            if(isset($rents[$i]->pivot->return_date)){
                $rents[$i]->pivot->return_date=date('d/m/Y', strtotime($rents[$i]->pivot->return_date));
            }
        }

        return view('movies.myrents', compact('rents'));
    }

    /**
     * Return a movie
     */
    public function returnMovie($id)
    {
        $current_date=date('Y-m-d');

        $user_dvd=UserDvd::find($id);

        $user_dvd->return_date = $current_date;

        $user_dvd->save();

        return redirect('/list/myrents')->with('success', 'Pel&iacute;cula devuelta.');
    }
}
