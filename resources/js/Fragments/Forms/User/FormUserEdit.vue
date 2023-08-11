<template>
    <div class="w-full mx-auto">

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
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" class="text-left ml-1" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4 p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
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

const store = useStore();

// Menggunakan computed properties untuk mengakses data dari Vuex
const userDetail = computed(() => store.getters.getUserData);
const id = computed(() => store.getters.getUserId);

const form = useForm({
    // Menggunakan ref untuk mengubah input dan masih memuat data awal dari Vuex saat komponen dimuat
    username: ref(userDetail.value.name),
    email: ref(userDetail.value.email),
    remember: false,
});

// Watch perubahan pada userDetail untuk mengubah input form
watch(userDetail, (newUserDetail) => {
    form.username = newUserDetail.name;
    form.email = newUserDetail.email;

});

const submitForm = (event) => {
    event.preventDefault();
    
    form.transform(data => ({
        _method:'put',
        ...data,
    })).post(route('user.update', { id: id.value }), {
        onFinish: () => form.reset('password'),
    });
};
</script>
