<style>
.widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 250px !important;
}
.widget-user .card-footer{
    padding: 0;
}

</style>


<template>
    <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                        <li class="nav-item"><a class="nav-link active show" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Activity Tab -->
                            <div class="tab-pane" id="activity">
                                <h3 class="text-center">Display User Activity</h3>
                            </div>
                            <!-- Setting Tab -->
                            <div class="tab-pane active show" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                                    <div class="col-sm-12">
                                    <input type="" v-model="form.f_name" class="form-control" id="inputName" placeholder="First Name" :class="{ 'is-invalid': form.errors.has('f_name') }">
                                     <has-error :form="form" field="name"></has-error>
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                                    <div class="col-sm-12">
                                    <input type="" v-model="form.l_name" class="form-control" id="inputName" placeholder="Last Name" :class="{ 'is-invalid': form.errors.has('l_name') }">
                                     <has-error :form="form" field="l_name"></has-error>
                                    </div>

                                    
                                </div>
                                 <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-12">
                                    <input type="" v-model="form.password" class="form-control" id="inputName" placeholder="Password" :class="{ 'is-invalid': form.errors.has('passeword') }">
                                     <has-error :form="form" field="password"></has-error>
                                    </div>

                                    
                                </div>
                             
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-12">
                                    <button  type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
          </div>
          <!-- end tabs -->
        </div>
    </div>
</template>



<script>
    export default {
        data(){
            return {
                 form: new Form({
                    id:'',
                    f_name : '',
                    l_name: '',
                    password: '',
                    
                })
            }
        },
        mounted() {

            console.log('Component mounted.')
        },

        created() {
            axios.get("api/profile")
            .then(({ data }) => (this.form.fill(data)));
        }

        
    }
</script>
