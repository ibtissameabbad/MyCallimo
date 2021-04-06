<template>
<div class="container">
   <div class="row">
    <div class="col-sm-6">
     <div class="card">
      <div class="card-body">
        <h5 class="card-title">Superviseur</h5>
        <p class="card-text">Nom</p>
        <p class="card-text">Prénom</p>
        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
   </div>

   <div class="col-sm-6">
     <div class="card">
      <div class="card-body">
        <h5 class="card-title">Equipe</h5>
        <p class="card-text">secteur</p>
        <p class="card-text">Nombre</p>
        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
   </div>
  </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
