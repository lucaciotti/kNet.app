<?php

use Illuminate\Database\Seeder;
use knet\Role;
use knet\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // clear our database ------------------------------------------
      DB::table('roles')->delete();

      $admin = Role::create([
          'name' => "admin",
          'display_name' => "User Administrator",
          'description' => "One Role to Rule them All",
      ]);

      $agent = Role::create([
          'name' => "agent",
          'display_name' => "Agente Commerciale",
          'description' => "Agente Commerciale",
      ]);

      $client = Role::create([
          'name' => "client",
          'display_name' => "Cliente K-Group",
          'description' => "Cliente di Krona Koblenz",
      ]);

      $superAgent = Role::create([
          'name' => "superAgent",
          'display_name' => "Capoarea / Export Manager",
          'description' => "Agente Commerciale con visualizzazioni speciali",
      ]);

      $direz = Role::create([
          'name' => "direz",
          'display_name' => "Direzione",
          'description' => "Utente Direzionale",
      ]);

      $commerc = Role::create([
          'name' => "commerc",
          'display_name' => "Commerciale",
          'description' => "Utente generico Commerciale",
      ]);
      $this->command->info('Ruoli Creati!');

      $user = User::where('email', 'luca.ciotti@gmail.com')->first();
      //Attach a Role to User
      $user->attachRole($agent);
      // $user->role()->attach($agent->id);
      $user->codag = 'AM3';
      $user->save();

      $this->command->info('User '.$user->name.' Updated!');
    }
}
