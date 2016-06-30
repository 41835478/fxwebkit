<?php

namespace Modules\Cms\Entities\forms;

use Illuminate\Database\Eloquent\Model;

class cms_forms_emailtemplate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_forms_emailtemplates';

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
    protected $fillable = ['name', 'alias','admin_email', 'template'];
}
