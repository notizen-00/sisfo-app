<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Banner from '@/Components/Banner.vue';
import UserTable from '@/Fragments/Table/UserTable.vue';
import Modal from '@/Components/Modal.vue';
import { ref ,defineProps} from 'vue';

// Sesuaikan path dengan lokasi komponen UserTable 
const props = defineProps({
  users: Array, // Sesuaikan dengan tipe data yang diterima dari properti "users"
});

const userData = ref(props.users);



</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data User Management
            </h2>
        </template>
      
        <div class="py-12 w-full bg-white mt-4">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <UserTable :initialData="userData" /> 
            </div>
        </div>
        <!-- Gunakan komponen Modal -->
      
   
    </AppLayout>
</template>
