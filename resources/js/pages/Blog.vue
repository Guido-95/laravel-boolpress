<template>
  <section class="container">
    <h1>Blog</h1>
     <div v-if="posts.length > 0" class="row">

        <Card  :post='post' v-for="post in posts" :key="post.id"/>
        
        <div class="buttons">
          <button  v-if="current_page > 1" class="btn btn-primary" v-on:click="postsChangePage(current_page - 1)"> prev </button>

          <button v-on:click="postsChangePage(n)" v-for="n in last_page" class="mx-2 btn" :key="n" :class= " n == current_page ? 'btn-primary' : 'btn-secondary' " > 
              {{ n }} 

          </button>

          <button v-if="current_page < last_page" class="btn btn-primary" v-on:click="postsChangePage(current_page + 1)"> next</button>
        </div>
      </div>
      <div v-else>
        <h2 class="loading">
          Loading...
        </h2> 
      </div>
  </section>
</template>

<script>
import Card from '../components/Card.vue';
export default {
  name:'Blog',
  components:{
    Card
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

<style>
  .buttons{
        margin: 50px;
        width: 100%;
      
        text-align: center;
  }
</style>