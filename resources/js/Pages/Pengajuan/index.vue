<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PengajuanTable from "@/Fragments/Table/PengajuanTable.vue";
import { ref ,defineProps} from 'vue';

// Sesuaikan path dengan lokasi komponen UserTable 
const props = defineProps({
  pengajuan: Array, // Sesuaikan dengan tipe data yang diterima dari properti "users"
});

const dataPengajuan = ref(props.pengajuan);

</script>

<template>
    <AppLayout title="Data Pengajuan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Pengajuan
            </h2>
        </template>
      
        <div class="py-12 w-full bg-white mt-4">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <PengajuanTable :initialData="dataPengajuan" /> 
            </div>
        </div>
        <!-- Gunakan komponen Modal -->
      
   
    </AppLayout>
</template>
