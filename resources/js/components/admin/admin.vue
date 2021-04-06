<template>
<div class="container col-md-12">
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admin</h5>
        <p class="card-text">{{user.l_name}}</p>
        <p class="card-text">{{user.f_name}}</p>

        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Objectif</h5>
        <p class="card-text">0/5 par jour</p>
        <p class="card-text">0/150 par mois</p>
        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Rendez-vous Confirmé</h5>
        <p class="card-text">number</p>
        <p class="card-text">Agent name</p>
        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Nombre d'annonce</h5>
        <p class="card-text"> Nombre totale d'annonces: {{annonces.length }}</p>
        <p class="card-text">Nombre d'annonces affecter: {{userAnnonces.length }}</p>
        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>
</div>
<div class="card" style="padding-top=40px">
  <h5 class="card-header">Statistique</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div> 
</template>

<script>
    export default {
        mounted() {
            let url = window.location.pathname;
            let url_id = url.substring(url.lastIndexOf('/') + 1);
            // this.getUserConnecte(url_id);
            this.init()
        },

        data(){
          return{
            annonces:{},
            user:{},
            userAnnonces:{},
          }

        },

        methods:{
          init(){
            axios.get('api/allAnnonces')
            .then(res=>{
              this.annonces=res.data;
            })
            .catch(
              (error) => console.log(error)
            ),

            axios.get('api/annoncesTraite')
            .then(res=>{
              this.userAnnonces=res.data;
            })
            .catch(
              (error) => console.log(error)
            )

          },
          getUserConnecte(id){
            axios.get('api/user/'+id)
              .then(res=>{
              this.user=res.data;
            })
            .catch(
              (error) => console.log(error)
            )
          }
        }

    }
</script>
