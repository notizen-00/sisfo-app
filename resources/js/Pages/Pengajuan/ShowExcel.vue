<template>
    <div class="mx-auto text-center">
      <b>View Excel Pengajuan</b><br/>
      <ol start="0">
        <li v-for="(name, index) in names" :key="index">{{ name }}</li>
      </ol>
  
      <table class="table w-full h-full p-2 bg-slate-300 mx-auto">
        <thead>
          <tr class="p-2">
            <th class="p-2 bg-green-400" v-for="(header, index) in headers" :key="index">{{ header }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, rowIndex) in data" :key="rowIndex">
            <td class="p-2 border-2 border-collapse m-2" v-for="(cell, cellIndex) in row" :key="cellIndex">{{ cell }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import * as XLSX from 'xlsx';
  
  const names = ref([]);
  const headers = ref([]);
  const data = ref([]);
  
  defineProps({
     filename:String
  })


  onMounted(async () => {
    /* parse workbook */
    const url = "http://sisfo-app.test/storage/files/file_rab_1691977428.xlsx";
    const file = await (await fetch(url)).arrayBuffer();
    const workbook = XLSX.read(file);
  
    /* display sheet names */
    names.value = workbook.SheetNames;
  
    /* get first sheet */
    const firstSheetName = workbook.SheetNames[0];
    const worksheet = workbook.Sheets[firstSheetName];
  
    /* convert worksheet to JSON */
    data.value = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
  
    /* extract headers from the first row */
    headers.value = data.value[0];
  
    /* remove the headers row from data */
    data.value = data.value.slice(1);
  });
  </script>
  