<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Banner from '@/Components/Banner.vue';
import Modal from '@/Components/Modal.vue';
import Toast from '@/Components/Toast.vue';
import Calendar from '@/Fragments/Calendar.vue';
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
               Dashboard
           
            </h2>
        </template>
      
        <div class="py-12 w-full bg-white mt-4 ml-0">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <Calendar />
             
            </div>
        </div>
        <!-- Gunakan komponen Modal -->
      
   
    </AppLayout>
</template>
