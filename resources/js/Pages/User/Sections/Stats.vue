<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import PaginatorLinks from "../../../Reuseable/PaginatorLinks.vue";
import Chart from "./Chart.vue";
import { ref } from "vue";


const columns = [
  { label: "ID" },
  { label: "Name" },
  { label: "Phone Number" },
];

const props = defineProps({
  search: String,
});

const params = route().params;
const form = useForm({
  search: props.search || "",
});
const show = ref(false);

// Search function
const search = () => {
  form.get(route("event.index"), { preserveState: true });
};
</script>

<template>
  <section class="flex flex-col md:flex-row gap-5 p-5">

    <div class="w-full rounded-lg shadow-sm min-h-[400px] 
    flex flex-col gap-5 h-full p-2 md:p-5 bg-white">
      
      <div class="flex items-center justify-start gap-20 py-2">
        <div class="flex gap-3 items-center justify-start w-full">
          <h1 class="w-full text-indigo-600 font-semibold text-xl"> PH Crypto Event </h1>

          <div v-if="params.search !== undefined && params.search !== null">
            <Link
              :href="route('event.index', { ...params, page: null, search: null })"
              class="bg-indigo-500 max-w-[120px] w-full px-5 py-3 rounded-lg text-white cursor-pointer h-12 hover:text-indigo-500
              hover:text-indigo hover:border-[1px] hover:border-indigo-500 hover:bg-transparent flex items-center group">
              {{ params.search }}
              <i class="ri-close-line text-white group-hover:text-indigo-500 pt-1"></i>
            </Link>
          </div>
        </div>

        <!-- Search -->
        <div class="flex items-center justify-center gap-4 w-full">
          <form @submit.prevent="search"
            class="md:flex items-center rounded-lg h-[45px] max-w-[450px] md:max-w-[500px] w-full p-2 border border-indigo-500">
            <input 
              type="text"
              placeholder="Search Here ...."
              v-model="form.search"
              class="border-0 outline-none md:w-full bg-transparent text-indigo-500"
            />
            <button type="submit">
              <i class="ri-search-2-line text-indigo-500 cursor-pointer"></i>
            </button>
          </form>

          <!-- Filter Button -->
          <div class="flex flex-col gap-2 relative">
            <div
              class="bg-white rounded-lg w-[60px] h-[40px] flex justify-center items-center border border-indigo-500 cursor-pointer"
              @click="show = !show"
            >
              <i class="ri-filter-3-line text-indigo-500 text-xl"></i>
            </div>

            <div v-if="show"
              class="w-[70px] bg-white shadow-md rounded-lg flex flex-col absolute top-[50px] z-10"
              v-click-outside="() => show = false">
              <h1 class="py-2 border-b border-indigo-500 text-indigo-500 text-center rounded-sm cursor-pointer font-bold hover:bg-indigo-500 hover:text-white">Free</h1>
              <h1 class="py-2 border-b border-indigo-500 text-indigo-500 text-center rounded-sm cursor-pointer font-bold hover:bg-indigo-500 hover:text-white">Paid</h1>
            </div>
          </div>
        </div>
      </div>


      <div class="flex flex-col gap-5">

     
      <!-- Table -->
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

          <tr>
            <td>1</td>
            <td>Mazi Wizzy</td>
            <td>+234012345678</td>

            <td class="md:px-2 text-start group-hover:text-white">
                <div class="flex gap-2">
    
             
                <Link
                
                class="flex items-center">
                  <i class="ri-external-link-line text-xl text-indigo-500
                   group-hover:text-white font-bold cursor-pointer"></i>
                </Link>
    
                <div>
                  <i 
                    class="ri-delete-bin-line text-xl text-red-500 font-bold cursor-pointer"></i>
                </div>
    
              </div>
              </td>
          </tr>

        </tbody>
      </table>

      <!-- <PaginatorLinks  /> -->

    </div>


    </div>

    <div class="flex flex-col max-w-[400px] w-full">
<Chart />
    </div>


  </section>
</template>
