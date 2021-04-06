<template>
<div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
          
              <div class="card-header">
                <h3 class="card-title">Mes groupes </h3>

              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data_table">
                  <thead>
                    <tr>
                       <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Number of annonces affected</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user,index) in users" :key="user.id">
                    <td>{{index + 1}}</td>
                    <td>{{user.f_name}}</td>
                    <td>{{user.l_name}}</td>
                    <td>{{user.annonces.length}}</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>

        
    </div>

</template>

<script>
    export default {
        mounted() {
            let url = window.location.pathname;
            let url_id = url.substring(url.lastIndexOf('/') + 1);  
            this.init(url_id)
            
        },
        data() {
            return {
                editmode: false,
                collers:{},
                users:{},
                
            }
        },
        methods:{

            init(id){
               axios.get('/api/getTeams/'+id)
                    .then( res => {
                        this.users = res.data
                    }) 
                    .catch(
                        (error) => console.log(error)
                    )

            }
           
            }
        }
        

    
</script>
