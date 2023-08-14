<template>
    <div class="flex justify-between">

        <div style="text-align: left" class="">
          <label>Search : </label><input class="text-sm border-2 py-1 rounded-md border-blue-400 mb-2" v-model="searchTerm" />
        </div>
        <div style="text-align: right">
          <!-- <NavLinkSidebar :href="route('unitkerja.create')" :active="false" >
            
            <button class="bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-700 active:bg-blue-300 text-white mb-3">Tambah <font-awesome-icon :icon="icons.plus" class="text-white-100/50 " />  </button> 
         
          </NavLinkSidebar> -->
          <ActionButton @open-detail-modal="openModal" type="add" >
            <template #icons>
                <button class="bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-700 active:bg-blue-300 text-white mb-3">Tambah <font-awesome-icon :icon="icons.plus" class="text-white-100/50 " />  </button> 
                
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
        <ActionButton :row="data.value.id" @open-detail-modal="openModalId" type="detail" >
            <template #icons>
             <font-awesome-icon :icon="icons.eye" size="1x"  class="text-blue-500"/>
            </template>
        </ActionButton>

        <ActionButton :row="data.value.id" @open-detail-modal="openModalId" type="edit" >
          <template #icons>
           <font-awesome-icon :icon="icons.edit" size="1x"  class="text-green-500 ml-2"/>
          </template>
        </ActionButton>

        <ActionButton :row="data.value.id" @open-detail-modal="openModalId" type="delete" >
          <template #icons>
           <font-awesome-icon :icon="icons.trash" size="1x"  class="text-red-500 ml-2"/>
          </template>
        </ActionButton>
    </template>
  
  </table-lite>

    <Modal :show="showModal" maxWidth="3xl"  @close="closeModal">
    
      <template #isiModal>
          
      
        <CardUnitKerjaAdd
        v-if="selectedTypeModal === 'add'"
        />

        
      </template>
    
    </Modal>
  </template>
  
  <script setup>
  import { ref, reactive, computed,onMounted } from "vue";
  import TableLite from "@/Components/TableLite.vue";
  import Modal from "@/Components/Modal.vue";
  import NavLinkSidebar from "@/Components/NavLinkSidebar.vue";
  import { useStore } from 'vuex';
  import CardUnitKerjaAdd from "@/Fragments/Card/UnitKerja/CardUnitKerjaAdd.vue";
  import ActionButton from "@/Components/Table/Additional/ActionButton.vue";
  
  import { faBars, faTimes,faEye,faDashboard,faEdit,faPlusCircle,faLayerGroup,faUserGear,faMoneyCheck,faCog,faTrash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const icons = {
  bars: faBars,
  times: faTimes,
  eye: faEye,
  dashboard: faDashboard,
  edit:faEdit,
  plus:faPlusCircle,
  layergroup:faLayerGroup,
  usergear:faUserGear,
  money:faMoneyCheck,
  cog:faCog,
  trash:faTrash
};
const store = useStore();

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

 const openModalId = (UnitkerjaId,type) => {

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
        label: "Unit Kerja",
        field: "unit_kerja",
        width: "10%",
        sortable: true,
      },
      {
        label: "Pagu",
        field: "pagu",
        width: "15%",
        sortable: true,
      },
      {
        label: "Action",
        sortable: true,
        field: "status",
        width: "10%",
        columnClasses: ["text-center"],
        headerStyles: { background: "gray" },
        HeaderClasses: ["text-tengah"]
    
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
  <style scoped>
  .text-tengah{
   text-align:center;
  }
  </style>