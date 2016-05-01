<?php

namespace Fxweb\Console\Commands;

use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createAdmin {--email=: admin email}{--password=: admin password}';

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
    public function handle(Request $oRequest,\Fxweb\Repositories\Admin\User\UserContract $oUsers)
    {
       $options=$this->option();

        $email=(array_key_exists('email',$options))? $options['email']:'';
        $password=(array_key_exists('password',$options))? $options['password']:'';


        $admin_role = explode(',', Config::get('fxweb.client_default_role'));

        $result=0;
        $result = $oUsers->addUser(['email'=>$email,'password'=>password], $admin_role[0]);
        if ($result > 0) {

            $this->info('the admin created Successfully : ');
            $this->info('Admin Email:'+$email);
            $this->info('Admin Password:'+$password);
        }else{
            $this->error('Something went wrong!,please try again.');
        }
    }
}
