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
    row: {
    type: Number,
    default: null, // Mengatur default value menjadi null
  },
    type: String,
  });

  const emit = defineEmits(['open-detail-modal']);
  
  const openModal = () => {

    if (props.row !== null) {
    emit('open-detail-modal', props.row, props.type);
  }else {
    emit('open-detail-modal',props.type);
  }
   
  };
  </script>
  