<?php

namespace Modules\Cms\Entities\forms;

use Illuminate\Database\Eloquent\Model;

class testcrud extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'testcruds';

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
