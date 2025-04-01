<script  setup>
import { Link, router, usePage } from "@inertiajs/vue3";

import AdminDashboardLayout from "../../Layout/AdminDashboardLayout.vue";
import DashboardHeading from "../../Reuseable/DashboardHeading.vue";
import PrimaryButton from "../../Reuseable/PrimaryButton.vue";
import { ref } from "vue";

const page = usePage()

defineProps({
    user : Object
})

const showModal = ref(false)

const handleDelete = () => {
    router.delete(route('dashboard.user.destroy'))
}

</script>

<template>
<Head title="Dashboard User Profile"  />

<!-- {{  console.log('User Details',user) }} -->
<div v-if="showModal" class="bg-black z-[10000] opacity-50 fixed w-full h-full inset-0"></div>

    <AdminDashboardLayout> 

        <section class="flex flex-col md:p-5 p-2 gap-7 relative">


            <!-- modal -->
            <div v-show="showModal"
  class=" fixed z-[10000] top-[150px] left-[55px] md:left-[150px] md:top-[200px]  lg:left-[400px] max-w-[85%] md:max-w-[500px] h-[300px] md:h-[200px] rounded-lg shadow-lg
             flex flex-col bg-white items-center justify-center w-full text-center md:text-start p-2">
<h1 class="font-bold">Once your account is deleted there is no recovery</h1>
<p>Are you sure you want to delete your account</p>

<div class="flex flex-col md:flex-row gap-5 pt-6">
  

<button  
class=" rounded-lg  flex items-center justify-center py-2 font-bold cursor-pointer w-[150px] text-white
bg-red-500">
Delete
</button>

<button  
@click="showModal = false"
type="button"
class="rounded-lg flex items-center justify-center py-2 font-bold cursor-pointer w-[150px] bg-indigo-500">
  Cancel
</button>

</div>
            </div>

            <div class="flex items-center justify-between">
<DashboardHeading   :label="page.component" />


            </div>

                <div class="w-full rounded-lg shadow-sm min-h-[400px] flex flex-col gap-5 h-full p-2 md:p-5 bg-white">

                    <h1 class="w-full py-4 border-b border-b-green-400 text-green-400
                     font-semibold text-xl"> Profile Information </h1>

                     <div
                     v-if="Object.keys(user).length"
                     class="flex flex-col md:flex-row h-full  ">


                     <div class="md:border-r border-green-400 max-w-[400px] w-full flex flex-col gap-2 pr-2">
                        <img alt="" 
                        :src="user.image
                        ? `/storage/${user.image}`
                        : '/storage/app/public/image/default_user.png'"
                        class="rounded-lg w-[300px] h-[200px]"  />
                        
                        <ul class="flex flex-col gap-4">
                            <li class="flex items-center gap-2 md:gap-3 border-b border-indigo-400 py-2">
                                <p class="opacity-70 text-sm"> Name:</p>
                                <h1 class="font-semibold">{{ user.first_name}} {{user.last_name}}</h1>
                            </li>

            <li class="flex items-center gap-2 md:gap-3 border-b
             border-indigo-400 py-2">
          <p class="opacity-70 text-[9px"> Email Address:</p>
           <h1 class="font-semibold">{{ user.email}} </h1>
                   </li>

                            <li class="flex items-center  gap-2 md:gap-3 border-b border-indigo-400 py-2">
                                <p class="opacity-70 text-sm"> Phone Number:</p>
                                <h1 class="font-semibold">{{ user.phone_no}}</h1>
                            </li>

                            <li class="flex items-center  gap-2 md:gap-3 border-b border-indigo-400 py-2">
                                <p class="opacity-70 text-sm"> Gender:</p>
                                <h1 class="font-semibold">{{ user.gender}} </h1>
                            </li>

                            <li class="flex items-center gap-2 md:gap-3 border-b border-indigo-400 py-2">
                                <p class="opacity-70 text-sm">Address:</p>
                                <h1 class="font-semibold">{{ user.address}} </h1>
                            </li>
                        </ul>

                     </div>

                     
                     <div class=" w-full flex flex-col gap-5 p-4">
                        
                        <div class="flex items-center justify-between  border-b border-b-green-500">
                            <h1 class="w-full py-4  text-green-400
                            font-semibold text-xl"> About Me</h1>

                            <div class="flex gap-1 items-center">
                            <Link
                            :href="route('dashboard.admin.show')">
                                <i class="ri-external-link-line text-xl text-green-400 font-bold cursor-pointer"></i>
                            </Link>
<div 
@click="handleDelete"
 class="">
    <i @click="showModal = true" class="ri-delete-bin-line text-xl text-red-500 font-bold cursor-pointer"></i>
</div>
                              
                            </div>
                  
                       

                        </div>


                        <p>{{user.about}}</p>
                     </div>
                     

                     </div>

                </div>

        </section>

    </AdminDashboardLayout>

  </template>
