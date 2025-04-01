import './bootstrap';

import 'remixicon/fonts/remixicon.css'

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import { ZiggyVue } from "../../vendor/tightenco/ziggy"
import Layout from './Layout/Layout.vue';




createInertiaApp({

     title: (title) => `Expovent | ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
   let page = pages[`./Pages/${name}.vue`] 

   if(!page.default.layout){
   page.default.layout = name === 'Register' ||  name === 'Login'  ||
   page.default.layout === 'ForgotPassword'  ||
   page.default.layout === 'ResetPassword'   ||
   page.default.layout === 'Profile' 
   
   ? null : Layout
  }

  return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component("Head", Head)
      .component("Link", Link)
      .mount(el)
  },
})