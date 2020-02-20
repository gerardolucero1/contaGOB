<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccountingMoment;
use App\AccountType;
use App\BankAccount;
use App\Beneficiaries;
use App\Provider;
use App\InternalAdminClassification;
use App\AccountPlanCONAC;
use App\AdminClassificationCONAC;
use App\ClassificatorByExpenditure;
use App\ClassifierRevenueCategory;
use App\FunctionalClassification;

class CatalogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($catalogo)
    {
        //$projects = Project::orderBy('id', 'DESC')->get();
        return view('system.catalogs.index',compact('catalogo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //MÉTODOS MOMENTOS CONTABLES
    public function obtenerListaAccountingMoment(){
        $moment = AccountingMoment::orderBy('id', 'ASC')->get();
        return $moment;
    }

    public function storeAccountingMoment(Request $request)
    {
        $moment = AccountingMoment::create($request->all());
        return;
    }

    public function updateAccountingMoment(Request $request, $id)
    {
        $moment = AccountingMoment::find($id);
        $moment->fill($request->all())->save();
        return;
    }

    public function destroyAccountingMoment($id)
    {
        $moment = AccountingMoment::find($id);
        $moment->delete();
        return;
    }

    //MÉTODOS TIPOS DE CUENTAS
    public function obtenerListaTiposCuentas(){
        $tipocuenta = AccountType::orderBy('id', 'ASC')->get();
        return $tipocuenta;
    }

    public function storeTiposCuentas(Request $request)
    {
        $tipocuenta = AccountType::create($request->all());
        return;
    }

    public function updateTiposCuentas(Request $request, $id)
    {
        $tipocuenta = AccountType::find($id);
        $tipocuenta->fill($request->all())->save();
        return;
    }

    public function destroyTiposCuentas($id)
    {
        $tipocuenta = AccountType::find($id);
        $tipocuenta->delete();
        return;
    }

    //MÉTODOS CUENTAS BANCARIAS
    public function obtenerListaBankAccount(){
        $account = BankAccount::orderBy('id', 'ASC')->get();
        return $account;
    }

    public function storeBankAccount(Request $request)
    {
        $account = BankAccount::create($request->all());
        return;
    }

    public function updateBankAccount(Request $request, $id)
    {
        $account = BankAccount::find($id);
        $account->fill($request->all())->save();
        return;
    }

    public function destroyBankAccount($id)
    {
        $account = BankAccount::find($id);
        $account->delete();
        return;
    }

    //MÉTODOS DE BENEFICIARIOS
    public function obtenerListaBeneficiaries(){
        $beneficiari = Beneficiaries::orderBy('id', 'ASC')->get();
        return $beneficiari;
    }

    public function storeBeneficiaries(Request $request){
        $beneficiari = Beneficiaries::create($request->all());
        return;
    }

    public function updateBeneficiaries(Request $request, $id)
    {
        $beneficiari = Beneficiaries::find($id);
        $beneficiari->fill($request->all())->save();
        return;
    }

    public function destroyBeneficiaries($id)
    {
        $beneficiari = Beneficiaries::find($id);
        $beneficiari->delete();
        return;
    }

    //MÉTODOS PROVEEDORES
    public function obtenerListaProvider(){
        $provider = Provider::orderBy('id', 'ASC')->get();
        return $provider;
    }

    public function storeProvider(Request $request){
        $provider = Provider::create($request->all());
        return;
    }

    public function updateProvider(Request $request, $id)
    {
        $provider = Provider::find($id);
        $provider->fill($request->all())->save();
        return;
    }

    public function destroyProvider($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return;
    }

    //MÉTODOS CLASIFICACION ADMINISTRATIVA INTERNA
    public function obtenerInternalAdminClassification(){
        $internalclassif = InternalAdminClassification::orderBy('id', 'ASC')->get();
        return $internalclassif;
    }

    public function storeInternalAdminClassification(Request $request){
        $internalclassif = InternalAdminClassification::create($request->all());
        return;
    }

    public function updateInternalAdminClassification(Request $request, $id)
    {
        $internalclassif = InternalAdminClassification::find($id);
        $internalclassif->fill($request->all())->save();
        return;
    }

    public function destroyInternalAdminClassification($id)
    {
        $internalclassif = InternalAdminClassification::find($id);
        $internalclassif->delete();
        return;
    }

    //MÉTODOS PLAN DE CUENTAS CONAC
    public function obtenerListaAccountPlanCONAC(){
        $planconac = AccountPlanCONAC::orderBy('id', 'ASC')->get();
        return $planconac;
    }

    public function storeAccountPlanCONAC(Request $request){
        $planconac = AccountPlanCONAC::create($request->all());
        return;
    }

    public function updateAccountPlanCONAC(Request $request, $id)
    {
        $planconac = AccountPlanCONAC::find($id);
        $planconac->fill($request->all())->save();
        return;
    }

    public function destroyAccountPlanCONAC($id)
    {
        $planconac = AccountPlanCONAC::find($id);
        $planconac->delete();
        return;
    }

    //MÉTODOS CLASIFICACION ADMINISTRATIVA CONAC
    public function obtenerListaAdminClassificationCONAC(){
        $adminconac = AdminClassificationCONAC::orderBy('id', 'ASC')->get();
        return $adminconac;
    }

    public function storeAdminClassificationCONAC(Request $request){
        $adminconac = AdminClassificationCONAC::create($request->all());
        return;
    }

    public function updateAdminClassificationCONAC(Request $request, $id)
    {
        $adminconac = AdminClassificationCONAC::find($id);
        $adminconac->fill($request->all())->save();
        return;
    }

    public function destroyAdminClassificationCONAC($id)
    {
        $adminconac = AdminClassificationCONAC::find($id);
        $adminconac->delete();
        return;
    }

    //MÉTODOS CLASIFICADOR POR OBJETO DEL GASTO
    public function obtenerClassifierByExpenditure(){
        $adminconac = ClassificatorByExpenditure::orderBy('id', 'ASC')->get();
        return $adminconac;
    }

    public function storeClassifierByExpenditure(Request $request){
        $adminconac = ClassificatorByExpenditure::create($request->all());
        return;
    }

    public function updateClassifierByExpenditure(Request $request, $id)
    {
        $adminconac = ClassificatorByExpenditure::find($id);
        $adminconac->fill($request->all())->save();
        return;
    }

    public function destroyClassifierByExpenditure($id)
    {
        $adminconac = ClassificatorByExpenditure::find($id);
        $adminconac->delete();
        return;
    }

    //MÉTODOS CLASIFICADOR POR RUBRO DE INGRESOS
    public function obtenerClassifierRevenueCategory(){
        $classifier = ClassifierRevenueCategory::orderBy('id', 'ASC')->get();
        return $classifier;
    }

    public function storeClassifierRevenueCategory(Request $request){
        $classifier = ClassifierRevenueCategory::create($request->all());
        return;
    }

    public function updateClassifierRevenueCategory(Request $request, $id)
    {
        $classifier = ClassifierRevenueCategory::find($id);
        $classifier->fill($request->all())->save();
        return;
    }

    public function destroyClassifierRevenueCategory($id)
    {
        $classifier = ClassifierRevenueCategory::find($id);
        $classifier->delete();
        return;
    }

    //MÉTODOS CLASIFICACION FUNCIONAL
    public function obtenerFunctionalClassification(){
        $functionalclassif = FunctionalClassification::orderBy('id', 'ASC')->get();
        return $functionalclassif;
    }

    public function storeFunctionalClassification(Request $request){
        $functionalclassif = FunctionalClassification::create($request->all());
        return;
    }

    public function updateFunctionalClassification(Request $request, $id)
    {
        $functionalclassif = FunctionalClassification::find($id);
        $functionalclassif->fill($request->all())->save();
        return;
    }

    public function destroyFunctionalClassification($id)
    {
        $functionalclassif = FunctionalClassification::find($id);
        $functionalclassif->delete();
        return;
    }
}
