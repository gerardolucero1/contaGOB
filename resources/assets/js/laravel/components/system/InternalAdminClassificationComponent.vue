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
                        <h3 class="block-title">Clasificación administrativa-interna</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarClassificacionAdminInterna()">
                                    <i class="fa fa-plus mr-5"></i>Agregar Clasificación administrativa interna
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="ClassificacionAdminInternas.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th>Área</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ClassificacionAdminInterna in ClassificacionAdminInternas" :key="ClassificacionAdminInterna.index">
                                    <th class="text-center" scope="row">{{ ClassificacionAdminInterna.id }}</th>
                                    <td>{{ ClassificacionAdminInterna.key }}</td>
                                    <td>{{ ClassificacionAdminInterna.description }}</td>
                                    <td>{{ ClassificacionAdminInterna.area }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionClassificacionAdminInterna(ClassificacionAdminInterna)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarClassificacionAdminInterna(ClassificacionAdminInterna)">
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

        <!-- Modal para agregar ClassificacionAdminInterna --> 
        <div class="modal fade show" id="agregarClassificacionAdminInterna" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Clasificación administrativa-interna
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
                                        <input v-model="ClassificacionAdminInterna.key" type="text" class="form-control" name="clave" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="ClassificacionAdminInterna.description" type="text" class="form-control" name="descripcion" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="ClassificacionAdminInterna.area" type="text" class="form-control" name="area" placeholder="">
                                        <label for="material-text">Área</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="ClassificacionAdminInterna.leadership" type="text" class="form-control" name="jefatura" placeholder="">
                                        <label for="material-text">Jefatura</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarClassificacionAdminInterna()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar ClassificacionAdminInterna -->
        <div class="modal fade show" id="editarClassificacionAdminInterna" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar ClassificacionAdminInterna
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
                                        <input v-model="actualizarClassificacionAdminInterna.key" type="text" class="form-control" name="editclave" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarClassificacionAdminInterna.description" type="text" class="form-control" name="editdesc" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarClassificacionAdminInterna.area" type="text" class="form-control" name="editarea" placeholder="">
                                        <label for="material-text">Área</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarClassificacionAdminInterna.leadership" type="text" class="form-control" name="editleader" placeholder="">
                                        <label for="material-text">Jefatura</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarClassificacionAdminInterna(actualizarClassificacionAdminInterna)" >Guardar</button>
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
                ClassificacionAdminInterna:{
                    'id': '',
                    'key': '',
                    'description': '',
                    'area': '',
                    'leadership': ''
                },

                lista:{
                    'id':''
                },

                actualizarClassificacionAdminInterna:{
                    'id':'',
                    'key': '',
                    'description': '',
                    'area': '',
                    'leadership': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                ClassificacionAdminInternas:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerClassificacionAdminInternas()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
           /* obtenerLista: function(){
                //let path = window.location.pathname.split('/')
                let URL = '/ClassificacionAdminInternas/obtener-lista/';

                axios.get(URL).then((response) => {
                    this.lista = response.data
                }).catch((error) => {
                    console.log(error.data)
                })
            },*/
    /* C-rear ClassificacionAdminInterna */
            agregarClassificacionAdminInterna: function(){
                $('#agregarClassificacionAdminInterna').modal('show');
               
            },

            guardarClassificacionAdminInterna: function(){
                let URL = '/clasificacionadmininterna/store/';

                axios.post(URL, 
                    this.ClassificacionAdminInterna
                ).then((response) => {
                    $('#agregarClassificacionAdminInterna').modal('hide');
                    this.obtenerClassificacionAdminInternas();
                    this.ClassificacionAdminInterna.key='';
                    this.ClassificacionAdminInterna.description = '';
                    this.ClassificacionAdminInterna.area = '';
                    this.ClassificacionAdminInterna.leadership = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerClassificacionAdminInternas: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/clasificacionadmininterna/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.ClassificacionAdminInternas = response.data;
                    console.log(this.ClassificacionAdminInternas);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarClassificacionAdminInterna: function(actualizarClassificacionAdminInterna){
                let URL = '/clasificacionadmininterna/editar/'+ actualizarClassificacionAdminInterna.id;
                axios.put(URL,this.actualizarClassificacionAdminInterna).then((response)=>{
                    $('#editarClassificacionAdminInterna').modal('hide');
                    this.obtenerClassificacionAdminInternas();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionClassificacionAdminInterna: function(ClassificacionAdminInterna){
                this.actualizarClassificacionAdminInterna = ClassificacionAdminInterna;
                    $('#editarClassificacionAdminInterna').modal('show');
            },

            /*completarClassificacionAdminInterna:function(ClassificacionAdminInterna){
                
                let URL = '/dashboard/lista/tarea/' + ClassificacionAdminInterna.id;
                axios.put(URL,ClassificacionAdminInterna).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarClassificacionAdminInterna: function(ClassificacionAdminInterna){
                let URL = '/clasificacionadmininterna/eliminar/' + ClassificacionAdminInterna.id;
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
                                    this.obtenerClassificacionAdminInternas();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El ClassificacionAdminInterna se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>