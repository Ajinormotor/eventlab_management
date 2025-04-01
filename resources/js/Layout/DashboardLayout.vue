<script setup>
import { ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const sideNavLink = [
    { title: 'Dashboard', icon: 'dashboard-line', path: 'dashboard.user', id: '1' },
    { title: 'Event', icon: 'shopping-cart-line', path: 'event.index', id: '2' },
    { title: 'Profile', icon: 'settings-line', path: 'dashboard.user.profile', id: '3' },
];

const showNav = ref(false);
const activeId = ref(null);

const toggleNav = () => {
    showNav.value = !showNav.value;
};
const handleLogout = () => {
    router.post(route('logout'))
}

const page = usePage()

const user =  computed(() => page.props.auth.user)


</script>

<template>
    <Head title="Dashboard" />
    <section class="flex max-h-screen bg-[#f9f9f9] relative">

        <!-- Sidebar -->
        <div
            :class="[
                'bg-indigo-600 h-screen gap-6 transition-all duration-300 fixed flex flex-col  items-start ',
                showNav ? 'w-[240px] px-6 z-10' : 'w-[50px] md:w-[80px] px-1 m:px-2'
            ]"
        >

            <div class="flex items-start justify-between gap-6 py-4">
                <img
                    v-if="showNav"
                    src="https://demo.egenslab.com/html/eventlab/assets/images/logo.png"
                    alt="Logo"
                    class="md:w-[121px] md:h-[36px]"
                />
                <i
                    @click="toggleNav"
                    class="ri-menu-2-line text-3xl font-bold cursor-pointer text-white "
                ></i>
            </div>


            <div class="mt-6 space-y-4">
                <Link
                :href="route(item.path)"
                    v-for="item in sideNavLink"
                    :key="item.id"
                    @click="activeId = item.id"
                    class="flex items-center  gap-4 cursor-pointer p-2 
                    rounded-lg transition-all duration-300"
                    :class="[
                        activeId === item.id
                            ? 'bg-white text-indigo-600'
                            : 'opacity-60 text-white hover:opacity-100'
                    ]"
                >
                    <i :class="`ri-${item.icon} text-2xl`"></i>
                    <span v-if="showNav" class="text-xl font-medium">{{ item.title }}</span>
            </Link>
                
            </div>

<div v-if="showNav" class=" w-full px-2">
    <img src="https://codeskdhaka.com/html/expovent-prev/expovent/assets/img/sidebar/sidebar.jpg"
    alt=""  class="h-[170px] w-full rounded-md"  key=""
    />
</div>


<div class=" items-center justify-start flex w-full -">
    <button
@click="handleLogout"
    class="flex items-center justify-start gap-2 cursor-pointer group p-2"
    >
    <i class="ri-door-line text-red-500 text-2xl group-hover:font-bold"></i>
    <h1 v-if="showNav" class="text-red-500 group-hover:font-bold">Logout</h1>
</button>

</div>

        </div>

        <!-- Main Content -->
        <div :class="[ 'w-full  flex flex-col',
        showNav ? 'ml-[240px]' : 'ml-11 md:ml-20'
        ]">

            <div class="flex justify-between items-center gap-3  md:h-[76px] shadow-sm  p-3">


                <!-- searchInput -->
                <div class="md:flex items-center rounded-lg h-[45px] max-w-[250px]  md:max-w-[500px] w-full p-2  
                border border-indigo-500
                ">
                    <input 
                    type="text"
                     placeholder="Search Here ...."
                     class="border-0 outline-none md:w-full bg-transparent text-indigo-500"
                     />
                     <i class="ri-search-2-line text-indigo-500"></i>
                </div>
        
                <div class=" flex items-center gap-2">
                    <img 
                    :src=" user.image 
                    ?  `/storage/${user.image}`
                    : '/storage/app/public/image/default_user.png' " 
                    class="rounded-full w-[45px] h-[45px]"/>
                    <h1 class="md:text-xl text-[10px]">{{ user.first_name }} {{user.last_name}}</h1>
                </div>
        
            </div>

            <slot />
        </div>

    </section>
</template>
