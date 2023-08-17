<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Banner from '@/Components/Banner.vue';
import Modal from '@/Components/Modal.vue';
import Toast from '@/Components/Toast.vue';
import Calendar from '@/Fragments/Calendar.vue';
import { ref ,defineProps} from 'vue';
import { usePage } from '@inertiajs/vue3';
import { formatRupiah } from '@/Service/Helper.js';

// Sesuaikan path dengan lokasi komponen UserTable 
const props = defineProps({
  jumlah_pagu: Number,
});

const jumlah_pagu = ref(formatRupiah(props.jumlah_pagu));
const page = usePage();
console.log(page.props.auth.roles)
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Dashboard
               {{ $page.props.auth.user.roles }}
           
            </h2>
        </template>
        <div class="grid grid-cols-3 gap-4 bg-white mt-4 " v-if="$page.props.auth.roles == 'admin' ">
            <div class=" bg-cyan-400 shadow-lg ml-4 shadow-cyan-500/50 rounded-md text-center mt-10 text-white">01</div>
            <div class=" bg-cyan-400 shadow-lg ml-4 shadow-cyan-500/50 rounded-md text-center mt-10 text-white">02</div>
            <div class=" bg-cyan-400 shadow-lg ml-4 shadow-cyan-500/50 rounded-md text-center mt-10 text-white">03</div>
            <div class="col-span-2 h-40 bg-cyan-400 shadow-lg ml-4 shadow-cyan-500/50 rounded-md text-center text-white"><h1 class="text-center mt-24">{{ jumlah_pagu }}</h1></div>
            <div class="bg-blue-400">05</div>
            <div class="bg-blue-500">06</div>
            <div class="col-span-2 bg-red-600">07</div>
          </div>
        <div class="py-12 w-full bg-white mt-4 ml-0">
            
            <div class=" mx-auto sm:px-6 lg:px-8">

                <Calendar />
             
            </div>
        </div>
        <!-- Gunakan komponen Modal -->
      
   
    </AppLayout>
</template>
