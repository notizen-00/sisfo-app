<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'flex items-center p-3 space-x-2 border-b-2 border-indigo-400 text-md font-medium leading-5 text-blue-400 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'flex items-center p-3 space-x-2 border-b-2 border-transparent text-md font-medium leading-5 text-gray-900 hover:text-blue-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
