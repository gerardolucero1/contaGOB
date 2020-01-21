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
                        <h3 class="block-title">Cuentas bancarias</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-dual-secondary btn-rounded" @click="agregarCuentaBancaria()">
                                    <i class="fa fa-plus mr-5"></i>Agregar cuenta bancaria
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="cuentasbancarias.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Institución</th>
                                    <th>Cuenta contable</th>
                                    <th>Estado</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cuentabancaria in cuentasbancarias" :key="cuentabancaria.index">
                                    <th class="text-center" scope="row">{{ cuentabancaria.id }}</th>
                                    <td>{{ cuentabancaria.institution }}</td>
                                    <td>{{ cuentabancaria.accountingaccount }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span v-if="cuentabancaria.enable" class="badge badge-success">Habilitada</span>
                                        <span v-else class="badge badge-danger">Inhabilitada</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionCuentaBancaria(cuentabancaria)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarCuentaBancaria(cuentabancaria)">
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
        <div class="modal fade show" id="agregarCuentaBancaria" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Cuenta Bancaria
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
                                        <input v-model="cuentabancaria.institution" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Institución</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="cuentabancaria.accountnumber" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Num. cuenta</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="cuentabancaria.accountingaccount" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Cuenta contable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                    <input class="custom-control-input" type="checkbox" v-model="cuentabancaria.issuecheck" name="issuecheck" id="issuecheck" value="option1">
                                    <label class="custom-control-label" for="issuecheck">Emite cheques</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                    <input class="custom-control-input" type="checkbox" v-model="cuentabancaria.enable" name="enable" id="enable" value="option1">
                                    <label class="custom-control-label" for="enable">Habilitada</label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <select v-model="cuentabancaria.fundingsource" class="form-control" id="lista">
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
                                        <label for="material-text">Fuente de financiamiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="form-material">
                                        <input v-model="cuentabancaria.type" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Tipo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarCuentaBancaria()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar beneficiario -->
        <div class="modal fade show" id="editarCuentaBancaria" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Cuenta Bancaria
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
                                        <input v-model="actualizarCuentaBancaria.institution" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Institución</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarCuentaBancaria.accountnumber" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Num. cuenta</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="actualizarCuentaBancaria.accountingaccount" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Cuenta contable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                    <input class="custom-control-input" type="checkbox" v-model="actualizarCuentaBancaria.issuecheck" name="editissuecheck" id="editissuecheck">
                                    <label class="custom-control-label" for="editissuecheck">Emite cheques</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                    <input class="custom-control-input" type="checkbox" v-model="actualizarCuentaBancaria.enable" name="editenable" id="editenable">
                                    <label class="custom-control-label" for="editenable">Habilitada</label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <select v-model="actualizarCuentaBancaria.fundingsource" class="form-control" id="lista">
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
                                        <label for="material-text">Fuente de financiamiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="form-material">
                                        <input v-model="actualizarCuentaBancaria.type" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Tipo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarCuentaBancaria(actualizarCuentaBancaria)" >Guardar</button>
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
                cuentabancaria:{
                    'id': '',
                    'institution': '',
                    'accountnumber': '',
                    'accountingaccount': '',
                    'issuecheck': false,
                    'enable': false,
                    'fundingsource': '',
                    'type': ''
                },

                lista:{
                    'id':''
                },

                actualizarCuentaBancaria:{
                    'id':'',
                    'institution': '',
                    'accountnumber': '',
                    'accountingaccount': '',
                    'issuecheck': false,
                    'enable': false,
                    'fundingsource': '',
                    'type': ''
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                cuentasbancarias:[], 
                lista:'',
            }
        },
        created(){
            //this.obtenerLista()
            this.obtenerCuentasBancarias()
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
            agregarCuentaBancaria: function(){
                $('#agregarCuentaBancaria').modal('show');
               
            },

            guardarCuentaBancaria: function(){
                let URL = '/cuentasbancarias/store/';

                axios.post(URL, 
                    this.cuentabancaria
                ).then((response) => {
                    $('#agregarCuentaBancaria').modal('hide');
                    this.obtenerCuentasBancarias();
                    this.cuentabancaria.institution = '';
                    this.cuentabancaria.accountnumber = '';
                    this.cuentabancaria.accountingaccount = '';
                    this.cuentabancaria.issuecheck = false;
                    this.cuentabancaria.enable = false;
                    this.cuentabancaria.fundingsource = '';
                    this.cuentabancaria.type ='';
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

    /* R-Obtener datos */
            obtenerCuentasBancarias: function(){
                //let path = window.location.pathname.split('/');
                //var id_tarea = path[4];
                let URL = '/cuentasbancarias/obtener-lista/';
                axios.get(URL).then((response)=>{
                    this.cuentasbancarias = response.data;
                    console.log(this.cuentasbancarias);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarCuentaBancaria: function(actualizarCuentaBancaria){
                let URL = '/cuentasbancarias/editar/'+ actualizarCuentaBancaria.id;
                axios.put(URL,this.actualizarCuentaBancaria).then((response)=>{
                    $('#editarCuentaBancaria').modal('hide');
                    this.obtenerBeneficiarios();
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
            
            iniciaEdicionCuentaBancaria: function(cuentabancaria){
                this.actualizarCuentaBancaria = cuentabancaria;
                    $('#editarCuentaBancaria').modal('show');
            },

           /* completarBeneficiario:function(cuentabancaria){
                
                let URL = '/dashboard/lista/tarea/' + cuentabancaria.id;
                axios.put(URL,cuentabancaria).then((response) =>{
                     this.obtenerTareas(); 
                })

            },*/

    /* D-Eliminar datos */ 
            eliminarCuentaBancaria: function(cuentabancaria){
                let URL = '/cuentasbancarias/eliminar/' + cuentabancaria.id;
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
                                    this.obtenerCuentasBancarias();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'La cuenta se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>