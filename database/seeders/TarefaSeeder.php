<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Seeder;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//
    	$users = User::all();
    	foreach ($users as $user) {
    		Tarefa::factory(5)->create([
        		'user_id' => $user->id
        	]);
    	}
    }
}
