<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    import TextAreacomp from '../../Components/TextAreacomp.vue';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    import {computed} from 'vue';
    const props = defineProps({
        contenidos: Array

    });

    let form = useForm({
        titulo:'',
        cuerpo:'',
        asignatura:'',
        summary:'',
        eje: '',
        pkey1: '',
        pkey2: '',
        pkey3: '',
        contenido:''
    });

    

    let submit = () => {
        form.post('/clase/crear');
    }
    let signatures = Object.entries(props.contenidos); // lista de todas las signatures
    let ejes = computed(()=>{

        let selectedSignature = signatures.find(key => key[0] === form.asignatura)
        return form.asignatura ? selectedSignature[1] : ''
    });

    let cont = computed(()=>{
        let selectedEje = form.eje ? Object.entries(ejes.value).find(eje => eje[0] === form.eje) : ['nada']
        return selectedEje[1] ? selectedEje[1] : ''
    });


 
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

                    <InputLabel for="pkey1" value="Palabra Clave:"/>
                
                    <TextInput  v-model="form.pkey1" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="pkey1"
                        id="pkey1"
                        required
                        autocomplete="Palabra clave"

                    />

                    <InputLabel for="pkey2" value="Palabra Clave:"/>
                
                    <TextInput  v-model="form.pkey2" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="pkey2"
                        id="pkey2"
                        required
                        autocomplete="Palabra clave"

                    />

                    <InputLabel for="pkey3" value="Palabra Clave:"/>
                
                    <TextInput  v-model="form.pkey3" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="pkey3"
                        id="pkey3"
                        required
                        autocomplete="Palabra clave"

                    />

                    <select name="asignatura" id="asignatura" v-model="form.asignatura" >
                    
                        <option v-for="(key, signature) in Object.entries(contenidos)" :value="key[0]">
                             {{ key[0] }}
                        </option>
                    

                    </select>

                    <select name="eje" id="eje" v-model="form.eje" >
                    
                        <option v-for="(key,eje) in Object.entries(ejes)" :value="key[0]">

                            {{ key[0] }}
                        </option>
                
                    </select>

                    <select name="contenido" id="contenido" v-model="form.contenido" >
                    
                    <option v-for="con in cont" :value="con">

                        {{ con }}
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