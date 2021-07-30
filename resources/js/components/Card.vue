<template>
    <div class="card">
       <h4>{{post.title}}</h4> 
       <p> {{post.content.substring(0,100) + '...'}}</p>
         <a href="#" >Continua a leggere</a>
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
        
        padding: 20px;
        margin: 10px;
        text-align: center;
        width: calc(100% / 4 - 20px);
    }
</style>