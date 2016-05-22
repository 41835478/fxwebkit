<?php

namespace Modules\Cms\Entities\forms;

use Illuminate\Database\Eloquent\Model;

class cms_forms_careercenter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_forms_careercenters';

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
    protected $fillable = ['title', 'firstName', 'lastName', 'jobApplyingFor', 'Email', 'CurrentBasicSalary', 'CoverLetter', 'eligible', 'cv'];
}
