<template>
  <div class="flex justify-between">

    <div style="text-align: left" class="">
      <label>Search : </label><input class="text-sm border-2 py-1 rounded-md border-blue-400 mb-2" v-model="searchTerm" />
    </div>
    <div style="text-align: right">
      <NavLinkSidebar :href="route('pengajuan.create')" :active="false" >
        
        <span class="bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-700 active:bg-blue-300 text-white">Tambah <font-awesome-icon :icon="icons.plus" class="text-blue-100/50 " />  </span> 
     
      </NavLinkSidebar>
    </div>

  </div>
    
    <table-lite
      :is-static-mode="true"
      :is-slot-mode="true"
      :columns="table.columns"
      :rows="filteredRows"
      :total="totalRecordCount"
      :sortable="table.sortable"

    >
    <template v-slot:uraian_kegiatan="data">
    
      <detail-tooltip-pengajuan :href="route('pengajuan.show',{ id: data.value.id })">
        <template #title>
         {{ data.value.nama_pengajuan}} 
        </template>
        <template #content>
          <h1><span class="fas fa-map-location-dot text-green-500"></span> {{ data.value.lokasi }}</h1>
          <h1><span class="fas fa-calendar-days text-orange-300"> </span> {{ data.value.tanggal_pelaksanaan }} / {{ data.value.tanggal_selesai }}</h1>
          <h1><span class="fas fa-lightbulb text-blue-300"> </span> {{ data.value.kode_mak }}</h1>
         </template>
      </detail-tooltip-pengajuan>
    </template>

    <template v-slot:status_pengajuan="data">
      <SpanStatus :nomor="data.value.status_pengajuan "/>
    </template>
  
  </table-lite>

    <Modal :show="showModal" maxWidth="3xl"  @close="closeModal">
    
      <template #isiModal>
          
        <CardPengajuanAdd
        v-if="selectedTypeModal === 'add'"
        />
        
      </template>
    
    </Modal>
  </template>
  
  <script setup>
  import { ref, reactive, computed,onMounted } from "vue";
  import TableLite from "@/Components/TableLite.vue";
  import Modal from "@/Components/Modal.vue";
  import { useStore } from 'vuex';
  import CardPengajuanAdd from "@/Fragments/Card/Pengajuan/CardPengajuanAdd.vue";
  import DetailTooltipPengajuan from "../Card/Pengajuan/DetailTooltip.vue";
  import { faBars, faTimes,faEye,faPlusCircle,faEdit,faClipboard,faLayerGroup,faUserGear,faMoneyCheck,faCog } from '@fortawesome/free-solid-svg-icons';
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
  import NavLinkSidebar from "@/Components/NavLinkSidebar.vue";
  import SpanStatus from "@/Fragments/Status/StatusPengajuan.vue";

const FormatRupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }


const icons = {
  bars: faBars,
  times: faTimes,
  eye: faEye,
  plus: faPlusCircle,
  edit:faEdit,
  clipboard:faClipboard,
  layergroup:faLayerGroup,
  usergear:faUserGear,
  money:faMoneyCheck,
  cog:faCog,
};

  const searchTerm = ref("");
  const showModal = ref(false);

  const selectedTypeModal = ref("");
   // Search text
  const props = defineProps({
  initialData: Array
  });




 const openModal = (type) =>{

  selectedTypeModal.value = type;
  showModal.value = true;

 }

 const closeModal = () =>{


  showModal.value = false;


}
  // Table config
  const table = reactive({
    columns: [
      {
        label: "ID",
        field: "id",
        width: "3%",
        HeaderClasses:["bg-slate-400"],
        sortable: true,
        isKey: true,
      },
      {
        label: "Nama Pengusul",
        field: "nama_pengusul",
        width: "10%",
        sortable: true,
        display:function(row){
          return row.users.name
        }
      },
      {
        label: "Uraian Kegiatan",
        field: "uraian_kegiatan",
        width: "25%",
        sortable: true,
     
      },
      {
        label: "Jumlah Anggaran",
        field: "pagu",
        width: "15%",
        sortable: true,
        display:function(row){
          return FormatRupiah(row.pagu);
        }
      },
      {
        label: "Reviewer",
        field: "reviewer",
        width: "15%",
        columnClasses:['text-center w-screen md:w-fit'],
        sortable: true,
        display:function(row){
          if(row.reviewer_id == null){
            return "<span class='bg-blue-500 p-1 text-xs rounded-md text-white cursor-text'>Tidak Ada Reviewer</span>";
          }else{
            return 1;
          }
        }
      },
      {
        label: "Status",
        field: "status_pengajuan",
        width: "15%",
        columnClasses:['text-center bg-slate-100'],
        sortable: true,
      }
    ],
    sortable: {
      order: "id",
      sort: "asc",
    },
  });
  
  const filteredRows = computed(() => {
    return props.initialData.filter(
      (x) =>
        x.nama_pengajuan ||
        x.nama_pengusul
    );
  });
  
  const totalRecordCount = computed(() => {
    return filteredRows.value.length;
  });
  </script>
  <style scoped>
  @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css");
  </style>