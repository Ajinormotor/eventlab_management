<script  setup>
import { router, usePage } from '@inertiajs/vue3';
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import EventImage from '../../Reuseable/EventImage.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';


const props = defineProps({
 event: Object,
 status: String
})





const toggleApproved = () => {
    let msg = props.event.progress === 'approved'
  ? "Disapprove"
  : "Approve"

  if(confirm(msg)){
    router.put(route('admin.event.approved', props.event.id ));
  }
 
};


</script>

<template>
{{  console.log("Event ID:", props.event.id) }}
   
    <DashboardLayout>
        <section class="flex flex-col md:p-5 p-2 gap-7 relative">
    
     <div class="">
<DashboardHeading   :label="'Event_details'" />
       </div>

       <div
    class="rounded-lg w-full flex justify-between items-center p-3 bg-indigo-500 cursor-pointer">

      <div class="text-white">
        {{ props.event.progress === 'approved' ? "This event has been approved"  :  "This event has been Disapproved"   }}
      </div>
      
      <div class="cursor-pointer">
        <button @click.prevent="toggleApproved" 
         class="px-4 py-2 rounded-lg flex items-center justify-center bg-white text-black cursor-pointer">
         {{ props.event.progress  === 'approved' ? "Dispprove"  : "Approve"    }}
        </button>
      </div>
      
       </div>

       <div class="">
     <SessionMessage :status="status"  />   
       </div>

    <div class="flex flex-col md:flex-row gap-5">
                         
  <div class="w-full rounded-lg shadow-sm min-h-[400px] flex flex-col gap-5
         h-full p-2 md:p-5 bg-white">

                                <h1 class="w-full py-4 border-b border-b-indigo-500 text-indigo-600
                                font-semibold text-xl"> Event Information </h1>



                                <h1 class="text-4xl font-bold">{{event.title}}</h1>


                                <div class="flex gap-2">

<div class="flex gap-2 border-r border-slate-300 px-1">
    <h1 class="opacity-[50%]">5.0</h1>
    <div class="flex ">
        <i className="ri-star-fill text-yellow-500 font-semibold"></i>
        <i className="ri-star-fill text-yellow-500 font-semibold"></i>
        <i className="ri-star-fill text-yellow-500 font-semibold"></i>
        <i className="ri-star-fill text-yellow-500 font-semibold"></i>
        <i className="ri-star-fill"></i>
    </div>
</div>


<div class="border-r border-slate-300 px-2">
    <h1 class="opacity-[70%]">Review (1k)</h1>
</div>

<div class="">
    <h1 class="opacity-[70%]">10k Attendant</h1>
</div>
                                </div>

             <div class="">
      <EventImage  :listingImage="event.speaker_image"  @file="e => form.image = e"/>
      </div>

                                <div class="flex flex-col gap-5">
      <h1 class="font-semibold text-xl">About this Event</h1>

   <p class="opacity-[70%]">{{ event.details }}</p>
                                </div>

                                 </div>

                                  
       <div class="w-full rounded-lg shadow-sm h-[200px] flex flex-col
         gap-5 p-2 md:p-5 bg-white">
                                
        <ul  
                                 class="flex flex-col gap-4">
                   <li class="flex items-center gap-2 md:gap-3  py-2">
              <p class="opacity-70 text-sm"> Date:</p>
         <h1 class="font-semibold">{{ event.date}} </h1>
      </li>

          <li class="flex items-center gap-2 md:gap-3 
                    py-2">
                  <p class="opacity-70 text-[9px"> Time:</p>
                   <h1 class="font-semibold">{{ event.time}} </h1>
                           </li>
        
                  <li class="flex items-center  gap-2 md:gap-3  py-2">
         <p class="opacity-70 text-sm"> Venue:</p>
       <h1 class="font-semibold">{{ event.hall}}</h1>
           </li>
        
                         
                                </ul>

                            </div>

                                        
                            </div>

                            </section>
                            </DashboardLayout>
  </template>