<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref,defineProps,computed,onMounted} from 'vue';
import FormShow from '@/Fragments/Forms/Pengajuan/FormShow.vue';
import Toolbar from '@/Fragments/Card/Pengajuan/Toolbar.vue'; 
import storeModel from '@/store/storeModel';

const props = defineProps({
  detail: Array, // Sesuaikan dengan tipe data yang diterima dari properti "users"
});

const detailPengajuan = ref(props.detail);
 
onMounted(() => {
    const PengajuanId = detailPengajuan.value[0].id;
    storeModel.commit('setPengajuanId', PengajuanId);
});



</script>

<template>
    <AppLayout title="Detail Kegiatan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Detail Kegiatan 
            </h2>
        </template>

        <Toolbar :id="detailPengajuan[0].id" />
        <div class="">
            <small>Pengajuan Ini Di Update oleh <b><u>{{ detailPengajuan[0].updated_by }} </u></b> Terakhir Kali pada : <b><u>{{ detailPengajuan[0].updated_at }}</u></b></small>    
        </div>

        <div class="py-12 md:w-full  sm:w-screen">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <FormShow :initialData="detailPengajuan" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
