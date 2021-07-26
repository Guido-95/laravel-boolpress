<template>
  <div class="container">
      <h1 class="text-center my-5">{{titolo}}</h1>
      <h2 class="text-center">{{sottotitolo}}</h2>
  </div>
</template>

<script>
export default {
    name:'WorkInProgress',
    props:{
            titolo:String,
            sottotitolo:String  
        }
}
</script>

<style>

</style>