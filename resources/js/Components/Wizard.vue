<template>
    <FormWizard @on-complete="onComplete" color="#094899"  v-bind="$attrs">
  
      <TabContent title="Personal details" icon="fa fa-user">
        My first tab content
      </TabContent>
      <TabContent title="Additional Info" icon="fa fa-gear">
        My second tab content
      </TabContent>
      <TabContent title="Last step" icon="fa fa-city">
        Yuhuuu! This seems pretty damn simple
      </TabContent>
    </FormWizard>

    
  </template>
  
  <script setup>
  import { FormWizard, TabContent } from "vue3-form-wizard";
  import "vue3-form-wizard/dist/style.css";
  
  const onComplete = () => {
    alert("Yay. Done!");
  };
  </script>
  
  <style>
  @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css");
  </style>
  