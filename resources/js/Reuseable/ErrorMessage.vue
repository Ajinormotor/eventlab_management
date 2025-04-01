<script  setup>

defineProps({
    errors: Object
})

</script>

<template>
    <div v-if="Object.keys(errors).length">
        <h1 class="text-red-500 font-bold">Something went wrong!</h1>

        <ul class=" flex flex-col  list-inside list-disc"
        v-for="(error,index) in errors" :key="index"
        >

            <li class="text-red-400 font-bold">{{error}}</li>
        </ul>
      
    </div>
  </template>