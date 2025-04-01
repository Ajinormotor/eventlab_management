<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';


defineProps({
  columns: Array, 
  rows: Array 
  
});

const showModal = ref(false)

</script>

<template>

  <div v-if="showModal" class="bg-black z-[10000] opacity-50 fixed w-full h-full inset-0"></div>

  <div class="w-full">

   <!-- modal -->
   <div v-show="showModal"
v-for="(column, index) in columns" :key="index"
   class=" fixed z-[10000] top-[150px] left-[55px] md:left-[150px] md:top-[200px]  lg:left-[400px] max-w-[85%] md:max-w-[500px] h-[300px] md:h-[200px] rounded-lg shadow-lg
              flex flex-col bg-white items-center justify-center w-full text-center md:text-start p-2">
 <h1 class="font-bold">Are you sure you want to delete {{ column.label.title }}</h1>
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
          v-for="(row, rowIndex) in rows"
          :key="rowIndex"
          class="py-5 even:bg-slate-100 group hover:bg-indigo-500 cursor-pointer h-[50px]"
        >
       
          <td v-for="(column, colIndex) in columns" :key="colIndex"
              class="md:px-2 text-start group-hover:text-white">
            {{ row[column.key] }}
          </td>
      
          <!-- Actions Column -->
          <td class="md:px-2 text-start group-hover:text-white">
            <div class="flex gap-2">

         
            <Link
            :href="route('event.show', row.id)"
            class="flex items-center">
              <i class="ri-external-link-line text-xl text-indigo-500
               group-hover:text-white font-bold cursor-pointer"></i>
            </Link>

            <div>
              <i @click="showModal = true"  class="ri-delete-bin-line text-xl text-red-500 font-bold cursor-pointer"></i>
            </div>

          </div>
          </td>
          
        </tr>
      </tbody>
      
    </table>
  </div>
  
</template>
