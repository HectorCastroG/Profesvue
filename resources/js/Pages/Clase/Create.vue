<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    import TextAreacomp from '../../Components/TextAreacomp.vue';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    defineProps({
        signatures: Array

    });

    let form = useForm({
        titulo:'',
        cuerpo:'',
        signature_id:'',
        summary:''
    });

    let submit = () => {
        form.post('/clase/crear');
    }


</script>

<template>
    <AppLayout title="Clase">

        <template #header>
            <Title>
                Crear Clase:

            </Title>
        </template>

        <Body>
            <div class="border border-gray-400 p-2 text-gray-600 text-xl mb-6 sm:rounded-lg">
                <form @submit.prevent="submit" clase="max-w-md mx-auto mt-8">
                    <InputLabel for="titulo" value="Título"/>
                
                    <TextInput  v-model="form.titulo" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="titulo"
                        id="titulo"
                        required
                        autocomplete="Titulo"

                    />


                    <InputLabel for="cuerpo" value="Clase"/>
                
                    <TextAreacomp
                        v-model="form.cuerpo"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="cuerpo"
                        id="cuerpo"
                        required>
                    
                    </TextAreacomp>

                    <InputLabel for="summary" value="Resumen"/>


                    <TextAreacomp
                        v-model="form.summary"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="summary"
                        id="summary"
                        required>
                    
                    </TextAreacomp>

                    <select name="signature_id" id="signature_id" v-model="form.signature_id" >
                    
                        <option v-for="signature in signatures" :value="signature.id">
                            {{ signature.nombre }}
                        </option>
                    

                    </select>


                    <button class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500" 
                        type="submit"
                        :disabled="form.processing"
                        >
                        Finalizar
                    </button>
                </form>
            </div>
        </Body>

    </AppLayout>
</template>