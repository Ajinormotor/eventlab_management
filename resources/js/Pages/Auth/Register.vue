

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Reuseable/TextInput.vue';
import PrimaryButton from '../../Reuseable/PrimaryButton.vue';
import RoleSelect from '../../Reuseable/RoleSelect.vue';
import RegisterImage from '../../Reuseable/RegisterImage.vue';
import TextLink from '../../Reuseable/TextLink.vue';
import ErrorMessage from '../../Reuseable/ErrorMessage.vue';
import Textarea from '../../Reuseable/Textarea.vue';

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    phone_no: "",
    gender: "",
    address: "",
    password: "",
    password_confirmation: "",
    image: null
})

const submit = () => {
    form.post(route('register'), {
        preserveScroll: true,
        onError: () => form.reset(['password', 'password_confirmation'])
    })
}

</script>

<template>
    <Head title="Register"  />


    <section class="flex items-center justify-center gap-10 p-5 md:p-0">

        <div class="max-w-[800px] w-full h-[1300px] md:flex items-center justify-center bg-amber-300 hidden">
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
                <h1>Get more things done with Loggin platform.</h1>
                <p class="text-center flex items-center  justify-center w-full gap-2">Already have an account <TextLink routeName="login">Login</TextLink>.</p>

                <ErrorMessage  :errors="form.errors"  />
            </div>

<form @submit.prevent="submit" class="flex flex-col gap-5 pt-7">


<RegisterImage  @file="e => form.image = e" />



    <TextInput  label="First Name" name="First Name" 
    v-model="form.first_name" icon="shield-user-line" />

    <TextInput  label="Last Name" name="Last Name" type="text"
    v-model="form.last_name" icon="shield-user-line" />

    <RoleSelect   label="Gender" :value="['Female','Male']"  
    v-model="form.gender"/>

    <div class="flex flex-col md:flex-row gap-5 items-center justify-between">

        <div class="w-full">
            <TextInput  label="Email" name="Email" 
            v-model="form.email" icon="mail-line"  type="email"/>    
        </div>

        <div class="w-full">
            <TextInput  label="Phone Number" name="Phone Number"  placeholder="+234"
            v-model="form.phone_no" icon="phone-line"  type="text" />    
        </div>

    </div>

    <TextInput  label="Address" name="Address" type="text"
    v-model="form.address" icon="gps-line" />

    
    <TextInput  label="Password" name="Password" type="password"
    v-model="form.password" icon="lock-line" />

    
    <TextInput  label="Confirm Password" name="Confirm Password" type="password"
    v-model="form.password_confirmation" icon="lock-line" />

    <div class="">
        <Textarea label="About" name="About" type="password"
    v-model="form.about"  />

    </div>

    <PrimaryButton :disabled="form.processing" type="submit" >
   Register
    </PrimaryButton>


</form>

            </div>



  </section>
</template>