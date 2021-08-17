<template>
    <div class="col-4 my-3 d-flex">
        <div class="card w-100">
            <img class="card-img-top" :src="post.cover" :alt="post.title">    
            <div class="card-body">
                <h4 class="card-title">{{ post.title }}</h4>
                <p>{{ post.content.substring(0 , 100) + '...' }}</p>
                <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Leggi</router-link>
            </div>
        </div>       
    </div>
</template>

<script>

export default {
    name:'Card',
     props: { 
            post : Object 
        }

}
</script>

<style lang='scss'>
    .card{
        display: flex;
        margin: 10px;
        img{
            height: 50%;
        }
        width: calc(100% / 4 - 20px);
    }
</style>