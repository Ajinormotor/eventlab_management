
<script  setup>
import { Link, router, useForm, usePage } from '@inertiajs/vue3';
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import DashboardHeading from '../../Reuseable/DashboardHeading.vue';
import PaginatorLinks from '../../Reuseable/PaginatorLinks.vue';

import { ref } from 'vue';

const page = usePage();


const columns = [
  { label: "ID",},
  { label: "Event Name", }, 
  { label: "Speaker",  }, 
  { label: "Time", },
  { label: "Date", },
  { label: "Location"} ,
  { label: "Status"} ,
];




const props = defineProps({
    events: Object,
    search: String
})

const params = route().params
const form = useForm({
    search: props.search
})


const search = () => {
    router.get(route('event.index'), { search: form.search });
};

const showModal = ref(false)
const selectedEventTitle = ref("")
const selectedEventId = ref("")
const show = ref(false)



const handleModal = (title,id) => {
    showModal.value = true
    selectedEventTitle.value = title; 
    selectedEventId.value = id; 
}

const deleteEvent = (id) => {
    router.delete(route('event.destroy', id),{
        onSuccess: () => router.reload()
    })
    showModal.value = false
}


</script>

<template>

    <Head title="Dashboard User Events"  />
<DashboardLayout>
    <div v-if="showModal" class="bg-black z-[10000] opacity-50 fixed w-full h-full inset-0"></div>

    <section class="flex flex-col md:p-5 p-2 gap-7 relative">

        <div class="">
            <DashboardHeading   :label="page.component" />
                        </div>

 <div class="w-full rounded-lg shadow-sm min-h-[400px] 
 flex flex-col gap-5 h-full p-2 md:p-5 bg-white">
                        

<div class="flex items-center justify-start gap-20
                        py-2  ">

   <div class="flex gap-3 items-center justify-start w-full">
           
    <h1 class="w-full  text-indigo-600
    font-semibold text-xl"> Event Information </h1>

    <div v-if="params.search" class="">
        <Link
        :href="route('event.index', { ...params, page: null, search:null })"
        class="bg-indigo-500 max-w-[120px] w-full  px-5 py-3 rounded-lg text-white cursor-pointer h-12 hover:text-indigo-500
        hover:text-indigo hover:border-[1px] hover:border-indigo-500 hover:bg-transparent  flex items-center group"
        
        >
        {{ params.search }}
        <i className="ri-close-line text-white group-hover:text-indigo-500 pt-1"></i>
        </Link>

    </div>

 
      </div>
           


<!-- search -->

         <div class="flex items-center justify-center gap-4 w-full">

   <form  @submit.prevent="search"
   class="md:flex items-center rounded-lg h-[45px] max-w-[450px]  md:max-w-[500px] w-full p-2  
      border border-indigo-500">
      <input 
 type="text"  placeholder="Search Here ...."
 v-model="form.search"
    class="border-0 outline-none md:w-full bg-transparent text-indigo-500"
   />

   <button type="submit">
             <i class="ri-search-2-line text-indigo-500 cursor-pointer"></i>
    </button>
     
         </form>


                            <div class="flex flex-col gap-2 relative">

                            
  <div class="bg-white rounded-lg w-[60px] h-[40px] flex justify-center
   items-center border border-indigo-500 cursor-pointer"
   
   @click="show = !show">
      <i class="ri-filter-3-line text-indigo-500 text-xl"></i>
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

    <Link :href="route('event.create')"
     class="bg-indigo-500 rounded-lg px-3 py-2 flex items-center  text-center
justify-center gap-1 text-white">
    Create <i className="ri-add-line pt-1"></i>
</Link>

   </div>

   </div>


                             <!-- table -->
 
    <div class="w-full">

        <!-- modal -->
        <div v-show="showModal"
        class=" fixed z-[10000] top-[150px] left-[55px] md:left-[150px] md:top-[200px]  lg:left-[400px] max-w-[85%] md:max-w-[500px] h-[300px] md:h-[200px] rounded-lg shadow-lg
                   flex flex-col bg-white items-center justify-center w-full text-center md:text-start p-2">
      <h1 class="">Are you sure you want to delete
         <span class="font-bold">{{ selectedEventTitle }}  </span> </h1>
      <div class="flex flex-col md:flex-row gap-5 pt-6">
        
      
      <button   @click="deleteEvent(selectedEventId)"
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
     
     
         <table class="w-full rounded-t-[12px]">

           <thead class="p-5 h-[50px] rounded-lg">
             <tr class="bg-indigo-500 text-white">
               <th v-for="(column, index) in columns" :key="index" class="md:px-2 text-start">
                 {{ column.label }}
               </th>
               <th class="md:px-2 text-start">Actions</th>
             </tr>
           </thead>
     
           <tbody class="divide-y divide-indigo-500">
             <tr
               v-for="(event) in props.events.data"
               :key="event.id"
               class="py-5 even:bg-slate-100 group hover:bg-indigo-500 cursor-pointer h-[50px]"
             >
            
               <td 
                   class="md:px-2 text-start group-hover:text-white">
                 {{ event.id}}
               </td>

               <td 
               class="md:px-2 text-start group-hover:text-white">
               <Link
               :href="route('event.show', event.id)">
             {{ event.title}}
            </Link>
           </td>

           <td 
           class="md:px-2 text-start group-hover:text-white">
         {{ event.speaker}}
       </td>

       <td 
       class="md:px-2 text-start group-hover:text-white">
     {{ event.time}}
   </td>

   
           
   <td 
                   class="md:px-2 text-start group-hover:text-white">
                 {{ event.date}}
               </td>

               <td 
               class="md:px-2 text-start group-hover:text-white">

               
             {{ event.hall}}
           </td>

           <td>
            <div 
            :class="[ 'rounded-lg flex items-center justify-center py-2 text-white',
            event.progress === 'pending' && 'bg-orange-400',
            event.progress === 'canceled' && 'bg-red-500',
            event.progress === 'approved' && 'bg-green-400',

            ]">
                {{ event.progress }}
            </div>
            
           </td>

               <!-- Actions Column -->
               <td class="md:px-2 text-start group-hover:text-white">
                 <div class="flex gap-2">
     
              
                 <Link
                 :href="route('event.edit', event.id)"
                 class="flex items-center">
                   <i class="ri-external-link-line text-xl text-indigo-500
                    group-hover:text-white font-bold cursor-pointer"></i>
                 </Link>
     
                 <div>
                   <i @click="handleModal(event.title,event.id)"
                     class="ri-delete-bin-line text-xl text-red-500 font-bold cursor-pointer"></i>
                 </div>
     
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

</DashboardLayout>
  </template>
