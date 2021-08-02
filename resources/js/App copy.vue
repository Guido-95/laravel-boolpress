<template>
<div>
    <Header />
    <main>
        <div class="container">
           
            
        </div>

    </main>
    <Footer/>
</div>

</template>

<script>
import Header from './components/Header';
import Card from './components/Card';
import Footer from './components/Footer';

export default {
    name: 'App',
    components:{
        Header,
        Card,
        Footer,
    },
    data(){
        return{
            posts:[],
            current_page:1,
            last_page:1,
        }
    },
    methods:{
     
        postsChangePage(page = 1){
            axios
                .get('http://127.0.0.1:8000/api/posts?page=' + page)
                .then(res => {
                    this.posts = res.data.data;
                    this.current_page = res.data.current_page;
                    this.last_page = res.data.last_page;
                    console.log( res.data); 
                    console.log(this.current_page);
                    
                })
                .catch(
                    err => {
                        console.log(err);
                    }
                    );
        },
   
    },
    created(){
        this.postsChangePage();
    }


}

</script>

<style lang="scss">
    main{
        
        background: lightblue;
    }
    .buttons{
       margin: 50px;
        width: 100%;
      
        text-align: center;
    }
</style>