<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:admin {name} {password} {email}';

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
        //
		$name = $this->argument('name');
		$password = $this->argument('password');
		$email = $this->argument('email');
		$admin = User::create([
			'name' => $name,
			'password' => bcrypt($password),
			'email' => $email,
		]);
		if($admin){
			$admin->level = 1;
			$admin->save();
			$this->info("创建成功");
		}else{
			$this->error("创建失败");
		}
    }
}
