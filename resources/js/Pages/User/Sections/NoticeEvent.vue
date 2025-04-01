<script  setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    events: Object
})


const noticeData = ref([
{title: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.", 
    user: 'Mr Mustapha',

},

{title: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.", 
    user: 'Mr Mustapha',
    
},

{title: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.", 
    user: 'Mr Mustapha',
    
},

{title: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.", 
    user: 'Mr Mustapha',
    
},

{title: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.", 
    user: 'Mr Mustapha',
    
},

{title: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.", 
    user: 'Mr Mustapha',
    
},


])

</script>

<template>

{{ console.log("Event details:", events) }}

<section class="flex flex-col md:flex-row gap-2 p-2 md:p-5 ">



    <div 
     class="flex flex-col gap-2 rounded-lg max-w-[600px] w-full shadow-lg
     p-2">

        <div class="flex items-center gap-1 py-4 border-b-[0.5px] border-indigo-400">
            <i class="ri-alarm-warning-line text-indigo-500 text-xl"></i>
            <h1 class="text-indigo-500 font-bold text-xl">Notice Board</h1>
        </div>


        <div class=" max-h-[250px] overflow-hidden overflow-y-scroll">

        <div  v-for="event in events.data" :key="event.id"
        class=" flex flex-col gap-5 border-b-[0.5px] border-indigo-400 py-4 cursor-pointer group
        hover:bg-indigo-500 hover:border-b-white ">

            <div class="flex gap-1 items-center">
                <i class="ri-user-line opacity-[70%] text-sm group-hover:text-white"></i>
                <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.user.first_name}} {{ event.user.last_name}}  </h1>
            </div>

            <h1 class="font-2xl group-hover:text-white">
         {{ event.details }}
            </h1>
            

        </div>
                    
    </div>

    </div>


    <!-- Upcoming -->
    <div 
    class="flex flex-col rounded-lg max-w-[600px] w-full shadow-lg
    p-2">

       <div class="flex items-center gap-1 py-4 border-b-[0.5px] border-indigo-400">
           <i class="ri-calendar-schedule-fill text-indigo-500 text-xl"></i>
           <h1 class="text-indigo-500 font-bold text-xl">Upcoming Event</h1>
       </div>


       <div class=" max-h-[250px] overflow-hidden overflow-y-scroll">

       <Link  v-for="event in events.data" :key="event.id"
       :href="route('event.show', event.id)"
       class=" flex  gap-5 border-b-[0.5px] border-indigo-400 py-4 cursor-pointer group 
       hover:bg-indigo-500 items-center px-3">

       <div class="">
        <img :src="event.speaker_image
        ? `/storage/${event.speaker_image}`
        : '/storage/app/public/image/default-event-details-2.jpg' " 
         class="w-[40px] h-[40px] rounded-full"
        />
       </div>


       <div class="flex flex-col gap-1">

        <h1 class="font-2xl group-hover:text-white font-bold">
            {{ event.title }}
           </h1>

     <div class="flex items-center gap-3">

   
           <div class="flex gap-1 items-center">
               <i class="ri-user-line opacity-[70%] text-sm group-hover:text-white"></i>
               <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.user.first_name}} {{ event.user.last_name}} </h1>

               
   
           </div>

           <div class="flex gap-1 items-center">
            <i class="ri-calendar-line opacity-[70%] text-sm group-hover:text-white"></i>
            <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.date}} </h1>
        </div>

           <div class="flex gap-1 items-center">
            <i class="ri-time-line opacity-[70%] text-sm group-hover:text-white"></i>
            <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.time}} </h1>
        </div>

        <div class="flex gap-1 items-center">
            <i class="ri-gps-line opacity-[70%] text-sm group-hover:text-white"></i>
            <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.hall}} </h1>
        </div>

        </div>

         
              
       </div>
           

    </Link>
                   
   </div>

   </div>

</section>
  </template>

