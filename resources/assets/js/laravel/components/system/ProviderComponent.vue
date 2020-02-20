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
                        <h3 class="block-title">Proveedores</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-alt-primary mr-5 mb-5" @click="agregarProveedor()">
                                    <i class="fa fa-plus mr-5"></i>Agregar proveedor
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="proveedores.length != 0" class="block-content">
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
                                <tr v-for="proveedor in proveedores" :key="proveedor.index">
                                    <th class="text-center" scope="row">{{ proveedor.id }}</th>
                                    <td>{{ proveedor.name }}</td>
                                    <td>{{ proveedor.rfc }}</td>
                                    <td>{{ proveedor.suburb }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionProveedor(proveedor)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarProveedor(proveedor)">
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
        <div class="modal fade show" id="agregarProveedor" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Proveedor
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
                                        <input v-model="proveedor.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="proveedor.rfc" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">RFC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="proveedor.address" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Dirección</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="proveedor.suburb" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Colonia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarProveedor()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar beneficiario -->
        <div class="modal fade show" id="editarProveedor" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Proveedor
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
                                        <input v-model="actualizarProveedor.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Titulo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarProveedor.rfc" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">RFC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarProveedor.address" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Dirección</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarProveedor.suburb" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Colonia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarProveedor(actualizarProveedor)" >Guardar</button>
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
                proveedor:{
                    'id': '',
                    'name': '',
                    'rfc': '',
                    'address': '',
                    'suburb': ''
                },

                lista:{
                    'id':''
                },

                actualizarProveedor:{
                    'id': '',
                    'name': '',
                    'rfc': '',
                    'address': '',
                    'suburb': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                proveedores:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerProveedores()
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
            agregarProveedor: function(){
                $('#agregarProveedor').modal('show');
               
            },

            guardarProveedor: function(){
                let URL = '/proveedores/store/';

                axios.post(URL, 
                    this.proveedor
                ).then((response) => {
                    $('#agregarProveedor').modal('hide');
                    this.obtenerProveedores();
                    this.proveedor.name = '';
                    this.proveedor.rfc = '';
                    this.proveedor.address = '';
                    this.proveedor.suburb = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerProveedores: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/proveedores/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.proveedores = response.data;
                    console.log(this.proveedores);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarProveedor: function(actualizarProveedor){
                let URL = '/proveedores/editar/'+ actualizarProveedor.id;
                axios.put(URL,this.actualizarProveedor).then((response)=>{
                    $('#editarProveedor').modal('hide');
                    this.obtenerProveedores();
                })
                
            },
            
            iniciaEdicionProveedor: function(proveedor){
                this.actualizarProveedor = proveedor;
                    $('#editarProveedor').modal('show');
            },

            completarBeneficiario:function(proveedor){
                
                let URL = '/dashboard/lista/tarea/' + beneficiario.id;
                axios.put(URL,beneficiario).then((response) =>{
                    /* this.obtenerTareas(); */
                })

            },

    /* D-Eliminar datos */ 
            eliminarProveedor: function(proveedor){
                let URL = '/proveedores/eliminar/' + proveedor.id;
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: 'No podras revertir esto!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                            if (result.value) {
                                axios.delete(URL).then((response) => {
                                    this.obtenerProveedores();
                                });
                        Swal.fire(
                        '¡Eliminado!',
                        'El proveedor se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>