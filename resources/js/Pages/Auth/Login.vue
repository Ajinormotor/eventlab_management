

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Reuseable/TextInput.vue';
import PrimaryButton from '../../Reuseable/PrimaryButton.vue';
import CheckBox from '../../Reuseable/CheckBox.vue';
import TextLink from '../../Reuseable/TextLink.vue';
import ErrorMessage from '../../Reuseable/ErrorMessage.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';

defineProps({
    status:String
})

const form = useForm({
    email: "",
    password: "",

})

const submit = () => {
    form.post(route('login'), {
        preserveScroll: true,
        onError: () => form.reset('password')
    })
}

</script>

<template>
    <Head title="Login"  />


    <section class="flex items-center justify-center h-screen gap-10 p-5 md:p-0">

        <div class="max-w-[800px] w-full h-[550px] md:flex items-center justify-center bg-amber-300 hidden">
            <img 
            src="https://brandio.io/envato/iofrm/html/images/graphic14.svg" 
            alt="" 
            class="w-[398px] h-[398px] object-cover">
        </div>

        <div class="max-w-[600px] w-full px-5">

            <div class="flex flex-col gap-2 items-center justify-center">

                <div class="max-w-[132px] h-[44px]">
            
                    <img src="https://demo.egenslab.com/html/eventlab/assets/images/logo.png"  
                     alt=""
                     class="w-full  h-full object-fit">
           
                </div>
                <h1>Get more things done with Login platform.</h1>
                <p class="text-center flex items-center  justify-center w-full gap-2">Dont have an account?<TextLink routeName="register">Register</TextLink>.</p>
            </div>

            <ErrorMessage :errors="form.errors"  />
            <SessionMessage  :status="status"  />

<form @submit.prevent="submit" class="flex flex-col gap-5 pt-7">

        <div class="w-full">
            <TextInput  label="Email" name="Email" 
            v-model="form.email" icon="mail-line"  type="email"/>    
        </div>

   

    
    <TextInput  label="Password" name="Password" type="password"
    v-model="form.password" icon="lock-line" />

    
<div class="flex items-center justify-between">
    <CheckBox  label='Remember Me' />

    <TextLink  routeName="password.notice">Forgot password?</TextLink>
</div>


    <PrimaryButton :disabled="form.processing" >
 Login
    </PrimaryButton>


</form>

            </div>



  </section>
</template>