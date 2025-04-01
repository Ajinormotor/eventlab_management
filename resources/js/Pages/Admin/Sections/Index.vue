
<script  setup>
import Numbers from '../../User/Sections/Numbers.vue';
import NoticeEvent from '../../User/Sections/NoticeEvent.vue';
import Stats from '../../User/Sections/Stats.vue';


defineProps({
  events: Object
})

</script>

<template>
<section class="">
  
    <Numbers />
    <NoticeEvent :events="events"  />
    <Stats  />
  
</section>

  </template>
