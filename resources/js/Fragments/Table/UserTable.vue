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
        <ActionButton :row="data.value.id" @open-detail-modal="openModal"  />
    </template>
  
  </table-lite>
    <Modal :show="showModal" maxWidth="2xl"  @close="closeModal">
    
      {{selectedUsersId}}
    
    </Modal>
  </template>
  
  <script setup>
  import { ref, reactive, computed,defineEmits } from "vue";
  import TableLite from "@/Components/TableLite.vue";
  import Modal from "@/Components/Modal.vue";
  import ActionButton from "@/Components/Table/Additional/ActionButton.vue";

  const searchTerm = ref("");

  const showModal = ref(false);

  const selectedUsersId = ref("");
   // Search text
  const props = defineProps({
  initialData: Array
});
 const openModal = (usersId) =>{

  selectedUsersId.value = usersId;
  showModal.value = true;

 }

 const closeModal = () =>{

selectedUsersId.value = 0;
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
  