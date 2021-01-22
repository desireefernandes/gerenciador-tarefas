<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\Tarefa;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (Tarefa::all() as $tarefa) {
                Tipo::factory(1)->create([
                    'tarefa_id' => $tarefa->id
                ]);
            }
    }
}
