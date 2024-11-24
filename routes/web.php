<?php

use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Reporte;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $reporte = Reporte::findOrFail(1);
    $model = $reporte?->hechosDesaparicion;
    return $model->desaparicionMujerMenor72h(2) ? 'True' : 'False';
});

Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@localhost.com',
        'password' => 'admin'
    ];

    if (!Auth::attempt($credentials)) {
        $user = new User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin');
            $updateToken = $user->createToken('update', ['create', 'update', 'read']);
            $basicToken = $user->createToken('basic', ['read']);

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken
            ];
        }
    }
});
