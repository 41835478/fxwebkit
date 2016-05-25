<?php

namespace Modules\Cms\Entities\forms;

use Illuminate\Database\Eloquent\Model;

class cms_forms_payment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_forms_payments';

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
    protected $fillable = ['OWNER_NAME', 'ORDERID', 'EMAIL', 'OWNERTELNO', 'OWNERADDRESS', 'OWNERADDRESS2', 'OWNERCTY', 'OWNERZIP', 'AMOUNT', 'CURRENCY', 'COM', 'CN', 'BRAND', 'SHASign', 'agreement'];
}
