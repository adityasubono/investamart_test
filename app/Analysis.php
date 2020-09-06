<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Analysis extends Model
{
    //

    protected $table='analysis';
    protected $fillable=['user_id','answer_id'];
}
