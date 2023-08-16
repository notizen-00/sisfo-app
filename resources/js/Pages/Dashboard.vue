<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Banner from '@/Components/Banner.vue';
import Modal from '@/Components/Modal.vue';
import Toast from '@/Components/Toast.vue';
import Calendar from '@/Fragments/Calendar.vue';
import { ref ,defineProps} from 'vue';
import { formatRupiah } from '@/Service/Helper.js';

// Sesuaikan path dengan lokasi komponen UserTable 
const props = defineProps({
  jumlah_pagu: Number,
});

const jumlah_pagu = ref(formatRupiah(props.jumlah_pagu));


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Dashboard
           
            </h2>
        </template>
      
        <div class="py-12 w-full bg-white mt-4 ml-0">
            <div class="">
                {{ jumlah_pagu }}
            </div>
            <div class=" mx-auto sm:px-6 lg:px-8">

                <Calendar />
             
            </div>
        </div>
        <!-- Gunakan komponen Modal -->
      
   
    </AppLayout>
</template>
