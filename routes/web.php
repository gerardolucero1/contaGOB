<?php

use App\Guest;
use App\Task;
use App\Project;
use App\Companion;
use App\GuestList;
use Illuminate\Http\Request;

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

// Web routes
Route::get('/', 'Web\IndexController@index');

Auth::routes();

// System routes

Route::group(['middleware' => ['auth']], function () {
    
    Route::match(['get', 'post'], '/dashboard', 'System\SystemController@index')->name('dashboard.admin');


    // Catalago routes
    Route::get('dashboard/catalogos/{catalogo}', 'System\CatalogsController@index')->name('catalogs.index');
    Route::get('dashboard/polizas', 'System\PoliciesController@index')->name('policies.index');
    Route::get('dashboard/emisionpagoporgastos', 'System\PoliciesController@index')->name('policies.index');

    // Users routes
    Route::get('dashboard/usuarios', 'System\UsersController@index')->name('users.index');
    Route::get('dashboard/usuarios/create', 'System\UsersController@create')->name('users.create');
    Route::get('dashboard/usuarios/edit/{id}', 'System\UsersController@edit')->name('users.edit');
    Route::post('dashboard/usuarios', 'System\UsersController@store')->name('users.store');
    Route::put('dashboard/usuarios/{id}', 'System\UsersController@update')->name('users.update');
    Route::delete('dashboard/usuarios/{id}', 'System\UsersController@destroy')->name('users.delete');
        //Clientes routes
        Route::get('dashboard/clientes', 'System\UsersController@clientesIndex')->name('clientes.index');


    // Events routes
    Route::resource('dashboard/events', 'System\EventController');
 
        // Get cliente project
        Route::get('proyecto/cliente/{id}', function($id){
            $project = Project::find($id);

            return $project->user;
        });

        // Get companions list
        Route::get('lista/acompanantes/{id}', function($id){
            $list = GuestList::find($id);
            $guests = Guest::where('guestList_id', $list->id)->with('companions')->get();

            return $guests;
        });
    // My List routes
    Route::resource('mi-lista', 'System\MyListController');
    Route::put('actualizar-listas', 'System\MyListController@updateAll');

    // Client dashboard 
    Route::get('cliente/', 'System\ClientController@index')->name('dashboard.client');

        // Guests
        Route::get('cliente/invitados', 'System\GuestController@index')->name('guests.index'); 
        // Update guest status
        Route::put('actualizar-estatus-invitado/{id}', function(Request $request, $id){
            $guest = Guest::find($id);
            $guest->status = $request->status;
            if($request != 'CONFIRMADO'){
                $guest->dataX = null;
                $guest->dataY = null;
                $guest->seated = false;
            }
            $guest->save();
            return;
        });
        // Update companion status
        Route::put('actualizar-estatus-acompanante/{id}', function(Request $request, $id){
            $companion = Companion::find($id);
            $companion->status = $request->status;
            if($request != 'CONFIRMADO'){
                $companion->dataX = null;
                $companion->dataY = null;
                $companion->seated = false;
            }
            $companion->save();
            return;
        });

    //Lista de invitados
    Route::resource('cliente/lista', 'System\GuestController');

    //Lista de acompanantes
    Route::resource('cliente/acompanante', 'System\CompanionController');

    // Tables routes
    Route::get('cliente/tables', 'System\TablesController@index')->name('tables.index');
    Route::get('cliente/tables/invitados', 'System\TablesController@invitados')->name('tables.invitados');
    Route::put('cliente/tables/{id}', 'System\TablesController@update')->name('tables.update');
    Route::put('cliente/tables/limpiar/{id}', 'System\TablesController@destroy')->name('tables.delete');
    Route::put('cliente/tables/asignar-mesa/{id}', 'System\TablesController@asignarMesa')->name('tables.asignarMesa');
    Route::get('cliente/tables/proyecto', 'System\TablesController@project')->name('tables.project');

    //Obtener listas del cliente
    Route::get('cliente/obtener-listas/{id}', 'System\ClientController@obtenerListas')->name('client.obtenerListas');
        //Vista tarea
        Route::get('cliente/tareas/{id}', 'System\ClientController@tareas')->name('client.tareas');
        Route::get('obtener-tareas/{id}', 'System\ClientController@obtenerTareas')->name('client.obtenerTareas');
        Route::get('completar-tarea/{id}', function($id){
            $tarea = Task::findOrFail($id);
            $tarea->complete = true;
            $tarea->save();
            return;
        });

        Route::get('retornar-tarea/{id}', function($id){
            $tarea = Task::findOrFail($id);
            $tarea->complete = false;
            $tarea->save();
            return;
        });


    // Quotation Routes
    Route::get('dashboard/cotizacion', 'System\QuotationController@index')->name('quotation.index');
    Route::post('Quotation', 'System\QuotationController@store')->name('quotation.store');
    Route::delete('dashboard/cotizacion/{id}', 'System\QuotationController@destroy')->name('quotation.delete');
    Route::get('quotation/{id}', 'System\QuotationController@show')->name('quotation.show');
    Route::get('dashboard/cotizaciones', 'System\QuotationController@getQuotation')->name('quotation.getQuotation');

    // ProfileRoutes
    Route::get('dashboard/perfil', 'System\ProfileController@index')->name('users.Profile');
    Route::get('dashboard/perfil/create', 'System\ProfileController@create')->name('profile.create');
    Route::post('dashboard/perfil', 'System\ProfileController@store')->name('profile.store');
    Route::get('dashboard/perfil/{id}', 'System\ProfileController@edit')->name('profile.edit');
    Route::put('dashboard/perfil/{id}', 'System\ProfileController@update')->name('profile.update');

    // Task Routes
        // Block
    Route::get('dashboard/block', 'System\BlocktaskController@index')->name('block.index');
    Route::get('dashboard/blocks/get', 'System\BlocktaskController@getBlock')->name('block.getBlock');
    Route::get('dashboard/users/get', 'System\BlocktaskController@getUsers')->name('block.getUsers');
    Route::post('dashboard/block/save', 'System\BlocktaskController@store')->name('block.store');
    Route::put('dashboard/block/update/{id}', 'System\BlocktaskController@update')->name('block.update');
    Route::delete('dashboard/block/delete/{id}', 'System\BlocktaskController@destroy')->name('block.destroy');

        // List
    Route::get('dashboard/lista', 'System\ListtaskController@index')->name('list.index');
    Route::get('dashboard/list/get/{id}', 'System\ListtaskController@getLists')->name('list.getLists');
    Route::put('dashboard/list/update/{id}', 'System\ListTaskController@update')->name('list.update');
    Route::post('dashboard/lista/store', 'System\ListtaskController@store')->name('list.store');
    Route::get('dashboard/lista/{id}', 'System\ListtaskController@show')->name('list.show');
    Route::delete('dashboard/lista/delete/{id}', 'System\ListtaskController@destroy')->name('list.destroy');

        Route::get('dashboard/obtener-bloque/{id}', 'System\ListtaskController@obtenerBloque')->name('obtenerBloque');
    

        // Task
    Route::get('dashboard/tarea', 'System\TaskController@index')->name('task.index');
    Route::post('dashboard/lista/tarea/store', 'System\TaskController@store')->name('task.store');
    Route::delete('dashboard/lista/tarea/tarea/{id}', 'System\TaskController@destroy')->name('task.destroy');
    Route::get('dashboard/lista/tarea/{id}', 'System\TaskController@show')->name('task.show');
    Route::put('dashboard/lista/tarea/{id}', 'System\TaskController@update')->name('task.update');
    Route::get('dashboard/tareas/{id}', 'System\TaskController@getTask')->name('task.getTask');

        Route::get('dashboard/obtener-lista/{id}', 'System\TaskController@obtenerLista')->name('obtenerLista');

    //Graficas
    Route::get('dashboard/estadisticas', 'System\SystemController@estadisticasIndex')->name('estadisticas.index');
        //Obtener datos
        Route::get('grafica-obtener-datos', 'System\SystemController@obtenerDatos');

    //Catalogo Beneficiarios
    Route::get('beneficiarios/obtener-lista', 'System\CatalogsController@obtenerListaBeneficiaries')->name('beneficiaries.table');
    Route::post('beneficiarios/store', 'System\CatalogsController@storeBeneficiaries')->name('beneficiaries.store');
    Route::put('beneficiarios/editar/{id}', 'System\CatalogsController@updateBeneficiaries')->name('beneficiaries.update');
    Route::delete('beneficiarios/eliminar/{id}', 'System\CatalogsController@destroyBeneficiaries')->name('beneficiaries.destroy');

    //Catalogo Proveedores
    Route::get('proveedores/obtener-lista', 'System\CatalogsController@obtenerListaProvider')->name('provider.table');
    Route::post('proveedores/store', 'System\CatalogsController@storeProvider')->name('provider.store');
    Route::put('proveedores/editar/{id}', 'System\CatalogsController@updateProvider')->name('provider.update');
    Route::delete('proveedores/eliminar/{id}', 'System\CatalogsController@destroyProvider')->name('provider.destroy');

    //Catalogo Cuentas Bancarias
    Route::get('cuentasbancarias/obtener-lista', 'System\CatalogsController@obtenerListaBankAccount')->name('bankaccount.table');
    Route::post('cuentasbancarias/store', 'System\CatalogsController@storeBankAccount')->name('bankaccount.store');
    Route::put('cuentasbancarias/editar/{id}', 'System\CatalogsController@updateBankAccount')->name('bankaccount.update');
    Route::delete('cuentasbancarias/eliminar/{id}', 'System\CatalogsController@destroyBankAccount')->name('bankaccount.destroy');

    //Catalogo Momentos contables
    Route::get('momentoscontables/obtener-lista', 'System\CatalogsController@obtenerListaAccountingMoment')->name('bankaccount.table');
    Route::post('momentoscontables/store', 'System\CatalogsController@storeAccountingMoment')->name('bankaccount.store');
    Route::put('momentoscontables/editar/{id}', 'System\CatalogsController@updateAccountingMoment')->name('bankaccount.update');
    Route::delete('momentoscontables/eliminar/{id}', 'System\CatalogsController@destroyAccountingMoment')->name('bankaccount.destroy');

    //Catalogo Tipos de Cuentas
    Route::get('tiposdecuentas/obtener-lista', 'System\CatalogsController@obtenerListaTiposCuentas')->name('accounttype.table');
    Route::post('tiposdecuentas/store', 'System\CatalogsController@storeTiposCuentas')->name('accounttype.store');
    Route::put('tiposdecuentas/editar/{id}', 'System\CatalogsController@updateTiposCuentas')->name('accounttype.update');
    Route::delete('tiposdecuentas/eliminar/{id}', 'System\CatalogsController@destroyTiposCuentas')->name('accounttype.destroy');

    //Catalogo Clasificacion administrativa interna
    Route::get('clasificacionadmininterna/obtener-lista', 'System\CatalogsController@obtenerInternalAdminClassification')->name('internaladminclassification.table');
    Route::post('clasificacionadmininterna/store', 'System\CatalogsController@storeInternalAdminClassification')->name('internaladminclassification.store');
    Route::put('clasificacionadmininterna/editar/{id}', 'System\CatalogsController@updateInternalAdminClassification')->name('internaladminclassification.update');
    Route::delete('clasificacionadmininterna/eliminar/{id}', 'System\CatalogsController@destroyInternalAdminClassification')->name('internaladminclassification.destroy');

    //Catalogo Plan de cuentas CONAC
    Route::get('planesconac/obtener-lista', 'System\CatalogsController@obtenerListaAccountPlanCONAC')->name('accountplanconac.table');
    Route::post('planesconac/store', 'System\CatalogsController@storeAccountPlanCONAC')->name('accountplanconac.store');
    Route::put('planesconac/editar/{id}', 'System\CatalogsController@updateAccountPlanCONAC')->name('accountplanconac.update');
    Route::delete('planesconac/eliminar/{id}', 'System\CatalogsController@destroyAccountPlanCONAC')->name('accountplanconac.destroy');

    //Catalogo Clasifiación administrativa CONAC
    Route::get('adminconac/obtener-lista', 'System\CatalogsController@obtenerListaAdminClassificationCONAC')->name('adminconac.table');
    Route::post('adminconac/store', 'System\CatalogsController@storeAdminClassificationCONAC')->name('adminconac.store');
    Route::put('adminconac/editar/{id}', 'System\CatalogsController@updateAdminClassificationCONAC')->name('adminconac.update');
    Route::delete('adminconac/eliminar/{id}', 'System\CatalogsController@destroyAdminClassificationCONAC')->name('adminconac.destroy');
        
    //Catalogo Clasifiador por objeto del gasto
    Route::get('clasificdelgasto/obtener-lista', 'System\CatalogsController@obtenerClassifierByExpenditure')->name('classifierbyexpendinture.table');
    Route::post('clasificdelgasto/store', 'System\CatalogsController@storeClassifierByExpenditure')->name('classifierbyexpendinture.store');
    Route::put('clasificdelgasto/editar/{id}', 'System\CatalogsController@updateClassifierByExpenditure')->name('classifierbyexpendinture.update');
    Route::delete('clasificdelgasto/eliminar/{id}', 'System\CatalogsController@destroyClassifierByExpenditure')->name('classifierbyexpendinture.destroy');

    //Catalogo Clasifiador por objeto del gasto
    Route::get('clasificrubroingresos/obtener-lista', 'System\CatalogsController@obtenerClassifierRevenueCategory')->name('classifierrevenue.table');
    Route::post('clasificrubroingresos/store', 'System\CatalogsController@storeClassifierRevenueCategory')->name('classifierrevenue.store');
    Route::put('clasificrubroingresos/editar/{id}', 'System\CatalogsController@updateClassifierRevenueCategory')->name('classifierrevenue.update');
    Route::delete('clasificrubroingresos/eliminar/{id}', 'System\CatalogsController@destroyClassifierRevenueCategory')->name('classifierrevenue.destroy');

    //Catalogo Clasificacion funcional
    Route::get('classificacionfuncional/obtener-lista', 'System\CatalogsController@obtenerClassifierRevenueCategory')->name('functionalcassification.table');
    Route::post('classificacionfuncional/store', 'System\CatalogsController@storeClassifierRevenueCategory')->name('functionalcassification.store');
    Route::put('classificacionfuncional/editar/{id}', 'System\CatalogsController@updateClassifierRevenueCategory')->name('functionalcassification.update');
    Route::delete('classificacionfuncional/eliminar/{id}', 'System\CatalogsController@destroyClassifierRevenueCategory')->name('functionalcassification.destroy');

    //Catalogo Cuentas
    Route::get('cuentas/obtener-lista', 'System\CatalogsController@obtenerClassifierRevenueCategory')->name('accounts.table');
    Route::post('cuentas/store', 'System\CatalogsController@storeClassifierRevenueCategory')->name('accounts.store');
    Route::put('cuentas/editar/{id}', 'System\CatalogsController@updateClassifierRevenueCategory')->name('accounts.update');
    Route::delete('cuentas/eliminar/{id}', 'System\CatalogsController@destroyClassifierRevenueCategory')->name('accounts.destroy');
});




