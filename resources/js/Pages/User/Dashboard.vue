<script  setup>

import DashboardLayout from '../../Layout/DashboardLayout.vue';
import Index from './Sections/Index.vue';

defineProps({
    events: Object
})

</script>

<template>
    <Head title="Dashboard"  />
    
 <section>
    <DashboardLayout>

<div class="">
 <Index  :events="events" />
</div>

    </DashboardLayout>

 </section>
  </template>