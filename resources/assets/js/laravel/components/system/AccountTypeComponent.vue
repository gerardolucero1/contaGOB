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
                        <h3 class="block-title">Tipo de cuenta</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarTipoCuenta()">
                                    <i class="fa fa-plus mr-5"></i>Agregar tipo de cuenta
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="tiposdecuentas.length != 0" class="block-content">
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
                                <tr v-for="tipocuenta in tiposdecuentas" :key="tipocuenta.index">
                                    <th class="text-center" scope="row">{{ tipocuenta.id }}</th>
                                    <td>{{ tipocuenta.key }}</td>
                                    <td>{{ tipocuenta.description }}</td>
                                    <td>{{ tipocuenta.nature }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionTipoCuenta(tipocuenta)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarTipoCuenta(tipocuenta)">
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
        <div class="modal fade show" id="agregarTipoCuenta" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Tipo de cuenta
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
                                        <input v-model="tipocuenta.key" type="text" class="form-control" name="name" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="tipocuenta.description" type="text" class="form-control" name="address" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <select v-model="tipocuenta.nature" class="form-control" id="lista">
                                            <option value="">Elige una fuente</option>
                                            <option value="Planificacion">Planificacion</option>
                                            <option value="Tramites Matrimonio">Tramites Matrimonio</option>
                                            <option value="Ceremonia">Ceremonia</option>
                                            <option value="Salon y Catering">Salon y Catering</option>
                                            <option value="Musica">Musica</option>
                                            <option value="Recuerdos de Boda">Recuerdos de Boda</option>
                                            <option value="Flores y Decoracion">Flores y Decoracion</option>
                                            <option value="Fotografia y Video">Fotografia y Video</option>
                                            <option value="Transportes">Transportes</option>
                                            <option value="Joyeria">Joyeria</option>
                                            <option value="Novia y Complementos">Novia y Complementos</option>
                                            <option value="Novio y Accesorios">Novio y Accesorios</option>
                                            <option value="Belleza y Salud">Belleza y Salud</option>
                                            <option value="Luna de Miel">Luna de Miel</option>
                                            <option value="Mesa de Regalos">Mesa de Regalos</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        <label for="material-text">Naturaleza</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarTipoCuenta()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar beneficiario -->
        <div class="modal fade show" id="editarTipodeCuenta" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Tipo de Cuenta
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
                                        <input v-model="actualizarTiposdeCuenta.key" type="text" class="form-control" name="editname" placeholder="">
                                        <label for="material-text">Clave</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <input v-model="actualizarTiposdeCuenta.description" type="text" class="form-control" name="editaddress" placeholder="">
                                        <label for="material-text">Descripción</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <select v-model="actualizarTiposdeCuenta.nature" class="form-control" id="lista">
                                            <option value="">Elige una fuente</option>
                                            <option value="Planificacion">Planificacion</option>
                                            <option value="Tramites Matrimonio">Tramites Matrimonio</option>
                                            <option value="Ceremonia">Ceremonia</option>
                                            <option value="Salon y Catering">Salon y Catering</option>
                                            <option value="Musica">Musica</option>
                                            <option value="Recuerdos de Boda">Recuerdos de Boda</option>
                                            <option value="Flores y Decoracion">Flores y Decoracion</option>
                                            <option value="Fotografia y Video">Fotografia y Video</option>
                                            <option value="Transportes">Transportes</option>
                                            <option value="Joyeria">Joyeria</option>
                                            <option value="Novia y Complementos">Novia y Complementos</option>
                                            <option value="Novio y Accesorios">Novio y Accesorios</option>
                                            <option value="Belleza y Salud">Belleza y Salud</option>
                                            <option value="Luna de Miel">Luna de Miel</option>
                                            <option value="Mesa de Regalos">Mesa de Regalos</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        <label for="material-text">Naturaleza</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarTipodeCuenta(actualizarTiposdeCuenta)" >Guardar</button>
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
                tipocuenta:{
                    'id': '',
                    'key': '',
                    'description': '',
                    'nature': ''
                },

                lista:{
                    'id':''
                },

                actualizarTiposdeCuenta:{
                    'id':'',
                    'key': '',
                    'description': '',
                    'nature': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                tiposdecuentas:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerTiposdeCuentas()
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
            agregarTipoCuenta: function(){
                $('#agregarTipoCuenta').modal('show');
               
            },

            guardarTipoCuenta: function(){
                let URL = '/tiposdecuentas/store/';

                axios.post(URL, 
                    this.tipocuenta
                ).then((response) => {
                    $('#agregarTipoCuenta').modal('hide');
                    this.obtenerTiposdeCuentas();
                    this.tipocuenta.key='';
                    this.tipocuenta.description = '';
                    this.tipocuenta.nature = '';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerTiposdeCuentas: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/tiposdecuentas/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.tiposdecuentas = response.data;
                    //console.log(this.tiposdecuentas);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarTipodeCuenta: function(actualizarTiposdeCuenta){
                let URL = '/tiposdecuentas/editar/'+ actualizarTiposdeCuenta.id;
                axios.put(URL,this.actualizarTiposdeCuenta).then((response)=>{
                    $('#editarTipodeCuenta').modal('hide');
                    this.obtenerTiposdeCuentas();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionTipoCuenta: function(tipocuenta){
                this.actualizarTiposdeCuenta = tipocuenta;
                    $('#editarTipodeCuenta').modal('show');
            },

            /*completarBeneficiario:function(beneficiario){
                
                let URL = '/dashboard/lista/tarea/' + beneficiario.id;
                axios.put(URL,beneficiario).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarTipoCuenta: function(tipocuenta){
                let URL = '/tiposdecuentas/eliminar/' + tipocuenta.id;
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
                                    this.obtenerTiposdeCuentas();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'El tipo de cuenta se ha eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>