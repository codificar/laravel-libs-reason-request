<?php

Route::group(array('namespace' => 'Codificar\ReasonsRequest\Http\Controllers'), function() {

    Route::get('/admin/lib/reasons/add', 'ReasonsController@renderAdd');
});