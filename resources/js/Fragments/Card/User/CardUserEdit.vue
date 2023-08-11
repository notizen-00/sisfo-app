<template>
    <Card>
        <template #card-header>
           <h1 class="text-left ml-2 text-slate-600"> UserId-{{ userDetail ? userDetail.id : '0' }} </h1>
        </template>
        <template #card-title>
            Form Update Data User
        </template>
        <template #card-body>
            <template v-if="isLoading">
                
                <font-awesome-icon :icon="icons.spin" size="3x" spin class="text-blue-500"/>
            </template>
            <template v-else>
                <FormUserEdit ></FormUserEdit>
            </template>
        </template>
        <template #card-footer>
            <!-- <PrimaryButton class="px-14 py-2 text-sm">Test</PrimaryButton> -->
        </template>
    </Card>
</template>

<script setup>
import { ref, onMounted, watch, computed } from "vue";
import axios from "axios";
import { useStore } from 'vuex';
import FormUserEdit from '@/Fragments/Forms/User/FormUserEdit.vue';
import { faSpinner } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Card from "@/Components/Card.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const store = useStore();
const userDetail = computed(() => store.getters.getUserData);

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
