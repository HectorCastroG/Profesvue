<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profesor;
use App\Models\Clase;
use App\Models\Signature;
use App\Models\Contenido;
use App\Models\Sesion;
use Carbon\Carbon;


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

        Contenido::factory()->contentsBio();

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

        $startDate = Carbon::now()->addWeeks(1); // Fecha de inicio en una semana
        $endDate = Carbon::now()->addWeeks(2); // Fecha de finalización en dos semanas

        for ($i = 1; $i <= 20; $i++) {
            $sessionDate = Carbon::parse($startDate)->addDays(rand(0, 13))->format('Y-m-d');
            $startTime = Carbon::createFromTime(rand(8, 16), rand(0, 59), 0)->format('H:i:s');
            $endTime = Carbon::parse($startTime)->addHour()->format('H:i:s');
        
            Sesion::create([
                'fecha' => $sessionDate,
                'horainicio' => $startTime,
                'horacierre' => $endTime,
                'profesor_id'=>rand(1,30)
            ]);
        }

        $sesiones = Sesion::all();
        $usuarios = User::all();
        $clases = Clase::all();
    
        // Asignar sesiones a usuarios
        foreach ($usuarios as $usuario) {
            $usuario->sesion()->attach($sesiones->random(rand(1, 5))->pluck('id'));
        }
    
        // Asignar sesiones a clases
        foreach ($clases as $clase) {
            $clase->sesion()->attach($sesiones->random(rand(1, 3))->pluck('id'));
        }

    }
}
