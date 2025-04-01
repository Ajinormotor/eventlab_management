<script  setup>
import { ref } from 'vue';


const headData = ref([
    {title: 'Total Registration', value: '+1250', icon: 'ri-group-2-fill'},
    {title: 'Total Profit', value: '$10,050', icon: 'ri-money-dollar-circle-fill'},
    {title: 'Total Events', value: '4', icon: 'ri-calendar-event-fill'},
    {title: 'Total Seat', value: '+1250', icon: 'ri-ticket-2-fill'},
]);
</script>

<template>
<section class="flex flex-col md:flex-row  w-full rounde-lg items-center gap-5 rounded-lg px-3 py-4">


    <div  v-for="(data,index) in headData" :key="index"
    :class="['md:max-w-[300px] w-full flex items-center justify-between px-5  rounded-lg shadow-lg min-h-[150px]',
    data.title === 'Total Registration' && 'bg-indigo-500',
    data.title === 'Total Profit' && 'bg-green-500',
    data.title === 'Total Events' && 'bg-yellow-500',
    data.title === 'Total Seat' && 'bg-red-500',
    ]">

   
    <div class="flex flex-col gap-3">
        <h1 class="text-white font-bold">{{data.value}}</h1>
        <p class="text-white">{{data.title}}</p>
    </div>

    <div class="flex items-center justify-center w-[50px] h-[50px] rounded-full
     border-[1px] border-slate-100">
     <i :class="data.icon" class="text-white text-3xl"></i>

    </div>

</div>

</section>
  </template>