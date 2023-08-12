<template>
  <div>
    <div class="wizard">
      <div class="steps">
        <div v-for="(step, index) in steps" :key="index" :class="{ active: currentStep === index }">
          Step {{ index + 1 }}
        </div>
      </div>
      <div class="step-content">
        <slot :step="currentStep"></slot>
      </div>
      <div class="buttons">
        <button @click="prevStep" :disabled="currentStep === 0">Previous</button>
        <button @click="nextStep" :disabled="currentStep === steps.length - 1">Next</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  steps: {
    type: Array,
    required: true,
  },
});

let currentStep = ref(0);

function nextStep() {
  if (currentStep.value < props.steps.length - 1) {
    currentStep.value++;
  }
}

function prevStep() {
  if (currentStep.value > 0) {
    currentStep.value--;
  }
}
</script>

<style scoped>
/* ... your styles ... */
</style>
