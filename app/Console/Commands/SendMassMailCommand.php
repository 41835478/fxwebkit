<?php

namespace Fxweb\Console\Commands;

use Illuminate\Console\Command;
use  Fxweb\Http\Controllers\admin\Email;

class SendMassMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mass {--id=: mass mail id to send it}{--limit=: number of users to send email to}';

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
    public function handle()
    {
       $options=$this->option();

        $limit=(array_key_exists('limit',$options))? $options['limit']:2;
        $id=(array_key_exists('id',$options))? $options['id']:0;

        $EmailClass = new Email();
        $EmailClass->autoSendMassMail($limit,$id);
    }
}
