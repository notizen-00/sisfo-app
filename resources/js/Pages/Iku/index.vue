<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Banner from '@/Components/Banner.vue';
import IkuTable from '@/Fragments/Table/IkuTable.vue';
import Modal from '@/Components/Modal.vue';
import { ref ,defineProps} from 'vue';
import {usePage } from '@inertiajs/vue3';

// Sesuaikan path dengan lokasi komponen UserTable 
const props = defineProps({
  data_iku: Array, // Sesuaikan dengan tipe data yang diterima dari properti "users"
});


const IkuData = ref(props.data_iku);



</script>

<template>
    <AppLayout title="Data Unit Kerja">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Unit Kerja
            </h2>
            
        </template>
        <div v-if="$page.props.flash.message" class="mb-4 font-medium text-sm text-green-600">
            {{ $page.props.flash.message }}
        </div>
        <div class="py-12 w-full bg-white mt-4">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <IkuTable :initialData="IkuData" /> 
            </div>
        </div>
        <!-- Gunakan komponen Modal -->
      
   
    </AppLayout>
</template>
