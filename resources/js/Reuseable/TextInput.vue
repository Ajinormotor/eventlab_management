<script  setup>

const model = defineModel()

defineProps({
    label: String,
    icon: String,
    placeholder: String,
    name: String,
    type: String,
    color: String
})

</script>

<template>
    <div class="flex flex-col gap-1">
        <label id="name"
        class="opacity-[70%]"
        >{{ label }}</label>
        <div  :class="[ 'flex gap-2 items-center rounded-lg h-[45px] w-full  border focus-within:outline-2 p-2',
        color? color : ' focus-within:outline-amber-300 ' ]">
            <i :class="`ri-${icon}`"></i>
            <input
             :type="type || 'text'"   :placeholder="placeholder" 
            :name="name"
            v-model="model"
         
             class="w-full outline-none"/>
        </div>
      
    </div>
  </template>