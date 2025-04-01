<script  setup>

import { Link, router, useForm, usePage } from '@inertiajs/vue3';
import DashboardHeading from '../../Reuseable/DashboardHeading.vue';
import PaginatorLinks from '../../Reuseable/PaginatorLinks.vue';
import AdminDashboardLayout from '../../Layout/AdminDashboardLayout.vue';
import AdminRoleSelect from '../../Reuseable/AdminRoleSelect.vue';
import SessionMessage from '../../Reuseable/SessionMessage.vue';

const columns = [
  { label: "ID",},
  { label: "Event Name", }, 
  { label: "Event Hosted",  }, 
  { label: "Role", },

];


const page = usePage();

const props = defineProps({
    events: Object,
    search: String,
    status: String
})

const params = route().params

const form = useForm({
    search: props.search
})

const search = () => {
    router.get(route('admin.event'), { search: form.search });
};


</script>

<template>

  {{ console.log('Events', events) }}
<AdminDashboardLayout>
 
    <section class="flex flex-col md:p-5 p-2 gap-7 relative">

        <div class="">
            <DashboardHeading   :label="page.component" />
                        </div>

 <div class="w-full rounded-lg shadow-sm min-h-[400px] 
 flex flex-col gap-5 h-full p-2 md:p-5 bg-white">

 <SessionMessage :status="status"  />
                        

<div class="flex items-center justify-start gap-20
                        py-2  ">

   <div class="flex gap-3 items-center justify-start w-full">
           
    <h1 class="w-full  text-green-400
    font-semibold text-xl"> Event Information </h1>

    <div v-if="params.search" class="">
        <Link
        :href="route('admin.event', { ...params, page: null, search:null })"
        class="bg-green-400 max-w-[120px] w-full  px-5 py-3 rounded-lg text-white cursor-pointer h-12 hover:text-green-400
        hover:text-indigo hover:border-[1px] hover:border-green-400 hover:bg-transparent  flex items-center group"
        
        >
        {{ params.search }}
        <i className="ri-close-line text-white group-hover:text-green-500 pt-1"></i>
        </Link>

    </div>

 
      </div>
           


<!-- search -->

         <div class="flex items-center justify-center gap-4 w-full">

   <form  @submit.prevent="search"
   class="md:flex items-center rounded-lg h-[45px] max-w-[450px]  md:max-w-[500px] w-full p-2  
      border border-green-400">
      <input 
 type="text"  placeholder="Search Here ...."
 v-model="form.search"
    class="border-0 outline-none md:w-full bg-transparent text-green-400"
   />

   <button type="submit">
             <i class="ri-search-2-line text-green-400 cursor-pointer"></i>
    </button>
     
         </form>


     <div class="flex flex-col gap-2 relative">

                            
  <div class="bg-white rounded-lg w-[60px] h-[40px] flex justify-center
   items-center border border-green-400 cursor-pointer"
   
   @click="show = !show">
      <i class="ri-filter-3-line text-green-500 text-xl"></i>
     </div>

<div  v-if="show "
class="w-[70px]  bg-white shadow-md rounded-lg flex 
flex-col absolute top-[50px] z-10">
    <h1 class="py-2 border-b border-indigo-500 text-indigo-500 text-center rounded-sm
    cursor-pointer font-bold hover:bg-indigo-500 hover:text-white">Free</h1>
    <h1 class="py-2 border-b border-indigo-500 text-indigo-500 text-center rounded-sm
    cursor-pointer font-bold hover:bg-indigo-500 hover:text-white">Paid</h1>
</div>

    </div>




   </div>

   </div>


                             <!-- table -->


 
    <div class="w-full">


     
     
         <table class="w-full rounded-t-[12px]">

           <thead class="p-5 h-[50px] rounded-lg">
             <tr class="bg-green-400 text-white">
               <th v-for="(column, index) in columns" :key="index" class="md:px-2 text-start">
                 {{ column.label }}
               </th>
               <th class="md:px-2 text-start">Actions</th>
             </tr>
           </thead>
     
           <tbody class="divide-y divide-green-400">
             <tr
               v-for="(event) in props.events.data"
               :key="event.id"
               class="py-5 even:bg-slate-100 group hover:bg-green-400 
               cursor-pointer h-[50px]"
             >
            
               <td 
                   class="md:px-2 text-start group-hover:text-white">
                 {{ event.id}}
               </td>

               <td 
               class="md:px-2 text-start group-hover:text-white">
               <Link
               :href="route('event.show', event.id)">
             {{ event.first_name}}    {{ event.last_name}}
            </Link>
           </td>


           <!-- numbers -->
           <td 
           class="md:px-2 text-start group-hover:text-white">

           <div class="flex gap-1">

          
           <div class="flex items-center gap-1">
            <p class="text-base">{{event.events.filter(l => l.approved).length }} </p>
            <i class="ri-thumb-up-line text-green-800 text-base"></i>
        </div> 

        <div class="flex items-center gap-1">
            <p  class="text-base">{{event.events.filter(l => !l.approved).length }} </p>
            <i class="ri-close-circle-fill text-red-600 text-base"></i> 
        </div>

        

      </div>

        </td>


<!-- role -->
   
  
   
           
   <td 
                   class="md:px-2 text-start group-hover:text-white">
                 <AdminRoleSelect  :user="event"/>
                
               </td>

            

    

               <!-- Actions Column -->
               <td class="md:px-2 text-start group-hover:text-white">
                 <div class="flex gap-2">
     
              
                 <Link
                 :href="route('admin.user.show', event.id)"
                 class="flex items-center">
                   <i class="ri-external-link-line text-xl text-green-400
                    group-hover:text-white font-bold cursor-pointer"></i>
                 </Link>
     

               </div>

               </td>
               
             </tr>
           </tbody>
           
         </table>

       </div>
 

<div class="">
    <PaginatorLinks  :paginator="events" />
</div>


</div>  



    </section>
    
</AdminDashboardLayout>
  </template>
