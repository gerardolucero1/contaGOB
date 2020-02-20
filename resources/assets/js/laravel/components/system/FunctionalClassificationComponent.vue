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
                        <h3 class="block-title">Clasificaciones funcinales</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarClasificacionFuncional()">
                                    <i class="fa fa-plus mr-5"></i>Agregar clasificación funcinal
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="clasificacionesfuncinales.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Key</th>
                                    <th>Descripción</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="clasificacionfuncinal in clasificacionesfuncinales" :key="clasificacionfuncinal.index">
                                    <th class="text-center" scope="row">{{ clasificacionfuncinal.id }}</th>
                                    <td>{{ clasificacionfuncinal.key }}</td>
                                    <td>{{ clasificacionfuncinal.description }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionClasificacionFuncional(clasificacionfuncinal)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarClasificacionFuncional(clasificacionfuncinal)">
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

        <!-- Modal para agregar clasificacionfuncinal --> 
        <div class="modal fade show" id="agregarClasificacionFuncional" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Clasificación funcional
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
                                        <input v-model="clasificacionfuncinal.key" type="text" class="form-control" name="name" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="clasificacionfuncinal.description" type="text" class="form-control" name="address" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarClasificacionFuncional()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar clasificacionfuncinal -->
        <div class="modal fade show" id="editarClasificacionFuncional" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Clasificación funcional
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarClasificacionFuncional.key" type="text" class="form-control" name="editname" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarClasificacionFuncional.description" type="text" class="form-control" name="editaddress" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarClasificacionFuncional(actualizarClasificacionFuncional)" >Guardar</button>
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
                clasificacionfuncinal:{
                    'id': '',
                    'key': '',
                    'description': ''
                },

                lista:{
                    'id':''
                },

                actualizarClasificacionFuncional:{
                    'id':'',
                    'key': '',
                    'description': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                clasificacionesfuncinales:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerClasificacionFuncionales()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
           /* obtenerLista: function(){
                //let path = window.location.pathname.split('/')
                let URL = '/clasificacionesfuncinales/obtener-lista/';

                axios.get(URL).then((response) => {
                    this.lista = response.data
                }).catch((error) => {
                    console.log(error.data)
                })
            },*/
    /* C-rear clasificacionfuncinal */
            agregarClasificacionFuncional: function(){
                $('#agregarClasificacionFuncional').modal('show');
               
            },

            guardarClasificacionFuncional: function(){
                let URL = '/classificacionfuncional/store/';

                axios.post(URL, 
                    this.clasificacionfuncinal
                ).then((response) => {
                    $('#agregarClasificacionFuncional').modal('hide');
                    this.obtenerClasificacionFuncionales();
                    this.clasificacionfuncinal.name='';
                    this.clasificacionfuncinal.rfc = '';
                    this.clasificacionfuncinal.address = '';
                    this.clasificacionfuncinal.suburb = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerClasificacionFuncionales: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/classificacionfuncional/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.clasificacionesfuncinales = response.data;
                    console.log(this.clasificacionesfuncinales);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarClasificacionFuncional: function(actualizarClasificacionFuncional){
                let URL = '/classificacionfuncional/editar/'+ actualizarClasificacionFuncional.id;
                axios.put(URL,this.actualizarClasificacionFuncional).then((response)=>{
                    $('#editarClasificacionFuncional').modal('hide');
                    this.obtenerClasificacionFuncionales();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionClasificacionFuncional: function(clasificacionfuncinal){
                this.actualizarClasificacionFuncional = clasificacionfuncinal;
                    $('#editarClasificacionFuncional').modal('show');
            },

            /*completarBeneficiario:function(clasificacionfuncinal){
                
                let URL = '/dashboard/lista/tarea/' + clasificacionfuncinal.id;
                axios.put(URL,clasificacionfuncinal).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarClasificacionFuncional: function(clasificacionfuncinal){
                let URL = '/classificacionfuncional/eliminar/' + clasificacionfuncinal.id;
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
                                    this.obtenerClasificacionFuncionales();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El clasificacionfuncinal se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>