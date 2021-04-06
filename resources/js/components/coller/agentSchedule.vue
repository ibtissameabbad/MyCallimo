<template>
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
          
              <div class="card-header">
                <h3 class="card-title">Table des agents</h3>

              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data_table">
                  <thead>
                    <tr>
                       <th>#</th>
                    <th>Nom</th>
                    <th>prénom</th>
                    <th>Planning</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="/agentSchedul"  > 
                             
                        </a>

                    </td>
                      
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
            
        },
        data() {
            return {
                
            }
                
            
        },
        methods:{
            
            
            }           
        
    }     

    
</script>

