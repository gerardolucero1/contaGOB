@extends('layouts.backend')

@section('content')
<div class="content">
  @switch($catalogo)
    @case("beneficiarios")
      <h2 class="content-heading">Catálogo de beneficiarios</h2>
      <beneficiaries-component></beneficiaries-component>
      @break
      
    @case("proveedores")
    <h2 class="content-heading">Catálogo de proveedores</h2>
      <provider-component></provider-component>
      @break

    @case("cuentasbancarias")
    <h2 class="content-heading">Catálogo de cuentas bancarias</h2>
      <bankaccount-component></bankaccount-component>
      @break

    @case("momentoscontables")
    <h2 class="content-heading">Catálogo de momentos contables</h2>
      <accountingmoment-component></accountingmoment-component>
      @break

    @case("tipocuentas")
      <h2 class="content-heading">Catálogo de tipos de cuentas</h2>
      <accounttype-component></accounttype-component>
      @break

    @case("clasifadmininterna")
      <h2 class="content-heading">Catálogo de clasificación administrativa interna</h2>
      <internaladminclasification-component></internaladminclasification-component>
      @break

    @case("plancuentasconac")
      <h2 class="content-heading">Catálogo de planes de cuentas CONAC</h2>
      <accountplanconac-component></accountplanconac-component>
      @break

    @case("clasifadminconac")
      <h2 class="content-heading">Catálogo clasificación administrativa CONAC</h2>
      <adminconac-component></adminconac-component>
      @break

    @case("clasifobjetodelgasto")
      <h2 class="content-heading">Catálogo clasificadores por objeto del gasto</h2>
      <classifierbyexpendinture-component></classifierbyexpendinture-component>
      @break

    @case("clasifrubrodeingresos")
      <h2 class="content-heading">Catálogo de clasificadores por rubro de ingresos</h2>
      <classifierrevenuecategory-component></classifierrevenuecategory-component>
      @break

    @case("clasiffuncional")
      <h2 class="content-heading">Catalogo de clasificadores funcionales</h2>
      <functionalcassification-component></functionalcassification-component>
      @break

  @endswitch
  <!--<h2 class="content-heading">Catálogos</h2>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="beneficiaries-tab" data-toggle="tab" href="#beneficiaries" role="tab" aria-controls="beneficiaries" aria-selected="true">Beneficiarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="provider-tab" data-toggle="tab" href="#provider" role="tab" aria-controls="provider" aria-selected="false">Proveedores</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="bankaccount-tab" data-toggle="tab" href="#bankaccount" role="tab" aria-controls="bankaccount" aria-selected="false">Cuentas Bancarias</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="accountingmoment-tab" data-toggle="tab" href="#accountingmoment" role="tab" aria-controls="accountingmoment" aria-selected="false">Momentos contables</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="accounttype-tab" data-toggle="tab" href="#accounttype" role="tab" aria-controls="accounttype" aria-selected="false">Tipos de cuentas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="internaladmin-tab" data-toggle="tab" href="#internaladmin" role="tab" aria-controls="internaladmin" aria-selected="false">Clasific. administrativa interna</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="internaladmin-tab" data-toggle="tab" href="#accountplanconac" role="tab" aria-controls="accountplanconac" aria-selected="false">Plan de cuentas CONAC</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="adminconac-tab" data-toggle="tab" href="#adminconac" role="tab" aria-controls="adminconac" aria-selected="false">Clasific. administrativa CONAC</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="classifierbyexpendinture-tab" data-toggle="tab" href="#classifierbyexpendinture" role="tab" aria-controls="classifierbyexpendinture" aria-selected="false">Clasific. por objeto del gasto</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="classifierrevenuecategory-tab" data-toggle="tab" href="#classifierrevenuecategory" role="tab" aria-controls="classifierrevenuecategory" aria-selected="false">Clasific. por rubro de ingresos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="functionalcassification-tab" data-toggle="tab" href="#functionalcassification" role="tab" aria-controls="functionalcassification" aria-selected="false">Clasific. funcional</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="beneficiaries" role="tabpanel" aria-labelledby="beneficiari-tab"><beneficiaries-component></beneficiaries-component></div>
    <div class="tab-pane fade" id="provider" role="tabpanel" aria-labelledby="providers-tab"><provider-component></provider-component></div>
    <div class="tab-pane fade" id="bankaccount" role="tabpanel" aria-labelledby="bankaccounts-tab"><bankaccount-component></bankaccount-component></div>
    <div class="tab-pane fade" id="accountingmoment" role="tabpanel" aria-labelledby="accountingmoments-tab"><accountingmoment-component></accountingmoment-component></div>
    <div class="tab-pane fade" id="accounttype" role="tabpanel" aria-labelledby="accounttypeS-tab"><accounttype-component></accounttype-component></div>
    <div class="tab-pane fade" id="internaladmin" role="tabpanel" aria-labelledby="internaladmins-tab"><internaladminclasification-component></internaladminclasification-component></div>
    <div class="tab-pane fade" id="accountplanconac" role="tabpanel" aria-labelledby="accountplanconacs-tab"><accountplanconac-component></accountplanconac-component></div>
    <div class="tab-pane fade" id="adminconac" role="tabpanel" aria-labelledby="adminconacs-tab"><adminconac-component></adminconac-component></div>
    <div class="tab-pane fade" id="classifierbyexpendinture" role="tabpanel" aria-labelledby="classifierbyexpendintures-tab"><classifierbyexpendinture-component></classifierbyexpendinture-component></div>
    <div class="tab-pane fade" id="classifierrevenuecategory" role="tabpanel" aria-labelledby="classifierrevenuecategorys-tab"><classifierrevenuecategory-component></classifierrevenuecategory-component></div>
    <div class="tab-pane fade" id="functionalcassification" role="tabpanel" aria-labelledby="functionalcassifications-tab"><functionalcassification-component></functionalcassification-component></div>
  </div>-->
</div>
@endsection