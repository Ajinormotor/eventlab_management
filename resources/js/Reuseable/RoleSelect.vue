
<script  setup>

const model = defineModel();

defineProps({
    value: Array,
    label: String,
    color: String
})

</script>

<template>
<section class="flex flex-col gap-2">
    <label>{{ label }}</label>

    <select v-model="model"
      :class="[ 'flex gap-2 items-center rounded-lg h-[45px] w-full focus-within:outline-2 p-2  border ',
    color ? color : ' focus-within:outline-amber-300' ]">
        <option v-for="(item,index) in value" 
        :key="index" :value="item"  >
        {{ item }}
    </option>

    </select>
</section>
  </template>
