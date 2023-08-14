<template>
    <Head title="Detail Kegiatan"></Head>
   
    <FormWizard ref="formWizard" @on-complete="onComplete" :step-size="computedStepSize" :activate-all="isActive.value"  
        color="#094899" :start-index="0"  finish-button-text="Update" >
    
      <TabContent title="Data Kegiatan" icon="fa fa-user">
        
     
        <div class="w md:w-2/3 sm:w-full mx-auto">
            <InputLabel
              :class="labelClass('nama_pengusul')"
              value="Nama Pengusul"
            />
            <input type="hidden" id="users_id"  v-model="form.users_id" />
            <TextInput
              id="nama_pengusul"
              v-model="form.nama_pengusul"
              :class="inputClass('nama_pengusul')"
              type="text"
              readonly 
              disabled
              class="mt-1 bg-slate-300 cursor-not-allowed py-1 block w-full mx-auto md:w-2/3 sm:w-full"
              @focus="setFocused('nama_pengusul', true)"
              @blur="setFocused('nama_pengusul', false)"
              autocomplete="nama_pengusul"
            />
            <InputError class="mt-2" :message="form.errors.nama_pengusul" />
        </div>

        <div class="flex justify-center mt-4 w-full md:w-2/3 sm:w-full mx-auto">
            <div class="mt-4 w-1/3 mr-5">
                <InputLabel
                 :class="labelClass('kode_mak')"
                    value="Kode Mak"
                    />
                    <TextInput
                     id="kode_mak"
                    v-model="form.kode_mak"
                    :class="inputClass('kode_mak')"
                    type="text"
                    readonly
                    class=" block w-full bg-slate-300 mx-auto md:w-full sm:w-full"
                    autocomplete="Kode Mak"
                    @focus="setFocused('kode_mak', true)"
                     @blur="setFocused('kode_mak', false)"
                    />
                <InputError class="mt-2" :message="form.errors.kode_mak" />
            </div>
            <div class="mt-4 w-2/3">
                <InputLabel
                 :class="labelClass('pjk')"
                    value="Penanggung Jawab Kegiatan"
                    />
                    <TextInput
                     id="pjk"
                    v-model="form.pjk"
                    :class="inputClass('pjk')"
                    type="text"
                    readonly
                    class=" block w-full bg-slate-300 mx-auto md:w-full sm:w-full"
                    autocomplete="pjk"
                    @focus="setFocused('pjk', true)"
                    @blur="setFocused('pjk', false)"
                    />
                <InputError class="mt-2" :message="form.errors.pjk" />
            </div>
        </div>
        <div class="w md:w-2/3 sm:w-full mx-auto mt-4">
          <InputLabel
            :class="labelClass('nama_pengajuan')"
            value="Nama Kegiatan"
          />
          <TextInput
            id="nama_pengajuan"
            v-model="form.nama_pengajuan"
            :class="inputClass('nama_pengajuan')"
            type="text"
            readonly
            class="mt-1 py-3 block bg-slate-300 w-full mx-auto md:w-2/3 sm:w-full"
            @focus="setFocused('nama_pengajuan', true)"
            @blur="setFocused('nama_pengajuan', false)"
            autocomplete="nama_pengajuan"
          />
          <InputError class="mt-2" :message="form.errors.nama_pengajuan" />
       </div>
       
       <div class="flex justify-center mt-4 w-full md:w-2/3 sm:w-full mx-auto">
        <div class="mt-4 w-1/3 mr-5">
            <InputLabel
             :class="labelClass('lokasi')"
                value="lokasi"
                />
                <TextInput
                 id="lokasi"
                v-model="form.lokasi"
                :class="inputClass('lokasi')"
                type="text"
                readonly
                class=" block w-full bg-slate-300 mx-auto md:w-full sm:w-full"
                 autocomplete="lokasi"
                @focus="setFocused('lokasi', true)"
                 @blur="setFocused('lokasi', false)"
                />
            <InputError class="mt-2" :message="form.errors.lokasi" />
        </div>
        <div class="mt-4 w-1/3 mr-4">
            <InputLabel
             :class="labelClass('tanggal_pelaksanaan')"
                value="Tanggal Pelaksanaan"
                />
                <TextInput
                 id="tanggal_pelaksanaan"
                v-model="form.tanggal_pelaksanaan"
                :class="inputClass('tanggal_pelaksanaan')"
                type="date"
                readonly
                class=" block w-full bg-slate-300 mx-auto md:w-full sm:w-full"
       
                autocomplete="tanggal_pelaksanaan"
                @focus="setFocused('tanggal_pelaksanaan', true)"
                @blur="setFocused('tanggal_pelaksanaan', false)"
                />
            <InputError class="mt-2" :message="form.errors.tanggal_pelaksanaan" />
        </div>
        <div class="mt-4 w-1/3">
          <InputLabel
           :class="labelClass('tanggal_selesai')"
              value="Tanggal Selesai"
              />
              <TextInput
               id="tanggal_selesai"
              v-model="form.tanggal_selesai"
              :class="inputClass('tanggal_selesai')"
              type="date"
              readonly
              class=" block w-full bg-slate-300 mx-auto md:w-full sm:w-full"
              autocomplete="tanggal_selesai"
              @focus="setFocused('tanggal_selesai', true)"
              @blur="setFocused('tanggal_selesai', false)"
              />
          <InputError class="mt-2" :message="form.errors.tanggal_selesai" />
      </div>
    </div>
     

      </TabContent>
      <TabContent title="Output Kegiatan" icon="fa fa-gear" >
        <div class="w md:w-2/3 sm:w-full mx-auto">
          <InputLabel
            :class="labelClass('output')"
            value="Output Kegiatan"
          />
          <TextInput
            id="output"
            v-model="form.output"
            :class="inputClass('output')"
            type="text"
            readonly
            class="mt-1 py-2 bg-slate-300 block w-full mx-auto md:w-2/3 sm:w-full"
            @focus="setFocused('output', true)"
            @blur="setFocused('output', false)"
            autocomplete="output"
          />
          <InputError class="mt-2" :message="form.errors.output" />
      </div>

      <div class="flex justify-center mt-4 w-full md:w-2/3 sm:w-full mx-auto">
          <div class="mt-4 w-1/2 mr-5">
              <InputLabel
               :class="labelClass('pagu')"
                  value="Jumlah Anggaran / Realisasi"
                  />
                  <TextInput
                   id="pagu"
                  v-model="form.pagu"
                  :class="inputClass('pagu')"
                  type="text"
                  class=" block bg-slate-300 w-full mx-auto md:w-full sm:w-full"
                  autocomplete="pagu"
                  readonly
                  @focus="setFocused('pagu', true)"
                   @blur="setFocused('pagu', false)"
                  />
              <InputError class="mt-2" :message="form.errors.pagu" />
          </div>
          <div class="mt-4 w-1/2">
              <InputLabel
               :class="labelClass('limit_pagu')"
                  value="Pagu Limit"
                  />
                  <TextInput
                   id="limit_pagu"
                  v-model="form.limit_pagu"
                  :class="inputClass('limit_pagu')"
                  type="text"
                  class=" block w-full mx-auto md:w-full sm:w-full bg-slate-200"
                  readonly
                  autocomplete="limit_pagu"
                  @focus="setFocused('limit_pagu', true)"
                  @blur="setFocused('limit_pagu', false)"
                  />
              <InputError class="mt-2" :message="form.errors.limit_pagu" />
          </div>
      </div>
      <div class="w md:w-2/3 sm:w-full mx-auto mt-4">
        <InputLabel
          :class="labelClass('iku')"
          value="IKU"
        />

        <Multiselect
      v-model="form.iku_id"
      placeholder="Pilih data iku "
      label="name"
      trackBy="name"
      readonly
      :options="options"
      :searchable="true"
    >
      <template v-slot:singleLabel="{ value }">
        <div class="multiselect-single-label">
          <img height="26" style="margin: 0 6px 0 0;" :src="value.icon"> {{ value.name }}
        </div>
      </template>

      <template v-slot:option="{ option }">
        <img height="22" style="margin: 0 6px 0 0;" :src="option.icon">{{ option.name }}
      </template>
    </Multiselect>
        <InputError class="mt-2" :message="form.errors.iku_id" />
     </div>
     
  
      </TabContent>
      <TabContent title="File Kegiatan" icon="fa fa-file-import">
        <div class="flex justify-center mt-5 w-full text-center  sm:w-full mx-auto">
          <div class="mt-4 w-1/2 mr-5">
            <InputLabel
            :class="labelClass('file_tor')"
               value="File TOR"
               />
            <iframe :src="pdfUrl" width="100%" height="600px" v-if="isShow"></iframe>
            <button class="mx-auto mt-4 p-2 text-white rounded-md bg-blue-500 shadow-lg shadow-blue-500/50" v-if="!isShow">Download</button>
          </div>
          <div class="mt-4 w-1/2">
              <InputLabel
               :class="labelClass('file_rab')"
                  value="File RAB"
                  />
                  <TextInput
                   id="file_rab"
                   @input="form.file_rab = $event.target.files[0]"
                  :class="inputClass('file_rab')"
                  type="file"
                  readonly
                  class=" block w-full mx-auto md:w-full sm:w-full"
                  autocomplete="file_rab"
                  @focus="setFocused('file_rab', true)"
                  @blur="setFocused('file_rab', false)"
                  
                  />
                  <InputError class="mt-2" :message="form.errors.file_rab" />
                  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                  </progress>
                
           
          </div>
      </div>
      </TabContent>
      
      <template v-slot:footer="props">
        <div class="wizard-footer-left">
          <button
            type="submit"
            v-if="props.activeTabIndex > 0 && !props.isLastStep"
            :style="props.fillButtonStyle"
            @click.native="props.prevTab()"
            class="wizard-button p-2 rounded-md"
          >
            Form Sebelumnya
          </button>
        </div>
        <div class="wizard-footer-right">
          <button
          type="submit"
            v-if="!props.isLastStep"
            @click.native="props.nextTab()"
            class="wizard-button p-2 rounded-md"
            :style="props.fillButtonStyle"
          >
            Selanjutnya
          </button>
  
          <PrimaryButton
            v-else
           
            type="button"
            :disabled="form.processing"
            :class="{ 'opacity-25': form.processing }"
            class="finish-button p-2 rounded-md"
            :style="props.fillButtonStyle"
            @click.native="onComplete"
          >
          
            {{ isShow ? "Tutup File" : "Lihat File" }}
          </PrimaryButton>
        </div>
      </template>
      <div class="loader" v-if="loadingWizard"></div>
      
    </FormWizard>



    
  </template>
  
  <script setup>
  import { computed,onMounted,ref,reactive,defineProps} from 'vue';
  import { FormWizard, TabContent } from "vue3-form-wizard";
  import "vue3-form-wizard/dist/style.css";
  import { Head, useForm,Link,router,usePage} from '@inertiajs/vue3';
  import TextInput from '@/Components/TextInput.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import Multiselect from '@vueform/multiselect'
  

  const { props } = defineProps({ 
  errors: Object,
  iku:Array,
  initialData:Array,
  
 })
 const page = usePage();

  const value = ref([]);
  const isActive = ref(true);
  const formWizard = ref(null);
  const isFocused = ref(false);
    const detailData = ref(page.props.detail[0]);
    const pdfUrl = `/storage/files/${detailData.value.file_tor}`;
    const isShow = ref(false);
    const focusedField = ref('');

  const FormatRupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }
onMounted(() => {
  formWizard.value.activateAll();
  
});
 const  options = [
          { value: '1', name: 'Captain America'},
          { value: '2', name: 'Spiderman'},
          { value: '3', name: 'Iron Man' },
        ];


const setFocused = (field, value) => {
  isFocused.value = value;
  focusedField.value = field;
};
const loadingWizard = ref(false);

const labelClass = (field) => {
  return {
    'text-center text-slate-600 capitalize ml-1': !isFocused.value || focusedField.value !== field,
    'text-center text-black underline underline-offset-4 decoration-blue-500 capitalize': isFocused.value && focusedField.value === field,
  };
};

const inputClass = (field) => {
  return {
    'mt-1 py-1 block w-full': true,
    'mx-auto w md:w-full sm:w-full': true, // Atur kelas lain jika diperlukan
    // ... kelas lain yang diperlukan ...
  };
};


  const computedStepSize = computed(() => {
  const screenWidth = window.innerWidth;
  if (screenWidth <= 540) { // Ubah angka 640 sesuai kebutuhan
    return 'xs'; // Step size untuk tampilan kecil
  } else {
    return 'md'; // Step size untuk tampilan besar
  }
});


 
const onComplete = () =>{

    isShow.value = !isShow.value;
}


 

  const form = useForm({
    // Menggunakan ref untuk mengubah input dan masih memuat data awal dari Vuex saat komponen dimuat
    nama_pengusul: page.props.auth.user.name,
    users_id:page.props.auth.user.id,
    iku_id: '',
    kode_mak: detailData.value.kode_mak,
    pjk: detailData.value.pjk,
    nama_pengajuan:detailData.value.nama_pengajuan,
    lokasi:detailData.value.lokasi,
    pagu: FormatRupiah(detailData.value.pagu),
    output:detailData.value.output,
    file_tor: '',
    file_rab: '',
    tanggal_pelaksanaan: detailData.value.tanggal_pelaksanaan,
    tanggal_selesai: detailData.value.tanggal_selesai,
    jam_pelaksanaan:'',

});



  </script>
  <style src="@vueform/multiselect/themes/default.css"></style>
  <style>
  @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css");

  .loader,
.loader:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
.loader {
  margin: 60px auto;
  font-size: 10px;
  position: relative;
  text-indent: -9999em;
  border-top: 1.1em solid rgba(255, 255, 255, 0.2);
  border-right: 1.1em solid rgba(255, 255, 255, 0.2);
  border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
  border-left: 1.1em solid #e74c3c;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

  </style>
  