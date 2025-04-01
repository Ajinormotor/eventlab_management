
<script  setup>

import NoticeEvent from './NoticeEvent.vue';
import Numbers from './Numbers.vue';
import Stats from './Stats.vue';

import { usePage } from '@inertiajs/vue3';

defineProps({
  events: Object
})


const page = usePage()




</script>

<template>
<section class="flex flex-col gap-3">
  <Numbers />
<NoticeEvent :events="events" />
<Stats  />

</section>
  </template>