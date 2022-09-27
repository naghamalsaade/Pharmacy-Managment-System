<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class userCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For insert user file';

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
        $path = base_path().'/public/csv/user.csv';
        if(file_exists($path))
        {
            $file = new \SplFileObject($path);
            $file->setFlags(\SplFileObject::READ_CSV);

            foreach ($file as $key => $value)
            {
                list($name, $email, $password, $salary, $mobile,$type) = $value;
                User::create(['name'=>$name, 'email'=>$email, 'password'=>$password, 'salary'=>$salary, 'mobile'=>$mobile, 'type'=>$type]);
            }
        }
        print("data has saved");
    }
}
