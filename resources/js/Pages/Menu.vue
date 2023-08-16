<template>
    <div>
      <!-- <h1>My Page</h1>
      <my-form-wizard :steps="wizardSteps">
        <template v-for="(step, index) in wizardSteps" :key="index" v-if="index === currentStep">
          <h2>Step {{ index + 1 }}</h2>
          <p>{{ step.content }}</p>
        </template>
      </my-form-wizard> -->
    </div>
  </template>
  
  <script setup>
  // import MyFormWizard from '@/Components/Wizards/Wizard.vue';
  import { ref } from 'vue';
  
  const wizardSteps = [
    { content: 'Step 1 Content' },
    { content: 'Step 2 Content' },
    { content: 'Step 3 Content' },
  ];
  
  let currentStep = ref(0);
  </script>
  