<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

import Wizard from '@/Fragments/Forms/Pengajuan/Wizard.vue';


</script>

<template>
    <AppLayout title="Pengajuan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Tambah Pengajuan Kegiatan
            </h2>
        </template>


        <div class="py-12 md:w-full  sm:w-screen">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Wizard/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
