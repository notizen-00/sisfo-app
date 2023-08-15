<script setup>

    import Card from '@/Components/Card.vue';
    import Button from '@/Components/Button.vue';
    import {usePage,Link} from '@inertiajs/vue3';
    import {ref,defineProps} from 'vue';


    const props = defineProps({
        id:Number
    })
    const PengajuanId = ref(props.id);
    
   

</script>
<template>
    <div>
        <Card class="mt-4">
            <template #card-header>
                Toolbar Action
            </template>
            <template #title>
                <h1>Toolbar Button</h1>
            </template>
            <template #card-body>
                <div class="flex justify-center">

                    <Button color="red" href="#" icon="fas fa-trash" classes="px-3 py-1 cursor-help">Hapus</Button>

                    <Button color="blue" :href="`/pengajuan/${PengajuanId}/edit`"  icon="fas fa-pencil" classes="px-3 py-1 ml-3">Edit</Button>

                    <Button color="green" href="#" icon="fas fa-search" classes="px-3 py-1 ml-3">Review</Button>
                  
                </div>
            </template>

        </Card>
    </div>
</template>