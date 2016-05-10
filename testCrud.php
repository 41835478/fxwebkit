<?php

namespace Fxweb;

use Illuminate\Database\Eloquent\Model;

class testCrud extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_cruds';

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
    protected $fillable = ['title', 'body'];
}
