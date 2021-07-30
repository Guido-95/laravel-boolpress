<template>
    <header class="container ">
        <ul>
            <li>
                <a href="">
                    Home
                </a>
            </li>
             <li>
                <a href="">
                    Posts
                </a>
            </li>
             <li>
                <a href="">
                    Chi siamo
                </a>
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
            a{
                text-decoration: none;
            }
        }
    }
</style>