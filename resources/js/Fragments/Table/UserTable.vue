<template>
    <div style="text-align: left">
      <label>Search : </label><input class="text-sm border-2 py-1 rounded-md border-blue-400 mb-2" v-model="searchTerm" />
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
        <ActionButton :row="data.value.id" @open-detail-modal="openModal" type="detail" >
            <template #icons>
             <font-awesome-icon :icon="icons.eye" size="1x"  class="text-blue-500"/>
            </template>
        </ActionButton>

        <ActionButton :row="data.value.id" @open-detail-modal="openModal" type="edit" >
          <template #icons>
           <font-awesome-icon :icon="icons.edit" size="1x"  class="text-green-500 ml-2"/>
          </template>
        </ActionButton>

        <ActionButton :row="data.value.id" @open-detail-modal="openModal" type="delete" >
          <template #icons>
           <font-awesome-icon :icon="icons.trash" size="1x"  class="text-red-500 ml-2"/>
          </template>
        </ActionButton>
    </template>
  
  </table-lite>

    <Modal :show="showModal" maxWidth="3xl"  @close="closeModal">
    
      <template #isiModal>
          
        <CardUserDetail
        v-if="selectedTypeModal === 'detail'"
        />

        <CardUserEdit
        v-if="selectedTypeModal === 'edit'"
        />
        
      </template>
    
    </Modal>
  </template>
  
  <script setup>
  import { ref, reactive, computed,onMounted } from "vue";
  import TableLite from "@/Components/TableLite.vue";
  import Modal from "@/Components/Modal.vue";
  import { useStore } from 'vuex';
  import CardUserDetail from "@/Fragments/Card/User/CardUserDetail.vue";
  import CardUserEdit from "@/Fragments/Card/User/CardUserEdit.vue";
  import ActionButton from "@/Components/Table/Additional/ActionButton.vue";
  import { faBars, faTimes,faEye,faDashboard,faEdit,faClipboard,faLayerGroup,faUserGear,faMoneyCheck,faCog,faTrash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const icons = {
  bars: faBars,
  times: faTimes,
  eye: faEye,
  dashboard: faDashboard,
  edit:faEdit,
  clipboard:faClipboard,
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




 const openModal = (usersId,type) =>{

  store.commit('setUserId', usersId);
  store.dispatch('fetchUser', usersId);


  selectedTypeModal.value = type;
  showModal.value = true;

 }

 const closeModal = () =>{

  store.commit('setUserId', '0');
  store.commit('setUserData', 'loading');

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
        label: "Role",
        field: "role",
        width: "15%",
        sortable: true,
        display: function (row) {
            return (
              '<a href="#" data-id="' +
              row.id +
              '" class="is-rows-el name-btn">' +
              row.roles[0].name +
              "</a>"
            );
          },
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