<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'=>'Front End',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Backend',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Full Stack',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Devops',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Dba',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'UX / UI',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Tech Lead',
            'created_at' =>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
    }
}
