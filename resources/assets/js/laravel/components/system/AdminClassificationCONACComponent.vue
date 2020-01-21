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
                        <h3 class="block-title">Clasificación administrativa CONAC</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarClasificacionCONAC()">
                                    <i class="fa fa-plus mr-5"></i>Agregar clasificación administrativa CONAC
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="adminconacs.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="clasificacionconac in adminconacs" :key="clasificacionconac.index">
                                    <th class="text-center" scope="row">{{ clasificacionconac.id }}</th>
                                    <td>{{ clasificacionconac.key }}</td>
                                    <td>{{ clasificacionconac.description }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionclasificacionconac(clasificacionconac)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarAdminClassificationCONAC(clasificacionconac)">
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

        <!-- Modal para agregar clasificacionconac --> 
        <div class="modal fade show" id="agregarClasificacionCONAC" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Clasificación Administrativa CONAC
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
                                        <input v-model="clasificacionconac.key" type="text" class="form-control" name="key" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="clasificacionconac.description" type="text" class="form-control" name="descripcion" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarClasificacionCONAC()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar clasificacionconac -->
        <div class="modal fade show" id="editarAdminClassicationCONAC" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Clasificación Administrativa CONAC
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
                                        <input v-model="actualizarAdminClassicationCONAC.key" type="text" class="form-control" name="key" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarAdminClassicationCONAC.description" type="text" class="form-control" name="descripcion" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarAdminClassicationCONAC(actualizarAdminClassicationCONAC)" >Guardar</button>
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
                clasificacionconac:{
                    'id': '',
                    'key': '',
                    'description': ''
                },

                lista:{
                    'id':''
                },

                actualizarAdminClassicationCONAC:{
                    'id':'',
                    'key': '',
                    'description': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                adminconacs:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerAdminClassicationCONAC()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {

    /* C-rear clasificacionconac */
            agregarClasificacionCONAC: function(){
                $('#agregarClasificacionCONAC').modal('show');
               
            },

            guardarClasificacionCONAC: function(){
                let URL = '/adminconac/store/';

                axios.post(URL, 
                    this.clasificacionconac
                ).then((response) => {
                    $('#agregarClasificacionCONAC').modal('hide');
                    this.obtenerAdminClassicationCONAC();
                    this.clasificacionconac.key = '';
                    this.clasificacionconac.description = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerAdminClassicationCONAC: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/adminconac/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.adminconacs = response.data;
                    console.log(this.adminconacs);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarAdminClassicationCONAC: function(actualizarAdminClassicationCONAC){
                let URL = '/adminconac/editar/'+ actualizarAdminClassicationCONAC.id;
                axios.put(URL,this.actualizarAdminClassicationCONAC).then((response)=>{
                    $('#editarAdminClassicationCONAC').modal('hide');
                    this.obtenerAdminClassicationCONAC();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionclasificacionconac: function(clasificacionconac){
                this.actualizarAdminClassicationCONAC = clasificacionconac;
                    $('#editarAdminClassicationCONAC').modal('show');
            },

    /* D-Eliminar datos */ 
            eliminarAdminClassificationCONAC: function(clasificacionconac){
                let URL = '/adminconac/eliminar/' + clasificacionconac.id;
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
                                    this.obtenerAdminClassicationCONAC();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El clasificacionconac se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>