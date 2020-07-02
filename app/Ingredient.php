<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

	protected $guarded = [];

    public function Recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
