
<script  setup>
import Header from '../../Common/Header.vue';

</script>

<template>
<section class="h-screen flex flex-col  bg-[#f9f9f9]">

    <div class="">
        <Header  />
    </div>


    <div class="flex flex-col md:flex-row items-center justify-center md:gap-[100px] h-full  gap-10 py-10
    md:px-5">

        <div class="flex flex-col gap-4 items-center justify-center 
        md:justify-start md:items-start">
            <p class="text-xl text-amber-300 font-bold">Explore. Finance. Solution</p>
            <h1 class="uppercase md:text-6xl leading-7xl text-5xl text-center md:text-start">International <br  />
                Business<br  /> 
                Conference
                </h1>
                <button class="bg-amber-300 rounded-lg py-3 px-5 ">
                    <h1 class="text-black font-semibold">Get Started</h1>
                </button>
        </div>

        <div class=" max-w-[506px] h-[407px] ">
            <img src="https://the-wingtrip-react.netlify.app/static/media/banner-img.06af93ee8b28510507de.png"
            alt=""
            class="h-full w-full  rounded-sm"  />

        </div>

 
        
    </div>

</section>
  </template>