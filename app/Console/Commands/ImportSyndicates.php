<?php

namespace App\Console\Commands;

use App\Models\Syndicate;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportSyndicates extends Command
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
        $temporatlySyndicates = DB::table('syndicates_temp')->get();

        $total = 0;
        $newsSyndicates = 0;
        $newsUsers = 0;
        
        foreach ($temporatlySyndicates as $tempSyndicate) {
            $userExists = DB::table('users')->where('email', $tempSyndicate->email)->first();

            if (!$userExists) {
                $user = User::create([
                    'name' => $tempSyndicate->name,
                    'email' => $tempSyndicate->email,
                    'role_id' => 2,
                    'password' => bcrypt('colepom'),
                    'is_active' => true
                ]);

                $newsUsers++;

                $syndicate = Syndicate::create(
                    [
                        'name' => $tempSyndicate->name,
                        'cpf_cnpj' => $tempSyndicate->cnpj,
                        'email' => $tempSyndicate->email ?? null,
                        'phone' => $tempSyndicate->phone ?? null,
                        'mobile_phone' => $tempSyndicate->phone ?? null,
                        'zipcode' => $tempSyndicate->zipcoe ?? null,
                        'address' => $tempSyndicate->address ?? null,
                        'address_number' => $tempSyndicate->address_number,
                        'address_complement' => $tempSyndicate->address_complement,
                        'uf_code' => $this->getStateCode($tempSyndicate->state_code),
                        'city' => $tempSyndicate->city,
                        'user_id' => $user->id
                    ]
                );
                
                $newsSyndicates++;
                
                $total++;
                $this->info("Novo Sindicato: {$syndicate->name} e novo Usuário: {$user->email}");
            }
        }

        $this->info("Totais: Sindicatos {$newsSyndicates} - Usuarios: {$newsSyndicates} - Total: {$total}");
    }

    private function getStateCode($code)
    {
        $state =  DB::table('estado')->select('id')->where('uf', $code)->first();
        return $state->id;
    }
}
