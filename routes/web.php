<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[
    'as'=>'trangchu',
    'uses'=>'UserController@index',
]);
// thao tác đăng nhập Sơn
Route::get('/login',[
    'as'=>'taikhoan.login',
    'uses'=>'UserController@login',
]);
// Sơn
Route::post('/xulilogin',[
    'as'=>'taikhoan.xulilogin',
    'uses'=>'UserController@xulilogin',
]);
// Sơn
Route::get('/dangxuat',[
    'as'=>'taikhoan.dangxuat',
    'uses'=>'UserController@dangxuat',
]);

// can bo
// hậu
Route::prefix('taikhoan')->group(function(){
    Route::get('/index',[
        'as'=>'taikhoan.index',
        'uses'=>'UserController@index_taikhoan',
    ]);
    Route::get('/getbyid/{id}',[
        'as'=>'taikhoan.getbyid',
        'uses'=>'UserController@getbyid',
    ]);
    Route::put('/edit',[
        'as'=>'taikhoan.edit',
        'uses'=>'UserController@edit',
    ]);
    // Viêt
    Route::get('/delete/{id}',[
        'as'=>'taikhoan.delete',
        'uses'=>'UserController@delete',
    ]);
});
// Hậu improt excel Bệnh viện
Route::prefix('import')->group(function(){
    Route::get('/index_tonvinh',[
        'as'=>'import.index_tonvinh',
        'uses'=>'ExceltonvinhController@index_tonvinh',
    ]);
    Route::post('/xuly_tonvinh',[
        'as'=>'import.xuly_tonvinh',
        'uses'=>'ExceltonvinhController@xuly_tonvinh',
    ]);

});
// kiểm duyệt
// Hậu
Route::prefix('kiemduyet')->group(function(){
    Route::get('/index',[
        'as'=>'kiemduyet.index',
        'uses'=>'LichsuexcelltonvinhController@index_kiemduyet',
    ]);
    Route::post('/xulyimport_one',[
        'as'=>'kiemduyet.xulyimport_one',
        'uses'=>'LichsuexcelltonvinhController@xulyimport_one',
    ]);
    Route::post('/xulyimport_check',[
        'as'=>'kiemduyet.xulyimport_check',
        'uses'=>'LichsuexcelltonvinhController@xulyimport_check',
    ]);
    Route::get('/getbyvungdot/{id_vung}/{id_dot}',[
        'as'=>'kiemduyet.getbyvungdot',
        'uses'=>'LichsuexcelltonvinhController@getbyvungdot',
    ]);
    Route::post('/newdottonvinh',[
        'as'=>'kiemduyet.newdottonvinh',
        'uses'=>'LichsuexcelltonvinhController@newdottonvinh',
    ]);
    Route::get('/kiemduyettonvinhlancuoi',[
        'as'=>'kiemduyet.kiemduyettonvinhlancuoi',
        'uses'=>'LichsuexcelltonvinhController@kiemduyettonvinhlancuoi',
    ]);

});
//Sơn
Route::prefix('dsdexuat')->group(function(){
    Route::get('/index',[
        'as'=>'dsdexuat.index',
        'uses'=>'DsdexuatController@index',
    ]);
    Route::post('/xuliindex',[
        'as'=>'dsdexuat.xuliindex',
        'uses'=>'DsdexuatController@xulyindex',
    ]);
    Route::post('/editdsdexuat',[
        'as'=>'dsdexuat.editdsdexuat',
        'uses'=>'DsdexuatController@editdsdexuat',
    ]);
});
// // sơn
// Route::prefix('nguoihienmau')->group(function(){
//     Route::get('/index',[
//         'as'=>'nguoihienmau.index',
//         'uses'=>'NguoihienmauController@index',
//     ]);
//     Route::post('/xulitimkiem',[
//         'as'=>'nguoihienmau.xulitimkiem',
//         'uses'=>'NguoihienmauController@xulitimkiem',
//     ]);
// });
// Sơn, việt tiềm kiếm
Route::prefix('timkiem')->group(function(){
    // Sơn
    Route::get('/timkiemnguoi',[
        'as'=>'timkiem.timkiemnguoi',
        'uses'=>'TimkiemController@timkiemnguoi',
    ]);
    Route::post('/xulitimkiem',[
        'as'=>'timkiem.xulitimkiem',
        'uses'=>'TimkiemController@xulitimkiem',
    ]);
    // Việt
    Route::get('/timkiemedit/{id}',[
        'as'=>'timkiem.timkiemedit',
        'uses'=>'TimkiemController@timkiemedit',
    ]);
    Route::post('/xulysuatimkiem',[
        'as'=>'timkiem.xulysuatimkiem',
        'uses'=>'TimkiemController@xulysuatimkiem',
    ]);



});
// // Toàn
//     Route::get('/xuatfiletonvinh',[
//         'as'=>'xuatfiletonvinh',
//         'uses'=>'LichsuexcelltonvinhController@xuatfileindex',
//     ]);
//     Route::get('/quenmatkhau',[
//         'as'=>'quenmatkhau',
//         'uses'=>'UserController@quenmatkhau',
//     ]);

// import bệnh viện Tường

Route::get('/user/import',[
    'as'=>'page.import_show',
    'uses'=>'ExcelbenhvienController@import_show',
]);
Route::post('/import',[
    'as'=>'page.import_stores',
    'uses'=>'ExcelbenhvienController@import_stores',
]);
Route::post('/newdottonvinh',[
    'as'=>'page.newdonvibv',
    'uses'=>'ExcelbenhvienController@newdonvibv',
]);
Route::post('/benhvienadd',[
    'as'=>'page.benhvien_add',
    'uses'=>'ExcelbenhvienController@benhvien_add',
]);

//xem lịch sử ton vinh
Route::prefix('lichsutonvinh')->group(function(){
    Route::get('/index',[
        'as'=>'lichsutonvinh.index',
        'uses'=>'LichsutonvinhController@index',
    ]);
    Route::post('/xuliindex',[
        'as'=>'lichsutonvinh.xuliindex',
        'uses'=>'LichsutonvinhController@xuliindex',
    ]);
});
// taọ tài khoản Tường
Route::get('/register','UserController@show_register') -> name('page.show_register');
Route::post('register','UserController@store') -> name('page.post');
// Route::get('/test','UserController@test') -> name('page.post111');

#region Toàn xuất file
Route::get('/xuatfiletonvinh',[
    'as'=>'xuatfiletonvinh',
    'uses'=>'LichsuexcelltonvinhController@xuatfileindex',
]);
Route::post('/tiemkiemxuatfiletonvinh}',[
    'as'=>'tiemkiemxuatfiletonvinh',
    'uses'=>'LichsuexcelltonvinhController@tiemkiemxuatfiletonvinh',
]);
Route::get('exporttonvinh/{id_dot}',['as'=>'exporttonvinh','uses'=>'LichsuexcelltonvinhController@exporttonvinh']);
Route::get('/quenmatkhau',function()
{
    return view('quenmatkhau');
})->name("quenmatkhau");

Route::post('quenmatkhau',['as'=>'quenmatkhau','uses'=>'UserController@quenmatkhau']);

Route::get('/doimatkhau',function()
{
    return view('doimatkhau');
})->name("doimatkhau");
Route::post('doimatkhau',['as'=>'doimatkhau','uses'=>'UserController@doimatkhau']);


#endregion
