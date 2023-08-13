<template>

    <Popper arrow hover openDelay="200" closeDelay="100">
        <NavLinkSidebar :href="route('pengajuan.create')">
            <slot name="title"></slot>
        </NavLinkSidebar>
        <template #content>
         <slot name="content"></slot>
        </template>
      </Popper>
   
</template>

<script setup>
    import NavLinkSidebar from '@/Components/NavLinkSidebar.vue';
</script>