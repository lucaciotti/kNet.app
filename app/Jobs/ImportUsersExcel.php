<?php

namespace knet\Jobs;

use knet\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

use knet\User;
use knet\Role;
use knet\ArcaModels\Client;
use knet\ArcaModels\Agent;
use Excel;

class ImportUsersExcel extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $file = '';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $destinationPath = 'public/usersFiles';
      $file = $this->file;
      $rows = Excel::load($destinationPath."/".$file, function($reader) {})->all();
      $roleClient = Role::where('name', 'client')->first();
      $roleAgent = Role::where('name', 'agent')->first();
      foreach ($rows as $row) {
      	    // dd($row);
            if(!empty($row->email) && in_array($row->ruolo, ['A', 'C']) and strpos($row->email,"@")>0){
              if($row->ruolo == 'C'){
                $user = User::where("nickname", $row->codice."@kNet.".$row->ditta)->first();
                if($user==null){ // Creo l'Utente
                  $user = User::create([
                    'name'  => $row->nome,
                    'nickname' => $row->codice."@kNet.".$row->ditta,
                    'email' => $row->email,
                    'password' => bcrypt($row->password),
                    'ditta' => $row->ditta
                  ]);
                }
              } else {
                $user = User::where("nickname", $row->email)->first();
                if($user==null){ // Creo l'Utente
                  $user = User::create([
                    'name'  => $row->nome,
                    'nickname' => $row->email,
                    'email' => $row->email,
                    'password' => bcrypt($row->password),
                    'ditta' => $row->ditta
                  ]);
                }
              }
              $user->roles()->detach();
              if($row->ruolo == 'C'){
                $user->codcli = $row->codice;
                $user->attachRole($roleClient->id);
              } elseif($row->ruolo == 'A'){
                $user->codag = $row->codice;
                $user->attachRole($roleAgent->id);
              }
            Log::info($user->name.' caricato');
            $user->save();
            // Session::flash('success', 'Upload successfully');
            // dd($user);
          }
      }
    }
}
