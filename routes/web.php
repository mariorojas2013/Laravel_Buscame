<?php

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

Route::post('enviar_mensaje','homeController@enviar_mensaje');


Route::get('enviar_noti/{texto}','homeController@enviar_noti');

Route::post('save_edit_desa','homeController@save_edit_desa');
Route::post('save_desa','homeController@save_desa');

Route::post('save_edit_user','homeController@save_edit_user');
Route::post('save_user','homeController@save_user');

Route::get('ver_user','homeController@ver_user');
Route::get('cerrarSesion','homeController@cerrarSesion');

Route::get('mas/{id_desaparecido}','homeController@mas');
Route::get('editar_reg_desa/{id_desaparecido}','homeController@editar_reg_desa');
Route::get('ver_mensajes_desa/{id_desaparecido}','homeController@ver_mensajes_desa');
Route::get('publicar_reg_desa/{id_desaparecido}','homeController@publicar_reg_desa');
Route::get('qpublicar_reg_desa/{id_desaparecido}','homeController@qpublicar_reg_desa');

Route::get('eliminar_reg_desa/{id_desaparecido}','homeController@eliminar_reg_desa');

Route::get('mensajes/{id_desaparecido}','homeController@mensajes');
Route::post('iniciar','homeController@iniciar');
Route::get('busqueda','homeController@busqueda');
Route::get('registro_des','homeController@registro_des');

Route::get('/home','homeController@index');
Route::get('/','homeController@index');