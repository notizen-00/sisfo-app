<template>
    <div style="text-align: left">
      <label>Search : </label><input class="text-sm border-2 py-1 rounded-md border-blue-400 mb-2" v-model="searchTerm" />
    </div>
    <table-lite
      :is-static-mode="true"
      :columns="table.columns"
      :rows="filteredRows"
      :total="totalRecordCount"
      :sortable="table.sortable"
    ></table-lite>
  </template>
  
  <script setup>
  import { ref, reactive, computed } from "vue";
  import TableLite from "@/Components/TableLite.vue";
  const searchTerm = ref(""); // Search text
  const props = defineProps({
  initialData: Array
});

  // Table config
  const table = reactive({
    columns: [
      {
        label: "ID",
        field: "id",
        width: "3%",
        sortable: true,
        isKey: true,
      },
      {
        label: "Name",
        field: "name",
        width: "10%",
        sortable: true,
      },
      {
        label: "Email",
        field: "email",
        width: "15%",
        sortable: true,
      },
      {
        label: "Action",
        headerClasses: ["bg-gold"],
        columnClasses: ["bg-gray"],
        columnStyles: { background: "gray" },
        field: "quick",
        width: "10%",
        display: function (row) {
          return (
            '<button type="button" data-id="' +
            row.id +
            '" class="is-rows-el quick-btn">Button</button>'
          );
        },
      },
    ],
    sortable: {
      order: "id",
      sort: "asc",
    },
  });
  
  const filteredRows = computed(() => {
    return props.initialData.filter(
      (x) =>
        x.email.toLowerCase().includes(searchTerm.value.toLowerCase()) ||
        x.name.toLowerCase().includes(searchTerm.value.toLowerCase())
    );
  });
  
  const totalRecordCount = computed(() => {
    return filteredRows.value.length;
  });
  </script>
  