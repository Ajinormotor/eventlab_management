<script  setup>
defineProps({
  color: String
})

</script>

<template>
    <button  type="submit"
    :class=" ['disabled:cursor-wait disabled:bg-slate-400 rounded-lg  flex items-center justify-center py-4 font-bold cursor-pointer',
    color ? color : 'bg-amber-300']">
      <slot  />
</button>
  </template>
