<template>
<div>
    <Header />
    <main>
        <div class="container">
            <div class="row">

                <Card  :post='post' v-for="post in posts" :key="post.id"/>
                
                <div class="buttons">
                    <button  class="btn btn-primary" v-on:click="postsChangePage(current_page - 1)"> prev </button>

                    <button v-on:click="postsChangePage(n)" v-for="n in last_page" class="mx-2 btn" :key="n" :class= " n == current_page ? 'btn-primary' : 'btn-secondary' " > 
                        {{ n }} 

                    </button>

                    <button v-if="current_page < last_page " class="btn btn-primary" v-on:click="postsChangePage(current_page + 1)"> next</button>
                </div>
            </div>
            
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