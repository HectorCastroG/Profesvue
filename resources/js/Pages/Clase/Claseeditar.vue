<script setup>
    import {Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    import TextAreacomp from '../../Components/TextAreacomp.vue';
    
    const props =  defineProps({
        clase: Object,
        signatures: Array
    });

    let form = useForm({
        _method: 'PUT',
        title: props.clase.title,
        body: props.clase.body,
        signature_id: props.clase.signature_id
    });

    let submit = () => {
        form.post('/clase/editar/'+props.clase.id );
    }

</script>

<template>
    <AppLayout title="Editar Clase">
        <template #header>

            <Title>
                Clase: {{ clase.title }}

            </Title>
            

        </template>
        <Body>
            <div 
                class="border border-gray-400 p-2 text-gray-600 text-xl mb-6 sm:rounded-lg">

                <form @submit.prevent="submit" clase="max-w-md mx-auto mt-8">
                    <InputLabel for="title" value="Titulo"/>
                
                    <TextInput  v-model="form.title" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="title"
                        id="title"
                        autocomplete="title"
                        required


                    />


                    <InputLabel for="body" value="Clase"/>
                
                    <TextAreacomp
                        v-model="form.body"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="body"
                        id="body"


                        required>

                        {{ clase.body }}
                    </TextAreacomp>

                    <select name="signature_id" id="signature_id" v-model="form.signature_id">
                    
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