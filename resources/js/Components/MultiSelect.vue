<template>
    <div>
      <Multiselect
        v-model="value"
        :options="options"
      />
    </div>
  </template>
  
  <script setup>
  import Multiselect from '@vueform/multiselect'
  
  const value = null;
  const options = ['Batman', 'Robin', 'Joker'];
  </script>
  
  <style src="@vueform/multiselect/themes/default.css"></style>
  