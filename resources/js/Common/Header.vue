
<script  setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';


const navData =  ref([
    {title: "Home", id: '01', path: "#" },
    {title: "About", id: '02', path: "#"},
    {title: "Events", id: '03', path: "#"},
    {title: "Contact", id: '04', path: "#"},
])


</script>

<template>
<section class="bg-transparent w-full shadow-md shadow-amber-50">

  <div class="min-h-[87px] flex items-center justify-between md:px-5 px-2">

    <div class="">
        <img src="https://demo.egenslab.com/html/eventlab/assets/images/logo.png" 
        alt=""
        class="md:w-[171px] md:h-[36px]"  />
    </div>

    <nav class="flex gap-10">

  
    <div v-for="link in navData" :key="link.id"
     class="hidden lg:block" >
     <Link to="link.path" 
     class="border border-amber-300 px-5 py-5 md:w-[78px] md:h-[37px] relative
      flex items-center justify-center">
        <h1 class="text-sm font-medium text-amber-300 uppercase">{{link.title}}</h1>
        <h1 class="absolute -top-[12px] left-[15px] z-10 font-bold text-amber-300 justify-items-center text-sm flex items-center justify-center
         bg-white rounded-full w-[20px] h-[20px]">{{link.id}}</h1>
        </Link>

    </div>
</nav>

    <div  
        class="bg-amber-300 rounded-lg py-4 px-5 cursor-pointer flex items-center justify-center" >
        <Link
        :href="route('register')"
   >
            <h1 class="text-black font-semibold">Get Started</h1>
    </Link>
    </div>



  </div>
</section>
  </template>