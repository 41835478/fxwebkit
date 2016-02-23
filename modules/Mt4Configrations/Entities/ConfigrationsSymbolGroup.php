<?php namespace Modules\Mt4Configrations\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfigrationsSymbolGroup extends Model
{

    protected $table = 'configrations_symbol_group';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'description',
        'position'];

}