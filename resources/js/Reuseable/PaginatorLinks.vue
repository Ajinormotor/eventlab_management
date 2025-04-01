<script setup>
defineProps({
    paginator: Object
});

const makeLabel = (label) => {
    if(label.includes("Previous")){
        return "<<";
    } else     if(label.includes("Next")){
        return ">>"} else{
            return label;
        }
}

</script>

<template>
<section class="flex justify-between items-center p-2 w-full">


    <div class="flex items-center justify-between rounded-md overflow-hidden
     shadow-lg border-x border-slate-50">
        <div v-for="(link, i) in paginator.links" :key="i">
            <component  
                :is="link.url ? 'a' : 'span'"
                :href="link.url || null"
                class=" w-20 h-12 grid place-items-center bg-white"
                :class="
                {
 'text-slate-300 font-bold': !link.url,
 'text-indigo-500 bg-black font-bold rounded-full w-[50px] h-[50px]':link.active,

                }"
            >
                <span v-html="makeLabel(link.label)" />
            </component>
        </div>


   
    </div>

    <div class="flex items-center">
        <p class="fnt-normal ">Showing {{ paginator.from }} to  {{ paginator.to }} of {{paginator.total}}  results  </p>

    </div>
</section>
</template>
