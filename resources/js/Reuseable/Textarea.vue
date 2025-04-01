<script  setup>

const model = defineModel()

defineProps({
    label: String,
    icon: String,
    placeholder: String,
    name: String,
    type: String
})

</script>

<template>
    <div class="flex flex-col gap-1">
        <label id="name"
        class="opacity-[70%]"
        >{{ label }}</label>
        <div  class=" flex gap-2 items-center rounded-lg h-[150px]  w-full focus-within:outline-2 p-2
        focus-within:outline-amber-300  border ">
            <i :class="`ri-${icon}`"></i>
            <textarea
             :type="type || 'text'"   :placeholder="placeholder" 
            :name="name"
            v-model="model"
             class="w-full h-full outline-none"/>
        </div>
      
    </div>
  </template>