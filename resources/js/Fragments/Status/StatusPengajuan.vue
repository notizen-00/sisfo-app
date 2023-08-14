<template>
    <div>
        <button class="text-white bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded-md px-5 py-1 " v-if="nomor == 1">Open</button>
        <span class="text-white bg-purple-500 border-2 border-white rounded-md px-2 py-1" v-if="nomor == 2">Proses Review</span>
        <span class="text-white bg-red-500 border-2 border-white rounded-md px-2 py-1" v-if="nomor == 3">Revisi</span>
        <span class="text-white bg-green-500 border-2 border-white rounded-md px-2 py-1" v-if="nomor == 4">Selesai</span>
    </div>
</template>
<script setup>
import { ref, defineProps, watchEffect } from "vue";

defineProps({
    nomor: Number
});




</script>
