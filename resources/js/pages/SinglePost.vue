<template>
    <section class="container">
        <div v-if="post" class="post">
            <h1>{{post.title}}</h1>
            <h3>
                <span v-if="post.category">
                    <a  href="" class="badge badge-info ">{{post.category.name}}</a>
                </span>
                <span v-if=" post.tags.length > 0">
                    <a href="" class="badge badge-secondary mx-2" v-for="tag in post.tags" :key="tag.id">{{tag.name}}</a>
                </span>
                <NotFound v-if=" !post.id" />
            </h3>
            
            <p>
                {{post.content}}
                
            </p>
            <router-link class="btn btn-primary" :to="{name: 'blog'}"></router-link>
        </div>
        <div v-else >
            <h2 class="loading">loading...</h2>
        </div>
      
        
    </section>
</template>

<script>
import NotFound from '../components/NotFound.vue';
export default {
    name:"SinglePost",
      components:{
        NotFound,
    },
    data(){
        return{
            post:null,
        }
    },
    created(){
        this.getPost(this.$route.params.slug);
    },
    methods:{
        getPost(slug){
            axios
                .get('http://127.0.0.1:8000/api/posts/'+ slug)
                .then(
                    res => {
                        this.post= res.data;
                        // console.log(res.data);
                        console.log(this.post.tags);
                       
                    }
                )
                .catch(
                    err=> {
                        console.log(err);
                    }
                )
        }
    }
}
</script>

<style>

</style>