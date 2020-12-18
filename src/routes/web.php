<?php

Route::group(array('namespace' => 'Codificar\ReasonsRequest\Http\Controllers', 'middleware' => 'auth.admin'), function() {

    Route::get('/admin/lib/reasons/add', 'ReasonsController@renderAdd');
    Route::get('/admin/lib/reasons/list', 'ReasonsController@renderList');

    Route::post('/api/lib/reason/save', 'ReasonsController@saveReason');
});