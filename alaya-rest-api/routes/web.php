<?php

header('Access-Control-Allow-Origin: *');   
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes cdfor an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->post(
    'auth/login',
    [
        'uses' => 'AuthController@authenticate'
    ]
);

$router->post('auth/regist/{token}', 'AuthController@regist');


$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {
        // User Route
        $router->get('users[/{id}]', 'UserController@show');
        $router->put('users/edit/{id}','UserController@edit');
        $router->post('users/create','UserController@create');
        $router->delete('users/delete/{id}', 'UserController@delete');

        // Absent Route
        $router->post('absent/{id}', 'AbsentController@absent');
        $router->get('absent/get[/{id}]', 'AbsentController@getAbsent');
        $router->get('absent/get/{id}/{date}', 'AbsentController@getAbsent');
        $router->get('absent/get/detail/{user_id}/{id}', 'AbsentController@getAbsentDetail');
        
        // Admin get
        $router->get('admin/absent/get/{id}', 'AbsentController@getAbsentAdmin');
        $router->get('admin/treatment/get/{id}[/{date}]', 'TreatmentController@getTreatmentAdmin');
        $router->get('admin/treatment/detail/{id}', 'TreatmentController@getDetailTreatmentAdmin');
        
        // Treatmens
        $router->get('treatment/users', 'UserController@treatment');
        $router->get('admin/users', 'UserController@admin');
        $router->get('treatment[/{id}]', 'TreatmentController@getAll');
        $router->get('treatment/detail/{id}', 'TreatmentController@detail');
        $router->post('treatment/add', 'TreatmentController@add');
        
        // Branch
        $router->get('branch', 'BranchController@all');
        $router->get('branch/detail/{id}', 'BranchController@detail');
        $router->post('branch/create', 'BranchController@create');
        $router->put('branch/edit/{id}', 'BranchController@edit');
        $router->put('branch/delete/{id}', 'BranchController@delete');
        
        // Treatment History
        $router->get('treatment/get/history/{user_id}', 'HistoryController@history');
        $router->get('treatment/get/history/{user_id}/{id}', 'HistoryController@history');
        $router->get('treatment/get/admin/{id}', 'HistoryController@getHistoryAdmin');
        $router->post('treatment/add/history', 'HistoryController@addHistory');
    }
);
