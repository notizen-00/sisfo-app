<template>
    <div class="w-full mx-auto">

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <InputLabel for="unit_kerja" class="text-left ml-1" value="Unit Kerja" />
                <TextInput
                    id="unit_kerja"
                    v-model="form.unit_kerja"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="unit_kerja"
                />
                <InputError class="mt-2" :message="form.errors.unit_kerja" />
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
    status: String,
});

const form = useForm({
    // Menggunakan ref untuk mengubah input dan masih memuat data awal dari Vuex saat komponen dimuat
    unit_kerja: '',
    pagu: '',

});



const submitForm = (event) => {
    event.preventDefault();

    form.transform(data => ({
        ...data,
    })).post(route('unitkerja.store'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
