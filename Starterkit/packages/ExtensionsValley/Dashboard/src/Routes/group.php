<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth:admin']], function () {
    Route::get('/addgroup', [
        'middleware' => 'acl:add',
        'name' => 'Add Group',
        'as' => 'extensionsvalley.admin.addgroup',
        'uses' => 'ExtensionsValley\Dashboard\Controllers\GroupController@addGroup',
    ]);
    Route::get('/editgroup/{id}', [
        'middleware' => 'acl:edit',
        'name' => 'Edit Group',
        'as' => 'extensionsvalley.admin.editgroup',
        'uses' => 'ExtensionsValley\Dashboard\Controllers\GroupController@editGroup',
    ]);
    Route::get('/viewgroup/{id}', [
        'middleware' => 'acl:view',
        'name' => 'view Group',
        'as' => 'extensionsvalley.admin.viewgroup',
        'uses' => 'ExtensionsValley\Dashboard\Controllers\GroupController@viewGroup',
    ]);
    Route::post('/savegroup', [
        'middleware' => 'acl:add',
        'name' => 'Save Group',
        'as' => 'extensionsvalley.admin.savegroup',
        'uses' => 'ExtensionsValley\Dashboard\Controllers\GroupController@saveGroup',
    ]);
    Route::post('/updategroup', [
        'middleware' => 'acl:edit',
        'name' => 'Save Group',
        'as' => 'extensionsvalley.admin.updategroup',
        'uses' => 'ExtensionsValley\Dashboard\Controllers\GroupController@updateGroup',
    ]);
});
