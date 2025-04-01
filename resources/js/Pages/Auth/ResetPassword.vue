<script  setup>
import ErrorMessage from "../../Reuseable/ErrorMessage.vue"
import SessionMessage from "../../Reuseable/SessionMessage.vue"
import TextInput from "../../Reuseable/TextInput.vue"
import PrimaryButton from "../../Reuseable/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
    email: String,
    status: String
})


const form = useForm({
    email: props.email,
    token: props.token,
    password: '',
    password_confirmation: ''
})


const submit = () => {
    form.post(route('password.post'), {
        preserveScroll: true,
        onError:  () => form.reset(['password', 'password_confirmation'])
    })

}


</script>

<template>
<Head title="Reset Password"  />

    <section class="w-full py-5 flex items-center justify-center">

        <div class="w-[80%] md:w-[50%] shadow-lg  
        rounded-lg flex flex-col gap2 p-5">
    
            <div class="mb-8 text-center space-y-2">

                <div class="w-full flex items-center justify-center">
                    <img src="https://demo.egenslab.com/html/eventlab/assets/images/logo.png"  
                    alt=""
                    class="w-full max-w-[300px]  h-[56px]object-fit">
                </div>
                
                <h1 class="text-3xl  font-bold  text-[#222222]">Reset your password?</h1>
                <p class="text-[#222222]">please ensure you put in your current password
                </p>
            
        <ErrorMessage  :errors="form.errors"/>
        <SessionMessage :status="status"  /></div>
    
    
    
            <form @submit.prevent="submit"  class="flex flex-col gap-2">
     
    
                <TextInput   name="Email"  label="Email" type="email" icon="mail-line" 
                v-model="form.email" />  
    
    
                <TextInput  name="Password"  label="Password" type="password" 
                icon="key-line"  
                v-model="form.password"  /> 
           
    
                <TextInput   name="Confirm_Password"  label="Confirm Password" type="password" icon="key-line"
                v-model="form.password_confirmation"  />  
           
    
       
                <PrimaryButton :disabled="form.processing">
                 Reset
                </PrimaryButton>
                
               </form>
    
            </div>
    
      </section>
  </template>