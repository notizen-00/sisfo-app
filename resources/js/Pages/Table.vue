<script setup lang="ts">
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import 'datatables.net-responsive';
import 'datatables.net-select';
 
DataTable.use(DataTablesCore);
 
const columns = [
  { data: 'name', title: 'Name' },
  { data: 'position', title: 'Position' },
  { data: 'office', title: 'Office' },
  { data: 'extn', title: 'Extension' },
  { data: 'start_date', title: 'Start date' },
  { data: 'salary', title: 'Salary' },
];
 
const options = {
  responsive: true,
  select: true,
};
</script>
 
<template>
    <DataTable
        :columns="columns"
        :options="options"
        ajax="/data.json"
        class="display nowrap"
    />
</template>