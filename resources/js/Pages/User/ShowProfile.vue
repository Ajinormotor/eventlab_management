<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import TextInput from '../../Reuseable/TextInput.vue';
import PrimaryButton from '../../Reuseable/PrimaryButton.vue';
import RegisterImage from '../../Reuseable/RegisterImage.vue';
import RoleSelect from '../../Reuseable/RoleSelect.vue';
import DashboardHeading from '../../Reuseable/DashboardHeading.vue';
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import Textarea from '../../Reuseable/Textarea.vue';
import ErrorMessage from '../../Reuseable/ErrorMessage.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';

const page = usePage();

const props = defineProps({
  user: Object,
  status: String,
});

const form = useForm({
  first_name: props.user?.first_name || '',
  last_name: props.user?.last_name || '',
  email: props.user?.email || '',
  phone_no: props.user?.phone_no || '',
  gender: props.user?.gender || '',
  address: props.user?.address || '',
  about: props.user?.about || '' ,
  image:  null, 
});

const submit = () => {
  form.patch(route('dashboard.user.update'), {
    preserveScroll: true,
    onSuccess: () => {

      form.reset(); 
    },

  });
};

console.log('User', props.user);
</script>

<template>
  <Head title="Profile Update" />
  <DashboardLayout>
    <section class="flex flex-col gap-7 p-5">
      <div>
        <DashboardHeading :label="page.component" />
      </div>

      <div class="w-full rounded-lg shadow-sm min-h-[400px] flex flex-col gap-5 h-full p-2 md:p-5 bg-white">
        <h1 class="w-full py-4 border-b border-b-indigo-500 text-indigo-600 font-semibold text-xl">
          Account Information
        </h1>

        <SessionMessage :status="status" />
        <ErrorMessage :errors="form.errors" />

        <form @submit.prevent="submit" class="flex flex-col gap-5 pt-7">
          <RegisterImage :listingImage="props.user.image" @file="e => form.image = e" />

          <TextInput label="First Name" name="first_name" v-model="form.first_name"
           icon="shield-user-line" />
          <TextInput label="Last Name" name="last_name" v-model="form.last_name"
           icon="shield-user-line" />
          <RoleSelect label="Gender" :value="['Female', 'Male']" v-model="form.gender" />

          <div class="flex flex-col md:flex-row gap-5 items-center justify-between">
            <div class="w-full">
              <TextInput label="Email" name="email" v-model="form.email" icon="mail-line" type="email" />
            </div>
            <div class="w-full">
              <TextInput label="Phone Number" name="phone_no" placeholder="+234" v-model="form.phone_no" icon="phone-line" type="text" />
            </div>
          </div>

          <TextInput label="Address" name="address" v-model="form.address" icon="gps-line" />

          <div class="h-[150px] mb-10">
            <Textarea label="About" name="about" v-model="form.about" />
          </div>

          <PrimaryButton :disabled="form.processing" type="submit" color="bg-indigo-500" >
            Update
          </PrimaryButton>
        </form>
      </div>
      
    </section>
  </DashboardLayout>
</template>