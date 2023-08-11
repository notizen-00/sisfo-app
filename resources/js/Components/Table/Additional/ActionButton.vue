<template>
    <button
      type="button"
      @click="openModal"
    >
    <slot name="icons" />
    
    </button>
  </template>
  
  <script setup>
  import { defineProps, defineEmits } from 'vue';
  
  const props = defineProps({
    row: Number,
    type: String,
  });

  const emit = defineEmits(['open-detail-modal']);
  
  const openModal = () => {

    emit('open-detail-modal', props.row,props.type);
   
  };
  </script>
  