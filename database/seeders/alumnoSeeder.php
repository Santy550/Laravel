<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;

class alumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumno')->insert([
            'name' => Str::random(10),
            'edad' => rand(1, 99),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'sexo' => Str::random(10),
            'telefono' => Str::random(10),
        ]);
    }
}



