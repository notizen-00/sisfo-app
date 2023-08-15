<script setup>

import { Link } from '@inertiajs/vue3';
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    classes:{
        type: String,
    },
    color:{
        type: String,
        default: 'bg-slate-500'
    },
    icon:String,
    href:String

});
</script>

<template>
    <Link :href="href" :type="type"  :class="`inline-flex items-center bg-${color}-500 border border-transparent rounded-md font-semibold text-xs shadow-xl box-${color}-600 text-white uppercase tracking-widest hover:bg-${color}-400 focus:bg-${color}-400 active:bg-${color}-400 focus:outline-none focus:ring-2 ring-${color}-500 focus:ring-offset-1 transition ease-in-out duration-150 ${classes}`">
        <slot /> 
        <i :class="`${icon} ml-1`" size="2xl"></i>
    </Link>
</template>
