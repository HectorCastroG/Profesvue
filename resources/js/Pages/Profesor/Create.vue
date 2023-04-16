<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import InputLabel from '../../Components/InputLabel.vue';
    defineProps({
        signatures: Array
    });

    const form = useForm({
        signature: ''
    })

    let submit = ()=>{
        form.post('/profesor/create')
    }
</script>

<template>
    <AppLayout>
        
        <form @submit.prevent="submit" clase="max-w-md mx-auto mt-8">
            <InputLabel for="titulo" value="Titulo"/>
                <select name="signature" id="signature" v-model="form.signature">
                    <option value="1">Historia</option>
                    <option value="2">Matematica</option>
                    <option value="3">Ingles</option>
                    <option value="4">Química</option>
                    <option value="5">Fisica</option>
                    <option value="6">Biologia</option>
                </select>

                <button class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500" 
                        type="submit"
                        :disabled="form.processing"
                        >
                    Conviertete en profesor
                </button>
        </form>
    </AppLayout>
</template>