<template>
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
          
              <div class="card-header">
                <h3 class="card-title">Annonces Table</h3>

              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data_table">
                  <thead>
                    <tr>
                       <th>#</th>
                    <th>Titre d'offre</th>
                    <th>Prix d'offre</th>
                    <th>Surface</th>
                    <th>type d'offre</th>
                    <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(userAnnonce,index) in UserAnnonces" :key="userAnnonce.id">
                    <td>{{index + 1}}</td>
                    <td>{{userAnnonce.annonce.offer_title}}</td>
                    <td>{{userAnnonce.annonce.offer_price}}</td>
                    <td>{{userAnnonce.annonce.offer_area}}</td>
                    <td>{{userAnnonce.annonce.offer_type}}</td>
                    <td>
                        <a v-bind:href="'/callannonce-'+userAnnonce.annonce.id" > 
                            <i class="fas fa-phone-square-alt blue"></i> 
                        </a>

                    </td>
                      
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
             <div class="modal-footer col-12 ">
            <!--<a v-bind:href="'/callannonce-'+UserAnnonces.annonce.id" > Next
            <i class="fas fa-arrow-right blue"></i> 
            </a>-->
         </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['id'],
        mounted() {
            this.init()
        },
        data() {
            return {
                UserAnnonces: {},
                
            
            }
        },

        methods:{
            init(){
                axios.get('/api/annonceProcessed')
                    .then( res=> {
                        this.UserAnnonces = res.data
                    })   
                    .catch(
                        (error) => console.log(error)
                    )

                 
            }
 
        }
    } 
    

    
</script>

