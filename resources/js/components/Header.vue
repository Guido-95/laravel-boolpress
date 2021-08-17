<template>
    <header class="container ">
        <ul>
            <li>
                <!-- use router-link component for navigation. -->
                <!-- specify the link by passing the `to` prop. -->
                <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
                <router-link :to="{name:'home'}">Home</router-link>
            </li>
            <li>
                <router-link :to="{name:'blog'}">Blog</router-link>
            </li>
            <li>
                <router-link :to="{name:'about'}">Chi siamo</router-link>
            </li>
            <li>
                <router-link :to="{name:'contact'}">Contattaci</router-link>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name:'Header',
}
</script>

<style lang='scss'>
    ul{
        margin-top: 20px;
        list-style: none;
        display: flex;
        justify-content: center;
  
        li{
            font-size: 20px;
            margin: 10px;
             a {    
                display: inline-block;
                padding: 5px 10px;
                color: black;
                font-size: 18px;
                text-decoration: none;

                &.active,
                &:hover {
                    text-decoration: none;
                    background-color: lightblue;
                }
            }
        }
    }
</style>