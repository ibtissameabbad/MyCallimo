<template> 
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
          
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                    <button class="btn btn-success"  @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data_table">
                  <thead>
                    <tr>
                       <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user,index) in users" :key="user.id">
                    <td>{{index + 1}}</td>
                    <td>{{user.f_name}}</td>
                    <td>{{user.l_name}}</td>
                    <td>{{user.phone}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.role.name}}</td>
                      <td style="padding-left: 24px;">
                         <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        
                        <a href="#" @click="deleteUser(user.id)">
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
                        <input v-model="form.f_name" type="text" name="f_name"
                            placeholder="First Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('f_name') }">
                        <has-error :form="form" field="f_name"></has-error>
                    </div>
					
					  <div class="form-group">
                        <input v-model="form.l_name" type="text" name="l_name"
                            placeholder="Last Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('l_name') }">
                        <has-error :form="form" field="l_name"></has-error>
                    </div>
			
                      <div class="form-group">
                        <input v-model="form.email" type="email" name="email"
                            placeholder="Email Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                     <div class="form-group">
                        <input v-model="form.phone" type="phone" name="phone"
                            placeholder="Telephone"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                        <has-error :form="form" field="phone"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.chat_status" type="text" name="chat_status"
                            placeholder="chat Status"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('adress') }">
                        <has-error :form="form" field="chat_status"></has-error>
                    </div>
                    
                     <div class="form-group">
                         <label for="parent_user">Chef d'équipe</label>
                        <select name="parent_user" v-model="form.parent_user_id" class="form-control">
                    
                            <option v-for="item in users" :value="item.id" :key="item.id">{{item.f_name}}</option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role_id" v-model="form.role_id" class="form-control">
                    
                            <option v-for="item in roles" :value="item.id" :key="item.id">{{item.name}}</option>
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
    },
    data() {
            return {
			editmode: false,
              roles : [],
                users: {},
               form: new Form({
                id : null,
                f_name : '',
                l_name : '',
                phone : '',
                adress :'',
                password : '',
                chat_status : '',
                email : '',
                role_id : null,
                parent_user_id: null,
            })
            }
        },

        methods: {
          init(){
            axios.get('api/admin/users')
                .then( res=> {
                    this.users = res.data;
                   $(document).ready( function () {
                        $('#data_table').DataTable();
                    });
                })
                .catch (
                    (error) => console.log(error)
                ),
                axios.get('/api/roles')
                    .then( res=>{
                        this.roles = res.data
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
		
          axios.put('api/admin/edit/user',this.form)
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
					 
                axios.delete('api/admin/delete/user/'+id)
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
                axios.post('api/admin/add/user',this.form)
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
        },

}

                   

</script>

<style scoped>

div#data_table_length.dataTables_length{
    padding-top: 0px;
    padding-left: 12px;
}
label{
    padding-top: 12px;
    padding-right:12px; 
}
div#addNew.modal.fade.show{
    padding: 15px 30px ;
}

</style>
