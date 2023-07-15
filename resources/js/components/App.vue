<template>
    <section class="all text-center mt-5 pt -5">
        <button id="bt1" @click="btnclick()" class="text-center btn btn-primary mx-5 px-5 py-5 my-5"><h1>HI AYANG I DAH SIAP !!!</h1></button>
        <h1 id="h21" style="display:none">JOM TIDO SAYANG &#128150;</h1>
    </section>
</template>

<script>

export default {
    name: 'App',
    data(){
        return{

        }
    },
    methods:{
        btnclick(){
            document.getElementById("bt1").style.display="none"
            document.getElementById("h21").style.display="block"
        }
    },
    components:{
    }
}
</script>

<style scoped>

</style>