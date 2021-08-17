<template>
<div>
    <Header />
    <main>
       
        
        <router-view></router-view>

    </main>
    <Footer/>
</div>

</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';

export default {
    name: 'App',
    components:{
        Header,
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
                .then(
                    res => {
                    this.posts = res.data.data;
                    this.current_page = res.data.current_page;
                    this.last_page = res.data.last_page;
                    // console.log( res.data); 
                    // console.log(this.current_page);
                    
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
     .loading {
        margin: 100px;
        text-align: center;
    }
</style>