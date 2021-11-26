Crear proyecto de laravel -> composer create-project laravel/laravel nombreProyecto

Iniciar laravel -> moverte a la carpeta creada con el anterior comando y realizar este comando : php artisan serve

Conectar con la base de datos -> abrir el archivo .env, en el tercer bloque cambiar localhost por mysql en DB_CONNECTION y en DB_DATABASE poner el
nombre de tu base de datos

Crear la tabla alumno con middelware -> php artisan make:migration create_alumno_table
Una vez creado el migration meter en la funcion up los datos correspondientes:

 Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->integer('edad')->nullable();
            $table->string('email', 64)->unique();
            $table->string('password',64)->nullable(false);
            $table->string('sexo');
            $table->string('telefono',16)->nullable();
            $table->timestamps();
 });

Y por ultimo ejecutar este comando para que se cree la tabla con sus respectivos campos en la base de datos: php artisan migrate

Crear seeder -> php artisan make:seeder alumnoSeeder
Poner en la funcion run los datos siguientes:

    DB::table('alumno')->insert([
                'name' => Str::random(10),
                'edad' => rand(1, 99),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'sexo' => Str::random(10),
                'telefono' => Str::random(10),
    ]);

Y por ultimo ejecutar este comando para que se rellenen todos los campos de la tabla alumno: php artisan db:seed
En el caso de que no se rellenen los campos ejecutar este comando: php artisan db:seed --class=alumnoSeeder

Crear controller -> php artisan make:controller AlumnoController

Crear rutas para trabajar con la tabla alumno -> en api.php poner esto:

Route::prefix("alumno")->group(function () {
    Route::get('', [AlumnoController::class, 'getAll']);
    Route::post('', [AlumnoController::class, 'insert']);

    Route::get('/{id}', [AlumnoController::class, 'getAlumno']);

    Route::delete('/{id}', [AlumnoController::class, 'deleteAlumno']);

    Route::get('/{id}/asignaturas', [AlumnoController::class, 'getAsignaturasAlumno']);

    Route::get('/{id}/ficha', [AlumnoController::class, 'getFichaAlumno']);

    Route::post('/{id}/modificar', [AlumnoController::class, 'modificar']);

});

Crear un middelware -> php artisan make:middleware AsegurarIdNumerico

Implementar en el controller todas las funciones para realizar todas las acciones especificadas por las rutas ->
php artisan make:controller AlumnoController



