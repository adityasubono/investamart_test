<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Question extends Model
{
    //
    protected $table='questions';
    protected $fillable =['question'];

    public function answer() {
        return $this->hasMany('App\Answer', 'question_id');
    }

}
