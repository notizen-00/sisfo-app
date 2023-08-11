<template>
    <Card>
        <template #card-header>
            Edit User
        </template>
        <template #card-body>
            {{ id }} <!-- Gunakan huruf kecil di sini -->
        </template>
        <template #card-footer>
            <PrimaryButton class="px-14 py-2 text-sm">Test</PrimaryButton>
        </template>
    </Card>
</template>

<script setup>
import { defineProps } from "vue";
import Card from "@/Components/Card.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  id: Number // Gunakan huruf kecil di sini
});

</script>
