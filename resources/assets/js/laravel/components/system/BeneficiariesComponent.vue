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
                        <h3 class="block-title">Beneficiarios</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarBeneficiario()">
                                    <i class="fa fa-plus mr-5"></i>Agregar beneficiario
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="beneficiarios.length != 0" class="block-content">
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
                                <tr v-for="beneficiario in beneficiarios" :key="beneficiario.index">
                                    <th class="text-center" scope="row">{{ beneficiario.id }}</th>
                                    <td>{{ beneficiario.name }}</td>
                                    <td>{{ beneficiario.rfc }}</td>
                                    <td>{{ beneficiario.suburb }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionBeneficiario(beneficiario)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarBeneficiario(beneficiario)">
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
        <div class="modal fade show" id="agregarBeneficiario" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Beneficiario
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
                                        <input v-model="beneficiario.name" type="text" class="form-control" name="name" placeholder="">
                                        <label for="material-text">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="beneficiario.rfc" type="text" class="form-control" name="rfc" placeholder="">
                                        <label for="material-text">RFC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="beneficiario.address" type="text" class="form-control" name="address" placeholder="">
                                        <label for="material-text">Dirección</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="beneficiario.suburb" type="text" class="form-control" name="suburb" placeholder="">
                                        <label for="material-text">Colonia</label>
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

        <!-- Modal editar beneficiario -->
        <div class="modal fade show" id="editarBeneficiario" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Beneficiario
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
                                        <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                                        <label for="material-text">Titulo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarBeneficiario.rfc" type="text" class="form-control" name="editrfc" placeholder="">
                                        <label for="material-text">RFC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarBeneficiario.address" type="text" class="form-control" name="editaddress" placeholder="">
                                        <label for="material-text">Dirección</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarBeneficiario.suburb" type="text" class="form-control" name="editsuburb" placeholder="">
                                        <label for="material-text">Colonia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarBeneficiario(actualizarBeneficiario)" >Guardar</button>
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
                beneficiario:{
                    'id': '',
                    'name': '',
                    'rfc': '',
                    'address': '',
                    'suburb': ''
                },

                lista:{
                    'id':''
                },

                actualizarBeneficiario:{
                    'id':'',
                    'name': '',
                    'rfc': '',
                    'address': '',
                    'suburb': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                beneficiarios:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerBeneficiarios()
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
            agregarBeneficiario: function(){
                $('#agregarBeneficiario').modal('show');
               
            },

            guardarBeneficiario: function(){
                let URL = '/beneficiarios/store/';

                axios.post(URL, 
                    this.beneficiario
                ).then((response) => {
                    $('#agregarBeneficiario').modal('hide');
                    this.obtenerBeneficiarios();
                    this.beneficiario.name='';
                    this.beneficiario.rfc = '';
                    this.beneficiario.address = '';
                    this.beneficiario.suburb = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerBeneficiarios: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/beneficiarios/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.beneficiarios = response.data;
                    console.log(this.beneficiarios);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarBeneficiario: function(actualizarBeneficiario){
                let URL = '/beneficiarios/editar/'+ actualizarBeneficiario.id;
                axios.put(URL,this.actualizarBeneficiario).then((response)=>{
                    $('#editarBeneficiario').modal('hide');
                    this.obtenerBeneficiarios();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionBeneficiario: function(beneficiario){
                this.actualizarBeneficiario = beneficiario;
                    $('#editarBeneficiario').modal('show');
            },

            /*completarBeneficiario:function(beneficiario){
                
                let URL = '/dashboard/lista/tarea/' + beneficiario.id;
                axios.put(URL,beneficiario).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarBeneficiario: function(beneficiario){
                let URL = '/beneficiarios/eliminar/' + beneficiario.id;
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
                                    this.obtenerBeneficiarios();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El beneficiario se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>