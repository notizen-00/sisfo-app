<template>
  <div class="flex inline-block justify-between">

    <div style="text-align: left" class="">
      <label>Search : </label><input class="text-sm border-2 py-1 rounded-md border-blue-400 mb-2" v-model="searchTerm" />
    </div>
    <div style="text-align: right">

      <ActionButton  @open-detail-modal="openModal" type="add" >
        <template #icons>
        <span class="bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-700 active:bg-blue-300 text-white">Tambah <font-awesome-icon :icon="icons.plus" class="text-blue-100/50 " />  </span> 
        </template>
      </ActionButton>
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
    <template v-slot:status="data">
      
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
  import FormPengajuanAdd from "@/Fragments/Forms/Pengajuan/FormPengajuanAdd.vue";
  import CardPengajuanAdd from "@/Fragments/Card/Pengajuan/CardPengajuanAdd.vue";
  import PrimaryButton from "@/Components/PrimaryButton.vue";
  import ActionButton from "@/Components/Table/Additional/ActionButton.vue";
  import { faBars, faTimes,faEye,faPlusCircle,faEdit,faClipboard,faLayerGroup,faUserGear,faMoneyCheck,faCog } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

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
      },
      {
        label: "Uraian Kegiatan",
        field: "uraian_kegiatan",
        width: "20%",
        sortable: true,
      },
      {
        label: "Jumlah Anggaran",
        field: "pagu",
        width: "15%",
        sortable: true,
      },
      {
        label: "Reviewer",
        field: "reviewer",
        width: "15%",
        sortable: true,
      },
      {
        label: "Status",
        field: "status_pengajuan",
        width: "15%",
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
        x.uraian_kegiatan.toLowerCase().includes(searchTerm.value.toLowerCase()) ||
        x.nama_pengusul.toLowerCase().includes(searchTerm.value.toLowerCase())
    );
  });
  
  const totalRecordCount = computed(() => {
    return filteredRows.value.length;
  });
  </script>
  