<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredient;
use App\Step;
class Recipe extends Model
{
    protected $guarded = [];
    
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
