<template>

    <Popper arrow hover placement="top" openDelay="200" closeDelay="100">
        <NavLinkSidebar :href="href">
            <slot name="title"></slot>
        </NavLinkSidebar>
        <template #content>
         <slot name="content"></slot>
        </template>
      </Popper>
   
</template>

<script setup>
    import NavLinkSidebar from '@/Components/NavLinkSidebar.vue';

defineProps({
    href: String,
});
</script>