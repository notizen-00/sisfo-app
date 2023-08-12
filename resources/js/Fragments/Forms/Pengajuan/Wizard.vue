<template>
    <Head title="data Pengajkuan"></Head>
    <FormWizard @on-complete="onComplete" :step-size="computedStepSize" color="#094899" :start-index="0"  finish-button-text="Simpan" >
       
      <TabContent title="Data Kegiatan" icon="fa fa-user" :before-change="beforeTabSwitch">

        <div class="">
            <InputLabel
              :class="labelClass('username')"
              value="Nama Pengusul"
            />
            <TextInput
              id="username"
              v-model="form.username"
              :class="inputClass('username')"
              type="text"
              class="mt-1 py-1 block w-full mx-auto md:w-2/3 sm:w-full"
              required
              autofocus
              @focus="setFocused('username', true)"
              @blur="setFocused('username', false)"
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.username" />
        </div>

        <div class="flex justify-center w-full md:w-2/3 sm:w-full mx-auto">
            <div class="mt-4 w-1/3">
                <InputLabel
                 :class="labelClass('kode_mak')"
                    value="Kode Mak"
                    />
                    <TextInput
                     id="kode_mak"
                    v-model="form.kode_mak"
                    :class="inputClass('kode_mak')"
                    type="text"
                    class=" block w-full mx-auto md:w-full sm:w-full"
                    required
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
                    class=" block w-full mx-auto md:w-full sm:w-full"
                    required
                    autocomplete="pjk"
                    @focus="setFocused('pjk', true)"
                    @blur="setFocused('pjk', false)"
                    />
                <InputError class="mt-2" :message="form.errors.pjk" />
            </div>
        </div>
        <div class="mt-4">
            <InputLabel
              :class="labelClass('username')"
              value="Nama Pengusul"
            />
            <TextInput
              id="username"
              v-model="form.username"
              :class="inputClass('username')"
              type="text"
              class="mt-1 py-1 block w-full mx-auto md:w-2/3 sm:w-full"
              required
              autofocus
              @focus="setFocused('username', true)"
              @blur="setFocused('username', false)"
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.username" />
        </div>
     

      </TabContent>
      <TabContent title="Output Kegiatan" icon="fa fa-gear">
        My second tab content
      </TabContent>
      <TabContent title="File Kegiatan" icon="fa fa-file-import">
        Yuhuuu! This seems pretty damn simple
      </TabContent>
      
    </FormWizard>

    
  </template>
  
  <script setup>
  import { computed,onMounted,ref} from 'vue';
  import { FormWizard, TabContent } from "vue3-form-wizard";
  import "vue3-form-wizard/dist/style.css";
  import { Head, useForm } from '@inertiajs/vue3';
  import TextInput from '@/Components/TextInput.vue';
  import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

const isFocused = ref(false);
const focusedField = ref('');
const setFocused = (field, value) => {
  isFocused.value = value;
  focusedField.value = field;
};

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
  const onComplete = () => {
    
    form.transform(data => ({
        ...data,
    })).post(route('pengajuan.store'), {
        onFinish: () => form.reset(''),

    });
  }
  const computedStepSize = computed(() => {
  const screenWidth = window.innerWidth;
  if (screenWidth <= 540) { // Ubah angka 640 sesuai kebutuhan
    return 'xs'; // Step size untuk tampilan kecil
  } else {
    return 'md'; // Step size untuk tampilan besar
  }
});
 

onMounted(() => {
    
});
  
  const form = useForm({
    // Menggunakan ref untuk mengubah input dan masih memuat data awal dari Vuex saat komponen dimuat
    username: '',
    iku_id: '',
    kode_mak: '',
    pjk: '',
    nama_pengajuan:'',
    lokasi:'',
    pagu:'',
    output:'',
    file_tor: '',
    file_rab: '',
    tanggal_pelaksanaan: '',
    tanggal_selesai:'',
    jam_pelaksanaan:'',

});
  const beforeTabSwitch = () =>{
  
    return true;
  }
  </script>
  
  <style>
  @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css");
  </style>
  