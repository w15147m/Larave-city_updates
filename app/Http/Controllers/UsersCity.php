<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CityTranslation;


class UsersCity extends Controller
{
    public function ShowCity(){
                
       
           
            $duplicates = CityTranslation::select('newname',DB::raw('COUNT(*) as count'))
            ->where('locale', 'en')
            ->groupBy('newname')
            ->havingRaw('COUNT(newname) > 1')
            ->take(20)
            ->get();
            $cities = CityTranslation::with('country')->whereIn('newname', $duplicates->pluck('newname'))
            ->where('locale', 'en')
             ->get();
            

   
    return view('welcome',compact('cities','duplicates'));}
           
    
            public function update_id(Request $Request ,string $id){
                // $users = DB::table('locations__cities__translations')
                // ->where('id' , $id)
                // ->update([
                //        'rea_id' => 'noor munmmad',
                //        'aga' => 21,
                   
                      

                // ])   ;
                return $Request;

            }
    
}
