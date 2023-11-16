<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{   

    use HasFactory;

    public $table = 'locations__cities__translations';
    public function country(){

        return $this->belongsTo(CountryTranslation::class, 'country_id', 'country_id')->where('locale','en');
  re
    }
}
