<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class UsersDetails extends Model
{
        protected $table = 'users_details';
       
        public $timestamps = false;
       
        protected $fillable = [
<<<<<<< HEAD
=======
    
>>>>>>> aa0a7bc088b37a68033bf01ece75a48d6fba8e11
        'users_id',
        'nickname',
        'location',
        'birthday',
        'phone',
        'country',
        'city',
            
            ];
}
