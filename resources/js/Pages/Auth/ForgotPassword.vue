<script  setup>
import { useForm } from '@inertiajs/vue3';
import ErrorMessage from '../../Reuseable/ErrorMessage.vue';
import PrimaryButton from '../../Reuseable/PrimaryButton.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';
import TextInput from '../../Reuseable/TextInput.vue';

defineProps({
    status: String
})

const form = useForm({
    email: ''
})


const submit = () => {
    form.post(route('password.email'),{
        preserveScroll: true
    })
}

</script>

<template>
    <Head title="Forgot Password"  />

    <section class="w-full py-5 flex items-center justify-center h-screen">

        <div class="w-[95%] md:w-[50%] shadow-lg  rounded-lg flex flex-col gap2 p-5">
    
            <div class="mb-8 text-center space-y-2">
                <div class="w-full flex items-center justify-center">
                    <img src="https://demo.egenslab.com/html/eventlab/assets/images/logo.png"  
                    alt=""
                    class="w-full max-w-[300px]  h-[56px]object-fit">
                </div>
          
                <h1 class="text-3xl  font-bold  text-[#222222]">Forgot your password?</h1>
                <p class="text-[#222222]">No problem. Just let us know your email address and
                     we will email you a password rest link that will allow you to choose  anew one.
                </p>
            
        <ErrorMessage  :errors="form.errors"/>
        <SessionMessage :status="status"  /></div>
    
    
    
            <form @submit.prevent="submit"  class="flex flex-col gap-6">
    
    
                <TextInput name="Email"  label="Email" type="email" icon="mail-line" 
                 v-model="form.email" />   
           
           
                
                <PrimaryButton :disabled="form.processing">
                 Send 
                </PrimaryButton>
                
               </form>
    
            </div>
    
      </section>
  </template>