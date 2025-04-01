
<script  setup>
import Layout from '../Layout/Layout.vue';
import Hero from '../Component/Home/Hero.vue';
import Description from '../Component/Home/Description.vue';
import Events from '../Component/Home/Events.vue';
import Pricing from '../Component/Home/Pricing.vue';


defineOptions({
    layout: Layout
})

defineProps({
    events: Object
})

</script>



<template>

    
<Head title="Home" />

    <div>
<Hero  />
<Description />
<Events  :events="events"/>
<Pricing />
    </div>
  </template>