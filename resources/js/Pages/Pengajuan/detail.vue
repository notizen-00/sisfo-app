<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref} from 'vue';


const props = defineProps({
  detail: Array, // Sesuaikan dengan tipe data yang diterima dari properti "users"
});

const detailPengajuan = ref(props.detail);
</script>

<template>
    <AppLayout title="Detail Kegiatan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Detail Kegiatan 
            </h2>
        </template>


        <div class="py-12 md:w-full  sm:w-screen">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <iframe class="mx-auto" v-if="detailPengajuan.file_tor" :src="`/storage/files/${detailPengajuan.file_tor}`" width="900" height="900"></iframe>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
