<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    protected $fillable = ['description'];
    /**
     * Mapeamento dos estudantes
     *
     * @return void
     */
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
