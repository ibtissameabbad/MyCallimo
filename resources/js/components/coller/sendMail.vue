<template>
<div class="container">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> Envoyer Email </h3>
               </div>
               <div class="card-body table-responsive p-0">
                  <form @submit.prevent="send()">
                     <div class="modal-body" >
                     
                        <div class="form-group">
                           <input v-model="formData.email" type="text" name="email"
                              placeholder="A:"
                              class="form-control"  >
                        </div>
                        <div class="form-group">
                           <input v-model="formData.title" type="text" name="title"
                              placeholder="Objectif"
                              class="form-control"  >
                        </div>
                        
                       
                     </div>
                     <div class="modal-footer">
                        <button  type="submit" class="btn btn-success">Send</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
    </div>
</div>

</template>

<script>
    export default{
        mounted(){
           this.getForm()
        },

        data(){
            return{
                formData:{
                   email:"",
                   title:"",
                }
            }

        
        },
        methods:{
            getForm(){
            axios.post('api/sendMail',this.formData)
            .then(res=>{
                this.formData = res.data
            })
            },

            send(){
                
            }
        }

    }
</script>