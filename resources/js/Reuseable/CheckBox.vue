<script  setup>

const model = defineModel()

defineProps({
    label: String,
    icon: String,
    placeholder: String,
    name: String,
})

</script>

<template>
    <div class="flex items-center justify-center gap-1">
  
 
            <input type="checkbox"   
            name=""
             class="w-[15px] h-[15px] outline-none focus-within:outline-2  focus-within:outline-amber-300  "/>
       
        <label id="name"
        class=" font-bold text-sm "
        >{{ label }}</label>
      
    </div>
  </template>