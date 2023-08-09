<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Banner from '@/Components/Banner.vue';
import Table from '@/Components/Table.vue';
import { ref } from 'vue'

const searchQuery = ref('')
const gridColumns = ['name', 'power']
const gridData = [
  { name: 'Chuck Norris', power: Infinity },
  { name: 'Bruce Lee', power: 9000 },
  { name: 'Jackie Chan', power: 7000 },
  { name: 'Jet Li', power: 8000 }
]

 

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard Aplikasi
            </h2>
        </template>

        <div class="py-12 w-full bg-white mt-4">
            <div class=" mx-auto sm:px-6 lg:px-8">
                
                <form id="search">
                    Search <input name="query" class="text-sm border-2 py-1 rounded-md border-blue-400 mb-2" v-model="searchQuery">
                  </form>
                  <Table
                    :data="gridData"
                    :columns="gridColumns"
                    :filter-key="searchQuery">
                </Table>
               
                  
            </div>
        </div>
    </AppLayout>
</template>