<template>
<div class="container col-md-12">
<div class="row">
  <div class="col-12">
            <div class="card">
          
              <div class="card-header">
                <h3 class="card-title">Les Annonces</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data_table">
                  <thead>
                    <tr>
                    <th>#</th>
                    <th style="height: 10px; width: 200px;">Type de bien</th>
                    <th>Price</th>
                    <th>Last Price</th>
                    <th>Surface</th>
                    <th>check all 
                      <input  name="checkAll" type="checkbox"  @click="selectAll" v-model="allSelected">
                    </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(annonce,index) in annonces.data" :key="annonce.id">
                    <td>{{index + 1}}</td>
                    <td>{{annonce.offer_title}}</td>
                    <td>{{annonce.offer_price}} {{annonce.offer_currency}}</td>
                    <td>{{annonce.offer_last_price}}</td>
                    <td>{{annonce.offer_area}} {{annonce.offer_area_units}}</td>
                    <td> 
                     <input name="checkOne" type="checkbox" v-model="annonceIds" @click="select" :value="annonce.id">
                       
                    </td>

                    </tr>
                    
                    
                  </tbody>
                </table>
                        <span>{{ annonceIds }}</span>

                <div class="card-footer">

                <pagination :data="annonces" @pagination-change-page="getResults"></pagination>
                    <button class="btn btn-success" @click="newModal">Dispatcher par </button>
               </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Modal--> 
     <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 0px;margin-bottom: 0px;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">choisir les traiteurs</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateUserAnnonce() : createUserAnnonce()">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="user">Dispatcher</label>
                            <select name="userDisp_id" v-model="userAnnonce.userDisp_id" class="form-control">
                            <option v-for="user in users" :value="user.id" :key="user.id">{{user.f_name}}</option>
                        </select>                   
                     </div>
                    <div class="form-group ">
                        <label for="user">Traiter par</label>
                        <select name="userTrait_id" v-model="userAnnonce.userTrait_id" class="form-control">
                            <option v-for="user in users" :value="user.id" :key="user.id">{{user.f_name}}</option>
                        </select>
                    </div>
                
                </div>
				
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Add</button>
                </div>

                </form>

                </div>
            </div>
        </div>
</div>
</template>

<script>
    export default {
        props:['id'],
        mounted() {
            this.init()
            this.getResults()
        },
        data() {
            return{
            editmode:false,
            annonces : {},
            userAnnonces:{},
            selected: [],
            users: [],
            allSelected: false,
            annonceIds: [],
            userAnnonce:{
                id : null,
                annonce_id : [],
                userDisp_id : null,
                userTrait_id : null,
                
            }

            }
        },
        methods : {
            init(){
                axios.get('api/annonces')
                    .then( res=> {
                        this.annonces = res.data

                    })
                    .catch(
                        (error) => console.log(error)
                    ),

                    axios.get('/api/admin/users')
                    .then( res=>{
                        this.users = res.data
                    })
                    .catch(
                        (error) => console.log(error)
                    )
            },
            getResults(page = 1) {
                        axios.get('api/annonces?page=' + page)
                            .then(response => {
                                this.annonces = response.data;
                            });
                },

            selectAll(){
            this.annonceIds = [];

            if (!this.allSelected) {
                for (let annonce in this.annonces) {
                    this.annonceIds.push(this.annonces[annonce].id);
                }
            }
            console.log(annonceIds);
        },
        select: function() {
            this.allSelected = false;
        },

        newModal(){
                this.editmode = false;
                $('#addNew').modal('show');
               
                
            },

        createUserAnnonce(){
                this.userAnnonce.annonce_id = this.annonceIds;
                axios.post('api/add/userAnnonces',this.userAnnonce)
                .then(res=>{
                   alert('ok')
                })
                .catch(
                   (error) => console.log(error)
                )      
        }

       
        }
    
    }
</script>
