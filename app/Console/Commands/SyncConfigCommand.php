<?php

namespace Fxweb\Console\Commands;

use Illuminate\Console\Command;

use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

class SyncConfigCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get MT4 configurations from server groups and symbols ';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    protected $Mt4Configrations;


    public function __construct( Mt4Configrations $Mt4Configrations)
    {
        parent::__construct();
        $this->Mt4Configrations = $Mt4Configrations;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->info('start synchronizing groups .... ');
        $groupsResults = $this->Mt4Configrations->addGroups();


        if($groupsResults){
            $this->info('groups have been updated successfully');
        }else{

            $this->error('Error, No groups or some internal error has been happened  ');
        }




        $this->info('start synchronizing securities .... ');
        $groupsResults = $this->Mt4Configrations->addSecurities();


        if($groupsResults){
            $this->info('securities have been updated successfully');
        }else{

            $this->error('Error, No securities or some internal error has been happened  ');
        }



        $this->info('start synchronizing  Symbols .... ');
        $groupsResults = $this->Mt4Configrations->synchronizeSymbols();


        if($groupsResults){
            $this->info('symbols have been updated successfully');
        }else{

            $this->error('Error, No symbols or some internal error has been happened  ');
        }







    }
}
