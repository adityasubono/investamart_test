<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find($id)
 * @method static where(string $string, $id)
 */
class User extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['id','name', 'email', 'mobile'];

}
