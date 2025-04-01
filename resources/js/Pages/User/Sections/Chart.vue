<script lang="ts" setup>
import { ref } from 'vue'
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
} from 'chart.js'
import { Line } from 'vue-chartjs'


ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
)

// Define reactive chart data
const chartData = ref({
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
      label: 'Data One',
      backgroundColor: '#f87979',
      borderColor: '#f87979',
      borderWidth: 2,
      fill: false,
      data: [40, 39, 10, 40, 39, 80, 40]
    }
  ]
})


const chartOptions = ref({
  responsive: true,
  maintainAspectRatio: false
})
</script>

<template>
  <div class="max-w-[600px] w-full h-[400px]">
    <Line :data="chartData" :options="chartOptions" />
  </div>
</template>
