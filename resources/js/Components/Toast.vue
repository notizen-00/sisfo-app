<template>
    <div>
      <button class="bg-violet-400 rounded-md px-4  text-white text-lg shadow-xl box-violet-500" @click="notify">
        {{ title }}
      </button>
    </div>
  </template>
  
  <script setup>
  import { toast } from 'vue3-toastify';
  import { defineProps,onMounted } from 'vue';
  import 'vue3-toastify/dist/index.css';
  
    defineProps({
        title:String
    });

    onMounted(() => {
        toast("Wow so easy !", {
          autoClose: 5000,
          position: toast.POSITION.TOP_CENTER,
        }); 
    });
     const notify = () => {
       // ToastOptions
    }
      
  </script>