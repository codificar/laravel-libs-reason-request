<?php

Route::group(array('namespace' => 'Codificar\ReasonsRequest\Http\Controllers', 'middleware' => 'auth.admin'), function() {

    Route::get('/admin/lib/reasons/setting', 'ReasonsController@renderSetting');
    Route::get('/admin/lib/reasons/add', 'ReasonsController@renderAdd');
    Route::get('/admin/lib/reasons/list', 'ReasonsController@renderList');
    Route::get('/admin/lib/reasons/edit/{id}', 'ReasonsController@edit');

    Route::post('/api/lib/reason/save_setting', 'ReasonsController@saveSetting');
    Route::post('/api/lib/reason/save', 'ReasonsController@saveReason');
    Route::get('/api/lib/reason/list', 'ReasonsController@listReasons');
});