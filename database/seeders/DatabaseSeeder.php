<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profesor;
use App\Models\Clase;
use App\Models\Signature;
use App\Models\Contenido;

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
        
        User::factory(100)->create();



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

        $user1->teacher= true;
        $user1->save();

        $profesor2 = Profesor::create([
            'user_id'=>$user2->id


        ])->signature()->attach(2);
        
        $user2->teacher = true;
        $user2->save();


        $profesor3 = Profesor::create([
            'user_id'=>$user3->id


        ])->signature()->attach(rand(1,6));
        
        $user3->teacher= true;
        $user3->save();


        for($x = 1; $x <= 30; $x++){
            $usuario = User::factory()->create();
            
            $profe = Profesor::create([
                'user_id'=>$usuario->id
            ]);

            $usuario->teacher = true;
            $usuario->save();
            $profe->signature()->attach(rand(1,6));
        }

        
        Contenido::factory()->contentsMat();

        for($i=0; $i<10; $i++){
            Contenido::factory()->contentHist();

        }

        for($i=0; $i<10; $i++){
            Contenido::factory()->contentQuim();

        }

        for($i=0; $i<10; $i++){
            Contenido::factory()->contentIng();

        }

        for($i=0; $i<10; $i++){
            Contenido::factory()->contentFis();

        }

        for($i=0; $i<10; $i++){
            Contenido::factory()->contentBio();

        }
 
        Clase::create([
            'profesor_id'=>2,
            'contenido_id'=>1,
            'summary'=>'nose',
            'title'=>'hola gente',
            'body'=>'muchas cosas'
        ]);

        Clase::create([
            'profesor_id'=>2,
            'contenido_id'=>2,
            'summary'=>'nose',
            'title'=>'otra cosa',
            'body'=>'blablablablablalba x blabla'
        ]);

        Clase::create([
            'profesor_id'=>2,
            'contenido_id'=>3,
            'summary'=>'nose',
            'title'=>'capuchino',
            'body'=>'te gusta el capuchino, ¿vainilla quizas?'
        ]);

        Clase::factory(100)->create();

    }
}
