<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    classes:{
        type: String,
    }
});
</script>

<template>
    <button :type="type"  :class="`inline-flex items-center bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 transition ease-in-out duration-150 ${classes}`">
        <slot />
    </button>
</template>
