<script setup>
const footerData = [
  {
    title: "Conference",
    links: [
      { text: "About Us", url: "#about" },
      { text: "Community", url: "#community" },
      { text: "Rewards", url: "#rewards" },
      { text: "Work with Us", url: "#careers" },
      { text: "Meet the team", url: "#team" }
    ]
  },  
  {
    title: "Support",
    links: [
      { text: "Help Center", url: "#help" },
      { text: "FAQs", url: "#faqs" },
      { text: "Contact Us", url: "#contact" },
      { text: "Feedback", url: "#feedback" }
    ]
  },
  {
    title: "Other Services",
    links: [
      { text: "Blog", url: "#blog" },
      { text: "Events", url: "#events" },
      { text: "Newsletter", url: "#newsletter" }
    ]
  }
];

const currentYear = new Date().getFullYear();
</script>

<template>
  <footer class="bg-[#f1f3ff] w-full">
    <!-- Upper Footer -->
    <div class="container mx-auto px-4 py-12">

      <div class="flex flex-col md:flex-row gap-12">
        
        <!-- Company Info -->
        <div class="md:w-1/3 flex flex-col gap-5">
          <img 
          src="https://demo.egenslab.com/html/eventlab/assets/images/logo.png" 
            alt="Company Logo"
            class="w-40 h-auto mb-4"
            width="160"
            height="40"
          />
          <p class="text-gray-600">
            I appreciate your amazing services and professional staff for
            all your hard work and creative thinking.
          </p>

          <div class="flex border rounded-lg ronded">
            <input type="" class="w-full bg-wit outline-none px-2" placeholder="" />
            <button class="bg-indigo-500 text-white p-2 px-4 rounded-lg">
              Send
            </button>

          </div>
        </div>

        <!-- Footer Links -->
        <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-3 gap-8">
          <div v-for="(column, index) in footerData" :key="`column-${index}`">
            <h3 class="text-lg font-semibold text-[#3a3089] border-b-2 border-[#3a3089] pb-2 mb-4">
              {{ column.title }}
            </h3>
            <ul class="space-y-2">
              <li v-for="(link, linkIndex) in column.links" :key="`link-${index}-${linkIndex}`">
                <a 
                  :href="link.url" 
                  class="text-gray-600 hover:text-[#3a3089] transition-colors"
                >
                  {{ link.text }}
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <!-- Lower Footer -->
    <div class="bg-[#3a3089] py-6">
      <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-white text-sm">
          Copyright © {{ currentYear }} All Rights Reserved
        </p>
        <div class="flex gap-4">
          <a href="#privacy" class="text-white hover:underline text-sm border-r border-white pr-4">
            Privacy Policy
          </a>
          <a href="#terms" class="text-white hover:underline text-sm">
            Terms & Conditions
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>