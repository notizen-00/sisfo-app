<template>
    <Head title="Form Tambah Unit Kerja"></Head>
    <div class="w-full mx-auto">

       

        <form @submit.prevent="submitForm">
            <div>
                <InputLabel for="nama_unit" class="text-left ml-1" value="Unit Kerja" />
                <TextInput
                    id="nama_unit"
                    v-model="form.nama_unit"
                    type="text"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="nama_unit"
                />
                <InputError class="mt-2" :message="form.errors.nama_unit" />
            </div>

            <div class="mt-4">
                <InputLabel for="pagu" class="text-left ml-1" value="Pagu" />
                <TextInput
                    id="pagu"
                    v-model="form.pagu"
                    type="number"
                    class="mt-1 block w-full"
                    required
                    autocomplete="pagu"
                />
                <InputError class="mt-2" :message="form.errors.pagu" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4 p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Simpan
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


const { props } = defineProps({
    canResetPassword: Boolean,
    errors:Object,
    status: String,
});

const form = useForm({
   
    nama_unit: '',
    pagu: '',

});

const submitForm = () => {
    form.transform(data => ({
        ...data,
    })).post(route('unitkerja.store'), {
        onFinish: () => {    
          form.reset('password')
          window.location.reload();
        },
    });
};
</script>
