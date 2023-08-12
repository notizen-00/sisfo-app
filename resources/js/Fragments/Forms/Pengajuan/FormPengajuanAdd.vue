<template>
    <Head title="Form Pengajuan " />
    <div class="w-full">

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submitForm">
            <div>
                <InputLabel for="username" class="text-left ml-1" value="Nama Lengkap" />
                <TextInput
                    id="username"
                    v-model="form.username"
                    type="text"
                    class="mt-1 py-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="flex justify-center w-full">
                <div class="mt-4 w-1/3">
                    <InputLabel for="kode_mak" class="text-left ml-1" value="Kode Mak" />
                    <TextInput
                        id="kode_mak"
                        v-model="form.kode_mak"
                        type="text"
                        class="mt-1 py-1 block w-full"
                        required
                        autocomplete="Kode Mak"
                    />
                    <InputError class="mt-2" :message="form.errors.kode_mak" />
                </div>
                <div class="mt-4 w-2/3">
                    <InputLabel for="pjk" class="text-left ml-1" value="Nama Penanggung Jawab" />
                    <TextInput
                        id="pjk"
                        v-model="form.pjk"
                        type="text"
                        class="mt-1 ml-2 py-1 block w-full"
                        required
                        autocomplete="Pjk"
                    />
                    <InputError class="mt-2" :message="form.errors.pjk" />
                </div>
            </div>
            <div class="mt-4">
                <InputLabel for="nama_pengajuan" class="text-left ml-1" value="Nama kegiatan" />
                <TextInput
                    id="nama_pengajuan"
                    v-model="form.nama_pengajuan"
                    type="text"
                    class="mt-1 py-2 block w-full"
                    required
                    autofocus
                    autocomplete="nama_pengajuan"
                />
                <InputError class="mt-2" :message="form.errors.nama_pengajuan" />
            </div>
            <div class="flex justify-center w-full">
                <div class="mt-4 w-1/3">
                    <InputLabel for="iku_id" class="text-left ml-1" value="IKU" />
                    <TextInput
                        id="iku_id"
                        v-model="form.iku_id"
                        type="text"
                        class="mt-1 py-1 block w-full"
                        required
                        autocomplete="iku_id"
                    />
                    <InputError class="mt-2" :message="form.errors.iku_id" />
                </div>
                <div class="mt-4 w-2/3">
                    <InputLabel for="output" class="text-left ml-1" value="Output Kegiatan" />
                    <TextInput
                        id="output"
                        v-model="form.output"
                        type="text"
                        class="mt-1 ml-2 py-1 block w-full"
                        required
                        autocomplete="Output"
                    />
                    <InputError class="mt-2" :message="form.errors.output" />
                </div>
            </div>

            <div>
                <InputLabel for="file_tor" class="text-left ml-1" value="File Tor" />
                <TextInput
                    id="file_tor"
                    v-model="form.file_tor"
                    type="file"
                    class="mt-1 py-1 block w-full"
                    required
                    autofocus
                    autocomplete="file_tor"
                />
             
            </div>
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <!-- <input type="file" @input="form.file_tor = $event.target.files[0]" /> -->
          
           
            
          

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4 p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Tambah
                </PrimaryButton>
            </div>
        </form>
    </div>
</template>

<script setup>
import { defineProps, ref, computed, watch } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useStore } from 'vuex';

const { props } = defineProps({
    canResetPassword: Boolean,
    status: String,
});


// Menggunakan computed properties untuk mengakses data dari Vuex

const form = useForm({
    // Menggunakan ref untuk mengubah input dan masih memuat data awal dari Vuex saat komponen dimuat
    username: '',
    iku_id: '',
    kode_mak: '',
    pjk: '',
    nama_pengajuan:'',
    lokasi:'',
    pagu:'',
    output:'',
    file_tor: '',
    file_rab: '',
    tanggal_pelaksanaan: '',
    tanggal_selesai:'',
    jam_pelaksanaan:'',

});

// Watch perubahan pada userDetail untuk mengubah input form


const submitForm = (event) => {
    event.preventDefault();
    
    form.transform(data => ({
        ...data,
    })).post(route('pengajuan.store'), {
        onFinish: () => form.reset(''),

    });
};
</script>
