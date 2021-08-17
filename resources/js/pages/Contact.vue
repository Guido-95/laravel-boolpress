<template>
  <section class="container">
      <h1>Contattaci</h1>

        <div v-if='success' class="alert-success mt-5 mb-5 mr-5 p-2">
            Messaggio ricevuto corretamente
        </div>

        <form @submit.prevent='sendForm'>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Enter name" v-model='name' :class="errors.name ? 'is-invalid' : ''">
                
                <small v-for="error,index in errors.name" class="text-danger" :key="'error-name' + index">
                    {{error}}
                </small>
            
            </div>
            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" v-model='email'
                :class="errors.email ? 'is-invalid' : ''">

                <small v-for="error,index in errors.email" class="text-danger" :key="'error-name' + index">
                    {{error}}
                </small>
            
            </div>
            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                <textarea class="form-control" id="descrizione" placeholder="Enter description" rows="5" v-model='message' :class="{'is-invalid' : errors.message}"></textarea>

                 <small v-for="error,index in errors.message" class="text-danger" :key="'error-name' + index">
                     {{error}}
                 </small>
            </div>
            <button type="submit" class="btn btn-primary" :disabled = 'sending'>
                {{sending ? 'invio in corso..' : 'invia'}}
            </button>
             <!-- <button type="submit" class="btn btn-primary"  v-if= 'sending' disabled>Invia</button>
            <button type="submit" class="btn btn-primary" v-else >Invia</button> -->
           
      </form>
  </section>
</template>

<script>
export default {
    name:'Contact',
    data(){
        return{
            name: '',
            email:'',
            message:'',
            errors:{},
            success:false,
            sending:false
        }
    },
    methods: {
        sendForm(){
            this.sending=true;
            axios.post('http://127.0.0.1:8000/api/leads',{
                name:this.name,
                email:this.email,
                message:this.message
            })
            .then(
                res =>{
                    this.sending = false;
                    console.log(res.data);
                    if(res.data.errori){
                        this.errors = res.data.errori;
                        this.success= false;
                    } else {
                        this.errors={};
                        this.name = '',
                        this.email = '',
                        this.message = '',
                        this.success= true;
                        
                    }
                }
            )
            .catch(
                err=>{
                    console.log(err);
                }
            )
        }
    }
}
</script>

<style>

</style>