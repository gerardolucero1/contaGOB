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
                        <h3 class="block-title">Momentos contables</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarMomentoContable()">
                                    <i class="fa fa-plus mr-5"></i>Agregar momento contable
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="momentoscontables.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Descripción</th>
                                    <th>Cuenta contable</th>
                                    <th>Tipo</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="momentocontable in momentoscontables" :key="momentocontable.index">
                                    <th class="text-center" scope="row">{{ momentocontable.id }}</th>
                                    <td>{{ momentocontable.description }}</td>
                                    <td>{{ momentocontable.accountingaccount }}</td>
                                    <td>{{ momentocontable.type }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionMomentoContable(momentocontable)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarMomentoContable(momentocontable)">
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

        <!-- Modal para agregar beneficiario --> 
        <div class="modal fade show" id="agregarMomentoContable" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Momento Contable
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="momentocontable.description" type="text" class="form-control" name="name" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="momentocontable.accountingaccount" type="text" class="form-control" name="address" placeholder="">
                                        <label for="material-text">Cuenta contable</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="momentocontable.type" type="text" class="form-control" name="suburb" placeholder="">
                                        <label for="material-text">Tipo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarMomentoContable()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar beneficiario -->
        <div class="modal fade show" id="editarMomentoContable" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Momento Contable
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarMomentoContable.description" type="text" class="form-control" name="editname" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarMomentoContable.accountingaccount" type="text" class="form-control" name="editaddress" placeholder="">
                                        <label for="material-text">Cuenta contable</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarMomentoContable.type" type="text" class="form-control" name="editsuburb" placeholder="">
                                        <label for="material-text">Tipo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarMomentoContable(actualizarMomentoContable)" >Guardar</button>
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
                momentocontable:{
                    'id': '',
                    'description': '',
                    'accountingaccount': '',
                    'type': ''
                },

                lista:{
                    'id':''
                },

                actualizarMomentoContable:{
                    'id':'',
                    'description': '',
                    'accountingaccount': '',
                    'type': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                momentoscontables:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerMomentosContables()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
           /* obtenerLista: function(){
                //let path = window.location.pathname.split('/')
                let URL = '/beneficiarios/obtener-lista/';

                axios.get(URL).then((response) => {
                    this.lista = response.data
                }).catch((error) => {
                    console.log(error.data)
                })
            },*/
    /* C-rear beneficiario */
            agregarMomentoContable: function(){
                $('#agregarMomentoContable').modal('show');
               
            },

            guardarMomentoContable: function(){
                let URL = '/momentoscontables/store/';

                axios.post(URL, 
                    this.momentocontable
                ).then((response) => {
                    $('#agregarMomentoContable').modal('hide');
                    this.obtenerMomentosContables();
                    this.momentocontable.name='';
                    this.momentocontable.rfc = '';
                    this.momentocontable.address = '';
                    this.momentocontable.suburb = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerMomentosContables: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/momentoscontables/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.momentoscontables = response.data;
                    console.log(this.momentoscontables);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarMomentoContable: function(actualizarMomentoContable){
                let URL = '/momentoscontables/editar/'+ actualizarMomentoContable.id;
                axios.put(URL,this.actualizarMomentoContable).then((response)=>{
                    $('#editarMomentoContable').modal('hide');
                    this.obtenerMomentosContables();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionMomentoContable: function(momentocontable){
                this.actualizarMomentoContable = momentocontable;
                    $('#editarMomentoContable').modal('show');
            },

            /*completarBeneficiario:function(beneficiario){
                
                let URL = '/dashboard/lista/tarea/' + beneficiario.id;
                axios.put(URL,beneficiario).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarMomentoContable: function(momentocontable){
                let URL = '/momentoscontables/eliminar/' + momentocontable.id;
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
                                    this.obtenerMomentosContables();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El momento contable se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>