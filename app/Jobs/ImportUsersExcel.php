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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $destinationPath = 'public/usersFiles';
      $file = '82893.xlsx';
      $rows = Excel::load($destinationPath."/".$file, function($reader) {})->all();
      $roleClient = Role::where('name', 'client')->first();
      $roleAgent = Role::where('name', 'agent')->first();
      foreach ($rows as $row) {
      	    // dd($row);
            if(!empty($row->email) && in_array($row->ruolo, ['A', 'C']) and strpos($row->email,"@")>0){
              $user = User::where("email", $row->email)->first();
              if($user==null){
                $user = User::create([
                  'name'  => $row->nome,
                  'email' => $row->email,
                  'password' => bcrypt($row->password),
                ]);
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
