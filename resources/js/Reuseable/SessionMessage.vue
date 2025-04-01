
<script  setup>

defineProps({
status: String
})

</script>

<template>
<section v-if="status">
<h1 class="text-green-500 font-bold">{{status}}!</h1>
</section>
  </template>