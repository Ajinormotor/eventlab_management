<script  setup>
import { useForm, usePage } from '@inertiajs/vue3';
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import DashboardHeading from '../../Reuseable/DashboardHeading.vue';
import TextInput from '../../Reuseable/TextInput.vue';
import Textarea from '../../Reuseable/Textarea.vue';
import RoleSelect from '../../Reuseable/RoleSelect.vue';
import PrimaryButton from '../../Reuseable/PrimaryButton.vue';
import ErrorMessage from '../../Reuseable/ErrorMessage.vue';
import EventImage from '../../Reuseable/EventImage.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';


const page = usePage()

const props = defineProps({
    status:String,
    event: Object
})

const form = useForm({
    title: props.event.title,
    email: props.event.email,
    details: props.event.details,
    phone_no: props.event.phone_no,
    speaker: props.event.speaker,
    speaker_image: null,
    type: props.event.type,
    price: props.event.price,
    seat: props.event.seat,
    hall: props.event.hall,
    date: props.event.date,
    time: props.event.time,
})

const submit = () => {
    form.put(route('event.update', props.event.id), {
        preserveScroll: true,
        onSuccess: () => form.reset()
    })
}


</script>

<template>

  
    <DashboardLayout>
        <section class="flex flex-col md:p-5 p-2 gap-7 relative">
    
            <div class="">
                <DashboardHeading   :label="page.component" />
                            </div>
      
                            <div class="flex flex-col md:flex-row gap-5">
                         
  <div class="w-full rounded-lg shadow-sm min-h-[400px] flex flex-col gap-5
           h-full p-2 md:p-5 bg-white">
                                    
    <h1 class="w-full  text-indigo-600
    font-semibold text-xl"> Event Information </h1>

    <ErrorMessage  :errors="form.errors" />
    <SessionMessage   :status="status"/>

    <form @submit.prevent="submit"
     class="flex flex-col  gap-5 pt-7 w-full">


        <div class="flex flex-col md:flex-row gap-7">


            <!-- first div -->
        <div class="flex flex-col gap-3 max-w-[600px] w-full 
         ">

            <TextInput  label="Event Title" name="First Name" 
            v-model="form.title" icon="shield-user-line"  color=" focus-within:outline-indigo-500 "/>


            <div class="flex flex-col md:flex-row gap-5 items-center justify-between">

                <div class="w-full">
                    <TextInput  label="Ticket Price" name="Ticket Price" 
                    v-model="form.price" icon="money-line"  type="text" color=" focus-within:outline-indigo-500 "/>    
                </div>
        
                <div class="w-full">
             
    <RoleSelect   label="Event Type" :value="['Free','Paid']" 
     v-model="form.type" color=" focus-within:outline-indigo-500 "/>   
                </div>
        
            </div>

            
            <div class="flex flex-col md:flex-row gap-5 items-center justify-between pt-1">

                <div class="w-full">
    <RoleSelect   label="Hall" :value="['Grand Auditorium','Unity Hall', 'Harmony Hall', 'Mercy Hall']"
                    v-model="form.hall" color=" focus-within:outline-indigo-500 "/>     
                </div>
        
                <div class="w-full">
    <TextInput  label="Seat" name="Seat"  placeholder=""
                    v-model="form.seat" icon="table-line"  type="text" 
                     color=" focus-within:outline-indigo-500 "/>    
                </div>
        
            </div>     



            <div class="">
                <Textarea label="Event Details" name="Event Details" type="password"
            v-model="form.details" color=" focus-within:outline-indigo-500 " />
        
            </div>

            </div>

            <!-- divider -->

            <div class="bg-indigo-500 w-[1px] h-full hidden md:block">

            </div>


            <!--second div -->

            <div class="flex flex-col gap-3 max-w-[600px] w-full md:px-2">

                <TextInput  label="Speaker Name" name="Speaker Name"  color=" focus-within:outline-indigo-500 "
                v-model="form.speaker" icon="shield-user-line" />

                <div class="flex flex-col md:flex-row gap-5 items-center justify-between pt-1">

                    <div class="w-full">
                        <TextInput  label="Email" name="Email" color=" focus-within:outline-indigo-500 "
                        v-model="form.email" icon="mail-line"  type="email"/>    
                    </div>
            
                    <div class="w-full">
                        <TextInput  label="Phone Number" name="Phone Number"  placeholder="+234"
                        v-model="form.phone_no" icon="phone-line"  type="text"  color=" focus-within:outline-indigo-500 "/>    
                    </div>
            
                </div>


                <div class="flex flex-col md:flex-row gap-5 items-center justify-between">

                    <div class="w-full">
                        <TextInput  label="Date" name="Date" color=" focus-within:outline-indigo-500 "
                        v-model="form.date" icon="calender-line"  type="date"/>    
                    </div>
            
                    <div class="w-full">
                        <TextInput  label="Time" name="Time"  placeholder=""
                        v-model="form.time" icon="clock-line"  type="time"  color=" focus-within:outline-indigo-500 "/>    
                    </div>
            
                </div>

                <div class="md:mt-8">
           <EventImage @file="e => form.speaker_image = e"  />
                </div>


    
    
                </div>

            </div>

                <PrimaryButton class="mt-6"  color="bg-indigo-500">
                   Update Event
                </PrimaryButton>

    </form>

                            </div>

                            </div>
                            
  </section>
  </DashboardLayout>
  </template>
