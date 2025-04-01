<script  setup>
import AdminDashboardLayout from "../../Layout/AdminDashboardLayout.vue"
import Index from "./Sections/Index.vue";


defineProps({
  events: Object
})


</script>

<template>
<AdminDashboardLayout>
    <Index  :events="events"  />
</AdminDashboardLayout>


  </template>