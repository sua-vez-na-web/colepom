<?php

namespace App\Console\Commands;

use App\Models\Syndicate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateUserForSyndicates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuarios';

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
     * @return int
     */
    public function handle()
    {
        $syndicates = Syndicate::all();

        foreach($syndicates as $syndicate)
        {           

            $userExist = DB::table('users')->where('email',$syndicate->email)->first();
           
           
            if(!$userExist){
                $user =  User::create([
                    'name' => $syndicate->name ?? 'Sindicato sem nome',
                    'email' => $syndicate->email ?? 'sindicado-sem-email@email.com',
                    'role_id' => 2,
                    'password' => bcrypt('colepom'),
                    'is_active' => true
                ]);

                $syndicate->user_id = $user->id;
                $syndicate->save();

                echo "Usuario criado {$user->name} - {$user->id} ";
                echo "</br>";
            }
        }
        
        echo "terminou";

        return true;
    }
}
