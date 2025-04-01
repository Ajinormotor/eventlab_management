

<script setup>


import { usePage } from '@inertiajs/vue3';
import Footer from '../Common/Footer.vue';
import { computed } from 'vue';

const page = usePage()
const hideLayout = computed(() => page.component?.includes('Register')
|| page.component?.includes('Login')
|| page.component?.includes('Dashboard')
|| page.component?.includes('ForogotPassword')
|| page.component?.includes('ResetPassword')
|| page.component?.includes('Profile')

)

</script>

<template>
    <section>



    <main>
        <slot />
    </main>

    <footer  v-if="!hideLayout">
        <Footer  />
    </footer>

</section>
  
</template>