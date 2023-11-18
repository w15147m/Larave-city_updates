<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CityTranslation;


class UsersCity extends Controller
{
    public function ShowCity($a = 0){



            $duplicates = CityTranslation::select('newname',DB::raw('COUNT(*) as count'))
            ->where('locale', 'en')
            ->groupBy('newname')
            ->havingRaw('COUNT(newname) > 1')
            ->take(20)
            ->skip($a * 20)
            ->get();
            $cities = CityTranslation::with('country')->whereIn('newname', $duplicates->pluck('newname'))
            ->where('locale', 'en')
             ->get();



    return view('welcome',compact('cities','duplicates'));}


            public function update_id(Request $req ,string $id)
            {


                $users = DB::table('locations__cities__translations')
                ->where('id' , $id)
                ->update([
                       'real_id' =>$req->real_id,
                    ])   ;
                // return redirect()->route('home');
                return "<h1>update successful </h1>";

            }

}



// "country_id": "2",
//   "city_id": "5",
//   "real_id": "1234"
