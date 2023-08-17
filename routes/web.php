<?php

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
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Inertia\Inertia;

Route::get('/', function () {


        $users = QueryBuilder::for(User::class)
        ->allowedFilters([
            'name',
            'email',
            AllowedFilter::exact('id'),
            AllowedFilter::scope('starts_before'),
            ])
            ->paginate()
            ->appends(request()->query());
    dd($users);
});



Route::match(['GET','POST'],'/test', function () {
    $users = QueryBuilder::for(User::class)
    ->allowedFilters([
        'name',
        'email',
        AllowedFilter::exact('id'),
        AllowedFilter::scope('starts_before'),
        ])
        ->paginate()
        ->appends(request()->query());


        return Inertia::render('Welcome', [
            'users' => fn() => $users,
        ]);


});
