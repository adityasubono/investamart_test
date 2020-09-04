<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($value)
 * @method static whereIn(string $string, $ids)
 * @method static where(string $string, int $id)
 */
class Answer extends Model
{
    //
    protected $table='answers';
    protected $fillable=['question_id','answer','answer_option','opportunist','optimistic','yolo'];

    public function question() {
        return $this->belongsTo('App\Question', 'id');
    }
}
