<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profesor;
use App\Models\Clase;
use App\Models\Signature;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Signature::create([
            'nombre' => 'Historia'
        ]);

        Signature::create([
            'nombre' => 'Matemática'
        ]);
        Signature::create([
            'nombre' => 'Ingles'
        ]);
        Signature::create([
            'nombre' => 'Química'
        ]);
        Signature::create([
            'nombre' => 'Física'
        ]);
        Signature::create([
            'nombre' => 'Biología'
        ]);
        
        \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $user1 = User::create([
            'name'=>'Héctor',
            'lastname'=>'Castro',
            'username'=>'yo',
            'birthday'=>'1988-09-14',
            'email'=>'fraco@gmail.com',
            'password'=>bcrypt('pass') 
        ]);


        $user2 = User::create([
            'name'=>'Pablito',
            'lastname'=>'Castro',
            'username'=>'tu',
            'birthday'=>'1988-09-14',
            'email'=>'pablitos@gmail.com',
            'password'=>bcrypt('pablitos') 
        ]);

        $user3 = User::create([
            'name'=>'Jorjita',
            'lastname'=>'Castro',
            'username'=>'ellos',
            'birthday'=>'1988-09-14',
            'email'=>'jorjita@gmail.com',
            'password'=>bcrypt('jorjita') 
        ]);

        User::create([
            'name'=>'admin',
            'lastname'=>'admin',
            'username'=>'admin',
            'birthday'=>'1911-11-11',
            'email'=>'admin@admin.cl',
            'password'=>bcrypt('adminadmin')
        ]);

        $profesor1 = Profesor::create([
            'user_id'=>$user1->id
        ])->signature()->attach(rand(1,6));

        $profesor2 = Profesor::create([
            'user_id'=>$user2->id


        ])->signature()->attach(2);

        $profesor3 = Profesor::create([
            'user_id'=>$user3->id


        ])->signature()->attach(rand(1,6));

        for($x = 1; $x <= 30; $x++){
            $usuario = User::factory()->create();
            
            $profe = Profesor::create([
                'user_id'=>$usuario->id
            ]);

            $profe->signature()->attach(rand(1,6));
        }

        Clase::create([
            'profesor_id'=>2,
            'signature_id'=>2,
            'summary'=>'nose',
            'title'=>'hola gente',
            'body'=>'muchas cosas'
        ]);

        Clase::create([
            'profesor_id'=>2,
            'signature_id'=>2,
            'summary'=>'nose',
            'title'=>'otra cosa',
            'body'=>'blablablablablalba x blabla'
        ]);

        Clase::create([
            'profesor_id'=>2,
            'signature_id'=>2,
            'summary'=>'nose',
            'title'=>'capuchino',
            'body'=>'te gusta el capuchino, ¿vainilla quizas?'
        ]);

        Clase::factory(100)->create();

    }
}
