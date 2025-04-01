
<script  setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import TextInput from '../../Reuseable/TextInput.vue';
import PrimaryButton from '../../Reuseable/PrimaryButton.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';
import ErrorMessage from '../../Reuseable/ErrorMessage.vue';


defineProps({
 events: Object
})

const showModal = ref(false)
const showCongrat = ref(false)

const form = useForm({
    name: '',
    phone_no: '',
    event_id: ''

})


const openModal = (eventId) => {
    form.event_id = eventId; 
    showModal.value = true;
};


const submit = () => {
    form.post(route('user.store'), {
        preserveState: true,
        onSuccess: () => {
            form.reset();
            showModal.value = false;
            showCongrat.value = true;
        },
        onError: () => {
            showModal.value = true; 
        }
    });
};

</script>

<template>



<section class="flex flex-col gap-5 py-10 relative">
    

    <div v-if="showModal"
    @click="showModal = false" class="bg-black z-[10000] opacity-50 fixed w-full h-full inset-0"></div>

    
    <div v-if="showCongrat"
    @click="showCongrat = false" class="bg-black z-[10000] opacity-50 fixed w-full h-full inset-0"></div>

    

  

    <!-- Heading -->
    <div class="flex flex-col w-full items-center justify-center">
        <h1 class="text-indigo-500 text-lg font-semibold">Events</h1>
        <h1 class="uppercase md:text-4xl font-bold">Popular Event</h1>
    </div>
+
    <div 
    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-items-center gap-5 w-full">

    <div v-for="event in events.data"  :key="event.id"
    class="shadow-lg rounded-lg">


    
    <!-- RgisterModal -->
    <div v-show="showModal"
    class=" fixed z-[10000] top-[150px] left-[25px] md:left-[150px] md:top-[60px]  
    lg:left-[400px] max-w-[88%] md:max-w-[500px] h-[350px]
     md:h-[400px] rounded-lg shadow-lg flex flex-col bg-white items-center  p-2 py-5
     justify-center w-full text-center md:text-start ">
  <h1 class="font-bold text-2xl">Register for  early access</h1>
  
  <SessionMessage  />
  <ErrorMessage :errors="form.errors"  />

  <form @submit.prevent="submit" class="w-full flex flex-col gap-4" >

    <TextInput  label="First Name" name="First Name" 
    v-model="form.name" icon="shield-user-line" />

    <TextInput  label="Phone Number" name="Phone Number" 
    v-model="form.phone_no" icon="shield-phone-line" />
 
    <button @click="openModal(event.id)" 
    class="bg-indigo-500 px-5 py-2 flex gap-1 cursor-pointer 
    items-center justify-center rounded-lg text-white max-w-[100px] w-full">
Register
</button>

    </form>
 
              </div>
              <!-- Congratulation Modal -->

              <div v-show="showCongrat"
              class=" fixed z-[10000] top-[150px] left-[25px] md:left-[150px] md:top-[60px]  
              lg:left-[400px] max-w-[88%] md:max-w-[500px] h-[350px]
               md:h-[400px] rounded-lg shadow-lg flex flex-col bg-white items-center  p-2 py-5
               justify-center w-full text-center md:text-start ">
       
       
           
            <button class="bg-indigo-500" >
             Close
            </button>
          
        
           
                        </div>

        <div class="flex flex-col relative cursor-pointer rounded-t-lg">
        <img 
        :src=" event.speaker_image
        ? `/storage/${event.speaker_image}`
        : '/storage/app/public/image/default-event-details-2.jpg'"  alt=""
        class="max-w-[350px] w-full  h-[300px] " />
        <div class="absolute bottom-0 bg-indigo-500 px-5 py-2 flex  gap-1
        items-center justify-center rounded-sm text-white" >
        <i class="ri-wheelchair-line"></i>
{{ event.seat }}
        </div>
    </div>

    <div class="flex flex-col gap-2 p-5">

        <div class="flex items-center justify-between">

            <div class="flex gap-1 items-center">
                <i class="ri-time-line opacity-[70%] text-sm group-hover:text-white"></i>
                <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.time}} </h1>
            </div>

            <div class="flex gap-1 items-center">
                <i class="ri-gps-line opacity-[70%] text-sm group-hover:text-white"></i>
                <h1 class="text-sm opacity-[70%] group-hover:text-white">{{ event.hall}} </h1>
            </div>

        </div>
        <h1 class="font-bold text-xl">{{event.title}}</h1>

        <button @click="showModal = true"
        class="  bg-indigo-500 px-5 py-2 flex  gap-1 cursor-pointer
        items-center justify-center rounded-lg text-white max-w-[100px] w-full"> 
            Register
    </button>
    </div>

    </div>

    </div>

</section>
  </template>
