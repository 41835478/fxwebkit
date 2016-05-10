<?php

namespace Fxweb\Console\Commands;

use Illuminate\Console\Command;
use stdClass;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {--email= admin email}{--password= admin password}{--first_name= admin firstName}{--last_name= admin last_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(\Fxweb\Repositories\Admin\User\UserContract $oUsers)
    {
        $options=$this->option();

        $email=(array_key_exists('email',$options))? $options['email']:'';
        $password=(array_key_exists('password',$options))? $options['password']:'';
        $first_name=(array_key_exists('first_name',$options))? $options['first_name']:'';
        $last_name=(array_key_exists('last_name',$options))? $options['last_name']:'';



        $result=0;

        $aAdminData= [
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'password'=>$password,
            'nickname'=>"",
        'address'=>"",
            'birthday'=>"",
            'phone'=>"",
            'country'=>"",
            'city'=>"",
            'gender'=>"",
            'zip_code'=>"",
            'gender'=>""


        ];
        $oAdminData = new stdClass();
        foreach ($aAdminData as $key => $value)
        {
            $oAdminData->$key = $value;
        }
        $result = $oUsers->addUser($oAdminData,'admin');


        if ($result > 0) {

            $this->info('the admin created Successfully : ');
            $this->info('Admin Id:'.$result);
            $this->info('Admin Email:'.$email);
            $this->info('Admin password:'.$password);
        }else{
            $this->error('Something went wrong!,please try again.');
        }
    }
}
