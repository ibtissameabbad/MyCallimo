<template>
    <div class="container">
    
      
      <div v-if="users.role.name==='isAdmin'">
        <h1 class="row justify-content-center">
            you have admin access
        </h1>

      </div>
    
        <div v-if="users.role.name==='isSuperviseur'">
            <h1 class="row justify-content-center">
                    you have superviseur access
            </h1>
        </div>
    
        <div v-if="users.role.name==='isColler'">
            <h1 class="row justify-content-center">
                you have coller access
            </h1>
        </div>
       
    </div>
</template>

<script>
    export default {
        
        mounted() {
            console.log('Component mounted.')
        },
        data () {
        return {
            users : [],
            roles : [],
            user : {
                id : null,
                f_name : '',
                l_name : '',
                salary : null,
                phone : '',
                email : '',
                role_id : null
                
                
            }
       
    }
</script>