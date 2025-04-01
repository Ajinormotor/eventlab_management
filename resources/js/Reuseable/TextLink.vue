<script  setup>
import { Link } from '@inertiajs/vue3'; 

defineProps({
    routeName: String
})

</script>

<template>
    <Link class="underline text-blue-500"
    :href="route(routeName)">
      <slot />
</Link>
  </template>