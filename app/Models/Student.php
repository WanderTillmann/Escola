<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * indica os atributos para definicao de dados em massa
     *
     * @var array
     */
    protected $fillable = ['name', 'birth', 'gerder', 'classroom_id'];

    /**
     * Faz convesao na hora da serialização
     *
     * @var array
     */
    protected  $casts = [
        'birth' => 'date:d/m/Y'
    ];

    // /**
    //  * Define atributos nao mostrados depois da serializaçao
    //  */
    // // protected $hidden = ['created_at', 'updated_at'];

    // /**
    //  * define os atributos visiveis depois da serializaçai
    //  *
    //  * @var array
    //  */
    // protected $visible = ['name', 'birth', 'gerder', 'classroom_id', 'is_accepted'];

    // /**
    //  * define os atributos dinamicos anexos a serialização
    //  *
    //  * @var array
    //  */
    // protected $appends = ['is_accepted'];

    /**
     * Mapeamento com relacionamento com salas de aula
     *
     * @return void
     */
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
    }

    // /**
    //  * Cria um assessor no model de estudante chamado is_accepted
    //  *
    //  * @return void
    //  */
    // public function getIsAcceptedAttribute()
    // {
    //     return $this->attributes['birth'] > '2010-01-01' ? 'Aceito' : 'não foi aceito';
    // }
}
