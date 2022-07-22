<?php


/**Car*/



// 

    /** Car Masters **/    
        Route::resource('carBrands', 'Car\Masters\CarBrandController');
        Route::get('/getAllCarBrands', 'Car\Masters\CarBrandController@getAllCarBrands')->name('getAllCarBrands');

        Route::resource('carModels', 'Car\Masters\CarModelController');
        Route::get('/getAllCarModels', 'Car\Masters\CarModelController@getAllCarModels')->name('getAllCarModels');

        Route::resource('carVersions', 'Car\Masters\CarVersionController');
        Route::get('/getAllCarVersions', 'Car\Masters\CarVersionController@getAllCarVersions')->name('getAllCarVersions');

        Route::resource('carBodyTypes', 'Car\Masters\CarBodyTypeController');
        Route::get('/getAllCarBodyTypes', 'Car\Masters\CarBodyTypeController@getAllCarBodyTypes')->name('getAllCarBodyTypes');

        Route::resource('carFuelTypes', 'Car\Masters\CarFuelTypeController');
        Route::get('/getAllCarFuelTypes', 'Car\Masters\CarFuelTypeController@getAllCarFuelTypes')->name('getAllCarFuelTypes');

        Route::resource('carTransmissionTypes', 'Car\Masters\CarTransmissionTypeController');
        Route::get('/getAllCarTransmissionTypes', 'Car\Masters\CarTransmissionTypeController@getAllCarTransmissionTypes')->name('getAllCarTransmissionTypes');

        Route::post('/allCarModelsByBrandId', 'Car\Masters\CarModelController@allCarModelsByBrandId')->name('allCarModelsByBrandId');
        /*** Car Masters ***/

/*** Bike Masters**/
Route::resource('bikeBrands', 'Bike\Masters\BikeBrandController');
Route::get('/getAllBikeBrands', 'Bike\Masters\BikeBrandController@getAllBikeBrands')->name('getAllBikeBrands');

Route::resource('bikeModels', 'Bike\Masters\BikeModelController');
Route::get('/getAllBikeModels', 'Bike\Masters\BikeModelController@getAllBikeModels')->name('getAllBikeModels');

Route::resource('bikeVersions','Bike\Masters\BikeVersionController');
Route::get('/getAllBikeVersions', 'Bike\Masters\BikeVersionController@getAllBikeVersions')->name('getAllBikeVersions');



Route::resource('bikeFuelTypes', 'Bike\Masters\BikeFuelTypeController');
Route::get('/getAllBikeFuelTypes', 'Bike\Masters\BikeFuelTypeController@getAllBikeFuelTypes')->name('getAllBikeFuelTypes');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Admin
Route::get('/profile', 'AdminController@profile')->name('profile');
Route::get('/edit_profile', 'AdminController@edit')->name('edit');
Route::patch('/edit_profile', 'AdminController@update')->name('update');
Route::get('/change_password', 'AdminController@change_password')->name('password_change');
Route::patch('/change_password', 'AdminController@update_password')->name('change_password');

/*==== Masters Start */
Route::resource('brands', 'BrandController');

Route::get('/allBrands', 'BrandController@getAll')->name('allBrands');
/* ===== Blog Start =========== */

// Blog Controller
Route::resource('blogs', 'BlogController');
Route::get('/allBlogs', 'BlogController@getAll')->name('allBlogs');

/* ===== Blog End =========== */


/* ===== Access Management Start =========== */
Route::resource('users', 'UserController');
Route::get('/allUser', 'UserController@getAll')->name('allUser.users');
Route::get('/export', 'UserController@export')->name('export');

Route::resource('permissions', 'PermissionController');
Route::get('/allPermissions', 'PermissionController@getAll')->name('allPermissions');

Route::resource('roles', 'RoleController');
Route::get('/allRoles', 'RoleController@getAll')->name('allRoles');

/* ===== Settings Start =========== */

// Settings Controller
Route::resource('settings', 'SettingsController');
Route::get('/allSettings', 'SettingsController@getAll')->name('allSettings');

/* ===== Settings End =========== */

/* ===== Backup Start =========== */

Route::get('backups', 'BackupController@index');
Route::get('allBackups', 'BackupController@getAll')->name('allBackups');
Route::post('backups/db_backup', 'BackupController@db_backup');
Route::post('backups/full_backup', 'BackupController@full_backup');
Route::get('backups/download/{file_name}', 'BackupController@download');
Route::delete('backups/delete/{file_name}', 'BackupController@delete');

/* ===== Backup End =========== */


// Examples

Route::get('/barcode', 'AdminController@barcode');
Route::get('/passport', 'AdminController@passport');