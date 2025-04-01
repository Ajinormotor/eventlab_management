<script setup>
import { Link } from '@inertiajs/vue3';

const pricingData = [
  {
    id: '1',
    title: "Silver",
    price: "$100",
    list: [
      { icon: "ri-checkbox-circle-line", subtitle: "Conference Ticket" },
      { icon: "ri-close-circle-line", subtitle: "Conference Certificate" },
      { icon: "ri-close-circle-line", subtitle: "VIP Seating" }
    ]
  },
  {
    id: '2',
    title: "Gold",
    price: "$200",
    list: [
      { icon: "ri-checkbox-circle-line", subtitle: "Conference Ticket" },
      { icon: "ri-checkbox-circle-line", subtitle: "Conference Certificate" },
      { icon: "ri-close-circle-line", subtitle: "VIP Seating" }
    ]
  },
  {
    id: '3',
    title: "Bronze",
    price: "$50",
    list: [
      { icon: "ri-checkbox-circle-line", subtitle: "Conference Ticket" },
      { icon: "ri-close-circle-line", subtitle: "Conference Certificate" },
      { icon: "ri-close-circle-line", subtitle: "VIP Seating" }
    ]
  }
];
</script>

<template>
  <section class="flex flex-col items-center gap-8 py-15">
    <!-- Section Heading -->
    <div class="text-center">
      <h1 class="text-indigo-500 text-lg font-semibold">Ticket</h1>
      <h1 class="uppercase md:text-4xl font-bold">Host your event with Ease</h1>
    </div>

    <!-- Pricing Cards -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-5 md:gap-0">

      <div 
        v-for="price in pricingData" 
        :key="price.id"
        :class="['bg-white border border-gray-300 shadow-md rounded-lg md:w-[350px] w-full text-center  cursor-pointer group',
        price.id === '2' ? 'md:h-[390px] hover:border hover:border-indigo-400' : 'h-[300px] hover:border-green-400 hover:border ']"
      >
        <!-- Pricing Header -->
        <div 
          :class="[
            'flex flex-col items-center justify-center rounded-b-lg py-2 text-white',
            price.id === '2' ? 'bg-indigo-500 ' : 'bg-green-500'
          ]"
        >

     
          <h1 class="text-xl font-bold">{{ price.title }}</h1>
          <p class="text-lg font-semibold">{{ price.price }}</p>
        </div>

        <div class="flex flex-col gap-4 items-center justify-center py-4">
        <!-- Features List -->
        <div class="mt-4 space-y-2">
          <div 
            v-for="(list, index) in price.list" 
            :key="index"
            class="flex items-center gap-2 text-gray-700"
          >
            <i :class="list.icon"
             class="text-lg "></i>
            <span>{{ list.subtitle }}</span>
          </div>
        </div>

        <!-- Action Button -->
        <Link 
         :class="['mt-4 text-white px-5 py-2 rounded-lg inline-block transition max-w-[150px]',
              price.id === '2' ? 'bg-indigo-500 ' : 'bg-green-500']"
        >
          Host an Event
        </Link>
      </div>

    </div>

    </div>

  </section>
</template>
