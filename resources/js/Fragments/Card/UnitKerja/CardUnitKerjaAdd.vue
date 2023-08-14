<template>
    <Card>
        <template #card-header>
            <h1 class="text-xl text-left"><b>Form Unit Kerja</b></h1>
        </template>
        <template #card-title>
            <h2 class="text-left text-lg">isikan form Unit Kerja dengan benar </h2>
            <hr>
            <div class="h-1 bg-blue-200 mt-1">  
            </div>
        </template>
        <template #card-body>
          
            <template v-if="isLoading">
                <font-awesome-icon :icon="icons.spin" size="5x" spin class="text-blue-500"/>
            </template>
            <template v-else>
                <FormAdd/>
            </template>
        </template>
        <template #card-footer>
            <!-- <PrimaryButton class="px-14 py-2 text-sm">Test</PrimaryButton> -->
        </template>
    </Card>
</template>

<script setup>
import { defineProps, ref, onMounted, watch, computed } from "vue";
import axios from "axios";
import { useStore } from 'vuex';
import { faSpinner } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import FormPengajuanAdd from "@/Fragments/Forms/Pengajuan/FormPengajuanAdd.vue";
import FormAdd from "@/Fragments/Forms/UnitKerja/FormAdd.vue";
import Card from "@/Components/Card.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";


const icons = {
    spin:faSpinner
};
const isLoading = ref(true);

// Menjalankan aksi pengambilan data dan mengatur loader
onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 700);
});
</script>
