<template>
   <div class="container">
      <div class="row">
         <div class="col-3">
            <div class="modal-body" style="padding-top: 0px;">
               <ul class="list-group">
                  <li style="cursor: pointer" @click="step = 1" class="list-group-item">Annonce </li>
                  <li style="cursor: pointer" @click="step = 3" class="list-group-item">planning de l'agent commercial</li>
                  <li style="cursor: pointer"  @click="step = 2" class="list-group-item">Le type de l'appel</li>
                  <li style="cursor: pointer" @click="step = 4" class="list-group-item">Ajouter RDV</li>
               </ul>
            </div>
         </div>
         <div class="col-md-9" v-if="step == 1">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> Telephone <i class="fas fa-phone-square-alt green"></i></h3>
               </div>
               <div class="card-body table-responsive p-0">
                  <form @submit.prevent="editAnnonce()">
                     <div class="modal-body" >
                        <div class="form-group">
                         <label for="offer_type">Type de bien</label>
                              <select name="parent_user" v-model="annonce.offer_type" class="form-control">
                            <option  value="Maison" >Maison</option>
                            <option  value="Appartement" >Appartement</option>
                            <option  value="Terrain" >Terrain</option>
                            <option  value="Autre" >Autre</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="offer_city">Ville</label>
                           <input v-model="annonce.offer_city" type="text" name="offer_city"
                              class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="surface">Surface</label>
                           <input v-model="annonce.offer_area" type="text" name="surface"
                              class="form-control"  >
                        </div>
                        <div class="form-group">
                        <label for="phone">Telephone</label>
                           <input v-model="annonce.offer_telephone" type="text" name="phone"
                              class="form-control"  >
                        </div>
                        <div class="form-group">
                        <label for="price">Le premier Prix </label>
                           <input v-model="annonce.offer_price" type="text" name="price"
                              class="form-control" >
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button  type="submit" class="btn btn-success">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-9" v-if="step == 2">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> Type d'appel </h3>
               </div>
               <div class="card-body table-responsive p-0">
                  <form @submit.prevent="saveAnnoceCall(annonce.id)">
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="typeCall">Type d'appel</label>
                           <select name="typeCall"  v-model="annonceCall.call_type_id"   class="form-control">
                              <option v-for="item in typeCalls" :value="item.id" :key="item.id">{{item.type}}</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <textarea type="textarea" name="remarque" v-mode="annonceCall.remarque"
                              placeholder="Remarque"
                              class="form-control" >
                           </textarea> 
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button  type="submit" class="btn btn-success">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-9" v-if="step == 3">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> liste des agents commercial:
                     <b> Secteur {{annonce.sector.lib_sector}} </b> 
                  </h3>
               </div>
               <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="data_table">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Nom</th>
                           <th>prenom</th>
                           <th>Telephone</th>
                           <th>Email</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(agent,index) in agents" :key="agent.id">
                           <td>{{index + 1}}</td>
                           <td>{{agent.compte_nom}}</td>
                           <td>{{agent.compte_prenom}}</td>
                           <td>{{agent.compte_tel}}</td>
                           <td>{{agent.compte_email}}</td>
                           <td>
                           <button type="button" class="btn btn-info" >envoyer email</button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-9" v-if="step == 4">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> test <i class="fas fa-phone-square-alt green"></i></h3>
               </div>
               <div class="card-body table-responsive p-0">
                  <form>
                     <div class="modal-body" >
                        <div class="form-group">
                           <input v-model="annonce.offer_type" type="text" name="offer_type"
                              placeholder="Type de bien"
                              class="form-control" >
                        </div>
                        <div class="form-group">
                           <input v-model="annonce.offer_city" type="text" name="offer_city"
                              placeholder="Ville"
                              class="form-control"  >
                        </div>
                        <div class="form-group">
                           <input v-model="annonce.offer_area" type="text" name="surface"
                              placeholder="Surface"
                              class="form-control"  >
                        </div>
                        <div class="form-group">
                           <input v-model="annonce.offer_pices" type="text" name="text"
                              placeholder="Telephone"
                              class="form-control"  >
                        </div>
                        <div class="form-group">
                           <input v-model="annonce.offer_price" type="text" name="price"
                              placeholder="le premier prix"
                              class="form-control" >
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button  type="submit" class="btn btn-success">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="modal-footer col-12 ">
         <div v-for="(annonce,index) in annonceTraite" :key="annonce.id">
         <!--<pagination :data="annonceTraite" @pagination-change-page="">-->
           <div class="card"> <a style="padding-left: 6px;padding-right: 6px;"  v-bind:href="'/callannonce-'+annonce.annonce.id" > {{index + 1}}
           
            </a>
           </div>
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
   export default {
       
       mounted() {
           let url = window.location.pathname;
           let url_id = url.substring(url.lastIndexOf('-') + 1);
           this.getAnnonceById(url_id);
           this.init();
           this.getAnnonceTraite();
           
       },
       data() {
           return {
               typeCalls: {},
               annonces:{},
               annonceTraite: {},
               agents: {},
               annonce: {
                   id : null,
                   offer_type : '',
                   offer_area : null,
                   offer_pices : null,
                   offer_price :null,
                   offer_city : '',
                   offer_title : '',
                   call_type_id : null
               },
               annonceCall: {
                  id: null,
                  start_call:'',
                  end_call : '',
                  recorder_voice_call : '',
                  remarque : '',
                  call_archive : '',
                  call_type_id: null,

               },
               
               step : 1
               
           }
       },
       methods:{
           init(){
               axios.get('/api/allTypeCall')
                   .then( res=> {
                       this.typeCalls = res.data
                        
                   })   
                   .catch(
                       (error) => console.log(error)
                   ),

               axios.get('/api/test')
                   .then( res=> {
                       this.agents = res.data;
                       $(document).ready( function () {
                        $('#data_table').DataTable();
                    });
                   })   
                   .catch(
                       (error) => console.log(error)
                   )    


                 
           },
   
           getAnnonceById(id){
               axios.get('/api/getAnnonceById/'+id)
                   .then( res=> {
                       this.annonce = res.data
                   })   
                   .catch(
                       (error) => console.log(error)
                   )
   
           },
           getAnnonceTraite(){
               axios.get('/api/annonceProcessed') 
                .then( res=> {
                       this.annonceTraite = res.data
                   })   
                   .catch(
                       (error) => console.log(error)
                   ) 
           },

           editAnnonce(){
              axios.put('api/edit/annonce',this.annonce)
                 .then(() => {
                    // success
                     swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                       
                })
                .catch(() => {
                    console.log("error")
                });

            },
            saveAnnoceCall(url_id){
               axios.post('api/add/annonceCall/'+url_id,this.annonceCall)
               .then(()=>{
                  
                   toast.fire({
                        icon: 'success',
                        title: 'Annonce Call Created in successfully'
                        })
                    
                })
                .catch(()=>{
                        console.log("error");
                })
            }
            






           
       }   
       
   }     
   
   
</script>