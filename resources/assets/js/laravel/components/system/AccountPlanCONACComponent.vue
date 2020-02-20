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
                        <h3 class="block-title">Plan de cuentas CONAC</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarPlanCONAC()">
                                    <i class="fa fa-plus mr-5"></i>Agregar plan de cuentas CONAC
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="planesconac.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th>Naturaleza</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="planconac in planesconac" :key="planconac.index">
                                    <th class="text-center" scope="row">{{ planconac.id }}</th>
                                    <td>{{ planconac.key }}</td>
                                    <td>{{ planconac.description }}</td>
                                    <td>{{ planconac.nature }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionplanconac(planconac)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarplanconac(planconac)">
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

        <!-- Modal para agregar planconac --> 
        <div class="modal fade show" id="agregarPlanCONAC" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Plan de cuentas CONAC
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
                                        <input v-model="planconac.key" type="text" class="form-control" name="name" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="planconac.description" type="text" class="form-control" name="rfc" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="planconac.nature" type="text" class="form-control" name="address" placeholder="">
                                        <label for="material-text">Naturaleza</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="planconac.clasification" type="text" class="form-control" name="suburb" placeholder="">
                                        <label for="material-text">Clasificación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarPlanCONAC()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar planconac -->
        <div class="modal fade show" id="editarPlanCONAC" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Plan de cuentas CONAC
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
                                        <input v-model="actualizarCuentasCONAC.key" type="text" class="form-control" name="editname" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarCuentasCONAC.description" type="text" class="form-control" name="editrfc" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarCuentasCONAC.nature" type="text" class="form-control" name="editaddress" placeholder="">
                                        <label for="material-text">Naturaleza</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarCuentasCONAC.clasification" type="text" class="form-control" name="editsuburb" placeholder="">
                                        <label for="material-text">Clasificación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarPlanCONAC(actualizarCuentasCONAC)" >Guardar</button>
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
                planconac:{
                    'id': '',
                    'key': '',
                    'description': '',
                    'nature': '',
                    'clasification': ''
                },

                lista:{
                    'id':''
                },

                actualizarCuentasCONAC:{
                    'id':'',
                    'key': '',
                    'description': '',
                    'nature': '',
                    'clasification': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                planesconac:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerPlanCONAC()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
           /* obtenerLista: function(){
                //let path = window.location.pathname.split('/')
                let URL = '/planesconac/obtener-lista/';

                axios.get(URL).then((response) => {
                    this.lista = response.data
                }).catch((error) => {
                    console.log(error.data)
                })
            },*/
    /* C-rear planconac */
            agregarPlanCONAC: function(){
                $('#agregarPlanCONAC').modal('show');
               
            },

            guardarPlanCONAC: function(){
                let URL = '/planesconac/store/';

                axios.post(URL, 
                    this.planconac
                ).then((response) => {
                    $('#agregarPlanCONAC').modal('hide');
                    this.obtenerPlanCONAC();
                    this.planconac.key='';
                    this.planconac.description = '';
                    this.planconac.nature = '';
                    this.planconac.clasification = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerPlanCONAC: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/planesconac/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.planesconac = response.data;
                    console.log(this.planesconac);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarPlanCONAC: function(actualizarCuentasCONAC){
                let URL = '/planesconac/editar/'+ actualizarCuentasCONAC.id;
                axios.put(URL,this.actualizarCuentasCONAC).then((response)=>{
                    $('#editarPlanCONAC').modal('hide');
                    this.obtenerPlanCONAC();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionplanconac: function(planconac){
                this.actualizarCuentasCONAC = planconac;
                    $('#editarPlanCONAC').modal('show');
            },

            /*completarplanconac:function(planconac){
                
                let URL = '/dashboard/lista/tarea/' + planconac.id;
                axios.put(URL,planconac).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarplanconac: function(planconac){
                let URL = '/planesconac/eliminar/' + planconac.id;
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
                                    this.obtenerPlanCONAC();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El planconac se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>