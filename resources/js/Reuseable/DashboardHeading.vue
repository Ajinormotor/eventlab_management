<script  setup>

defineProps({
    label: String
})

</script>

<template>
    <div class="flex gap-2 cursor-pointer">
        <i className="ri-home-line"></i>
        <h1>Home</h1>
        <span> /</span>
        <h1>{{label}}</h1>
      
    </div>
  </template>