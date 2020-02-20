<template>
<section class="bg-white content">
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-material">
                        <select v-model="actualizarBeneficiario.name" class="form-control" id="lista">
                                            <option value="">Elige una categoria</option>
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
                        <label for="material-text">Tipo póliza</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-material">
                        <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                        <label for="material-text">Mes</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-material">
                        <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                        <label for="material-text">Póliza No.</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-material">
                        <input v-model="actualizarBeneficiario.name" type="date" class="form-control" name="editname" placeholder="">
                        <label for="material-text">Fecha</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-material">
                <textarea v-model="actualizarBeneficiario.rfc" rows="4" class="form-control" name="editrfc" placeholder=""></textarea>
                <label for="material-text">Concepto de la póliza</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <div class="form-material">
                <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                <label for="material-text">Fecha</label>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-material">
                <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                <label for="material-text">Fecha</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-material">
                <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                <label for="material-text">Fecha</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-material">
                <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                <label for="material-text">Fecha</label>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-material">
                <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                <label for="material-text">Fecha</label>
            </div>
        </div>
            <div class="col-md-3">
                <div class="form-material">
                    <select v-model="actualizarBeneficiario.name" class="form-control" id="lista">
                                        <option value="">Elige una categoria</option>
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
                    <label for="material-text">Tipo póliza</label>
                </div>
            </div>
    </div>
    <div class="form-group row">
        <div class="col-md-9">
            <div class="form-material">
                <textarea v-model="actualizarBeneficiario.rfc" class="form-control" name="editrfc" placeholder=""></textarea>
                <label for="material-text">Concepto de la póliza</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8">
            <div class="form-material">
                <input v-model="actualizarBeneficiario.name" type="text" class="form-control" name="editname" placeholder="">
                <label for="material-text">Fecha</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8">
            <div class="form-material">
                    <select v-model="actualizarBeneficiario.name" class="form-control" id="lista">
                                        <option value="">Elige una categoria</option>
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
                    <label for="material-text">Tipo póliza</label>
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