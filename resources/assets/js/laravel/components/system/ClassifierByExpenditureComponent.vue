<style>

</style>

<template>
<section>
   <!--<section class="content">-->
        <div class="row" v-if="lista.length != 0">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <button type="button" class="btn btn-square btn-secondary mr-5 mb-5" onClick="history.back()">
                        <i class="fa fa-arrow-circle-left mr-5"></i>Regresar
                    </button>
                    <div class="block-content bg-pattern">
                        <div class="py-20 text-center">
                            <h1 class="h3 mb-5">{{ lista.name }}</h1>
                            <p class="mb-10 text-muted">
                                <em>{{ lista.created_at | formatoFecha }}</em>
                            </p>
                            <p>
                                Lista asignado a: {{ lista.block_list.name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Clasificador por objeto del gasto</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarClasificadordelGasto()">
                                    <i class="fa fa-plus mr-5"></i>Agregar clasificador por objeto del gasto
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="clasificadoresdelgasto.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Nombre</th>
                                    <th>RFC</th>
                                    <th>Dirección</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="clasificadordelgasto in clasificadoresdelgasto" :key="clasificadordelgasto.index">
                                    <th class="text-center" scope="row">{{ clasificadordelgasto.id }}</th>
                                    <td>{{ clasificadordelgasto.key }}</td>
                                    <td>{{ clasificadordelgasto.description }}</td>
                                    <td>{{ clasificadordelgasto.account }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionBeneficiario(clasificadordelgasto)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarClasificadordelGasto(clasificadordelgasto)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para agregar clasificadordelgasto --> 
        <div class="modal fade show" id="agregarClasificadordelGasto" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Clasificador por objeto del gasto
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input v-model="clasificadordelgasto.key" type="text" class="form-control" name="name" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="clasificadordelgasto.description" type="text" class="form-control" name="address" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input v-model="clasificadordelgasto.account" type="text" class="form-control" name="suburb" placeholder="">
                                        <label for="material-text">Cuenta</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarBeneficiario()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar clasificadordelgasto -->
        <div class="modal fade show" id="editarClasificadordelGasto" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Clasificador por objeto del gasto
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input v-model="actualizarClasificadordelGasto.key" type="text" class="form-control" name="editname" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarClasificadordelGasto.description" type="text" class="form-control" name="editaddress" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material">
                                        <input v-model="actualizarClasificadordelGasto.account" type="text" class="form-control" name="editsuburb" placeholder="">
                                        <label for="material-text">Cuenta</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarClasificadordelGasto(actualizarClasificadordelGasto)" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
   </section>
</template>

<script>
    export default {
    
        data(){
            return{
            /* Objetos para obtener los datos */
                clasificadordelgasto:{
                    'id': '',
                    'key': '',
                    'description': '',
                    'account': ''
                },

                lista:{
                    'id':''
                },

                actualizarClasificadordelGasto:{
                    'id':'',
                    'key': '',
                    'description': '',
                    'account': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                clasificadoresdelgasto:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerClasificadordelGasto()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
    /* C-rear clasificadordelgasto */
            agregarClasificadordelGasto: function(){
                $('#agregarClasificadordelGasto').modal('show');
               
            },

            guardarBeneficiario: function(){
                let URL = '/clasificdelgasto/store/';

                axios.post(URL, 
                    this.clasificadordelgasto
                ).then((response) => {
                    $('#agregarClasificadordelGasto').modal('hide');
                    this.obtenerClasificadordelGasto();
                    this.clasificadordelgasto.key='';
                    this.clasificadordelgasto.description = '';
                    this.clasificadordelgasto.account = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerClasificadordelGasto: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/clasificdelgasto/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.clasificadoresdelgasto = response.data;
                    console.log(this.clasificadoresdelgasto);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarClasificadordelGasto: function(actualizarClasificadordelGasto){
                let URL = '/clasificdelgasto/editar/'+ actualizarClasificadordelGasto.id;
                axios.put(URL,this.actualizarClasificadordelGasto).then((response)=>{
                    $('#editarClasificadordelGasto').modal('hide');
                    this.obtenerClasificadordelGasto();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionBeneficiario: function(clasificadordelgasto){
                this.actualizarClasificadordelGasto = clasificadordelgasto;
                    $('#editarClasificadordelGasto').modal('show');
            },

    /* D-Eliminar datos */ 
            eliminarClasificadordelGasto: function(clasificadordelgasto){
                let URL = '/clasificdelgasto/eliminar/' + clasificadordelgasto.id;
                    Swal.fire({
                        title: '¿Estas seguro?',
                        text: '¡No podras revertir esto!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                            if (result.value) {
                                axios.delete(URL).then((response) => {
                                    this.obtenerClasificadordelGasto();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El clasificadordelgasto se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>