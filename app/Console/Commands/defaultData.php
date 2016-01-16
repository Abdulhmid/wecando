<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class defaultData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'default:data';

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
        try {
            /*$tableNames = \Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
            foreach ($tableNames as $key => $name) {
                if ($name == 'migrations' || $name == 'admin') {
                    continue;
                }
                \DB::statement('TRUNCATE TABLE '.$name.' CASCADE');
            } */

            \Artisan::call('db:seed');
            $connectionDatabase =  \Config::get('database.default');
            if ($connectionDatabase == "mysql") {
                \DB::unprepared(file_get_contents(base_path().'/resources/files/state_mysql.sql'));
                \DB::unprepared(file_get_contents(base_path().'/resources/files/city_mysql.sql'));
            }else{
                \DB::unprepared(file_get_contents(base_path().'/resources/files/states.sql'));
                \DB::unprepared(file_get_contents(base_path().'/resources/files/cities.sql'));
            }            
        } catch (Exception $e) {
            echo "Failed";
        }

    }
}
