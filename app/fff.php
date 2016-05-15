<?php

namespace ;

use Illuminate\Database\Eloquent\Model;

class fff extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fffs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
