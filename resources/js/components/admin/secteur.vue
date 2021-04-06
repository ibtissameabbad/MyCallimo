<template> 
   
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Les secteurs</h3>

                <div class="card-tools">
                    <button class="btn btn-success"  @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="table">
                  <thead>
                    <tr>
                       <th>#</th>
                    <th> Name</th>
                    <th>Nombre des habitants</th>
                    <th>Ville</th>
                    <th>Enable</th>
                    <th>Territoire</th>
                    <th >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(secteur,index) in secteurs" :key="secteur.id">
                    <td>{{index + 1}}</td>
                    <td>{{secteur.name}}</td>
                    <td>{{secteur.habitant}}</td>
                    <td>{{secteur.ville}}</td>
                    <td>{{secteur.enable}}</td>
                    <td>{{secteur.territoire_id.name}}</td>
                      <td>
                          <a href="#" @click="editModal(secteur)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        
                        <a href="#" @click="deleteUser(secteur.id)">
                            <i class="fa fa-trash red"></i>
                        </a>

                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              

              
            </div>
            
          </div>
        </div>

        

        <!-- Modal -->

        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateUser() : createUser()">
                <div class="modal-body">
                    
					
					        <div class="form-group">
                        <input v-model="form.name" type="text" name="name"
                            placeholder="Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>
					
			
			
                      <div class="form-group">
                        <input v-model="form.habitant" type="text" name="habitant"
                            placeholder="Nombre d'habitant"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('habitant') }">
                        <has-error :form="form" field="habitant"></has-error>
                    </div>
                     <div class="form-group">
                        <input v-model="form.ville" type="text" name="ville"
                            placeholder="ville"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('ville') }">
                        <has-error :form="form" field="ville"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.enable" type="text" name="enable"
                            placeholder="Enable"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('enable') }">
                        <has-error :form="form" field="enable"></has-error>
                    </div>

                     <div class="form-group">
                        <label for="role">Territoire</label>
                        <select name="territoire_id" v-model="form.territoire_id" class="form-control">
                    
                            <option v-for="item in territoires" :value="item.id" :key="item.id">{{item.name}}</option>
                        </select>
                    </div>
                </div>
				
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                </div>

                </form>

                </div>
            </div>
        </div>
</div>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery';
    export default {
      props: ['id'],
      created() { 
        this.init();
        Fire.$on('AfterCreate',() => {
               this.init();
           });
            setInterval(() => this.init(), 3000);
    },
    data() {
            return {
              editmode: false,
              territoires : [],
                secteurs: {},
                form: new Form({
                id : null,
                name : '',
                habitant : '',
                ville : '',
                enable : '',
                territoire_id : null,
                })
            
            
            }
        },

        methods: {

          
          init(){
            axios.get('api/secteurs')
                .then( res=> {
                    this.secteurs = res.data;
                    $(document).ready(function(){
                        $("#table").DataTable();
                    });
                })
                .catch (
                    (error) => console.log(error)
                ),
                axios.get('/api/territoires')
                    .then( res=>{
                        this.territoires = res.data
                    })
                    .catch(
                        (error) => console.log(error)
                    )

      },

       newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },

       editModal(user){
               this.form.clear();
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },

        updateUser(){
		
          axios.put('api/edit/secteur',this.form)
          .then(() => {
                    // success
                    $('#addNew').modal('hide');
                     swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });

        },

        deleteUser(id){
		        swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
					 if (result.value) {
					 
                axios.delete('api/delete/secteur/'+id)
                    .then( ()=>{
                                        swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },

            createUser(){
                axios.post('api/add/secteur',this.form)
                .then(()=>{
                    $('#addNew').modal('hide')

                   toast.fire({
                        icon: 'success',
                        title: 'User Created in successfully'
                        })
                    this.$Progress.finish();
                     Fire.$emit('AfterCreate');

                })
                .catch(()=>{

                })
            } 
        }
    }
</script>

                      