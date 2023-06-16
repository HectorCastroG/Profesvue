<script setup>
    import {Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    import TextAreacomp from '../../Components/TextAreacomp.vue';
    import { computed } from 'vue';
    
    const props =  defineProps({
        clase: Object,
        contenido: Array,
        contenidos: Array
    });

    let form = useForm({
        _method: 'PUT',
        title: props.clase.title,
        body: props.clase.body,
        pkey1: props.clase.pkey1,
        pkey2: props.clase.pkey2,
        pkey3: props.clase.pkey3,
        contenido: props.clase.contenido,
        summary: props.clase.summary,
        asignatura:props.contenido.signature,
        eje: props.contenido.eje,
        contenido:props.contenido.content
    });

    let submit = () => {
        form.post('/clase/editar/'+props.clase.id );
    }

    let signatures = Object.entries(props.contenidos); // lista de todas las signatures

    let ejes = computed(() => {
      let selectedSignature = signatures.find(key => key[0] === form.asignatura);
      return form.asignatura ? (selectedSignature ? selectedSignature[1] : []) : [];
    });

    let cont = computed(() => {
      let selectedEje = form.eje ? Object.entries(ejes.value).find(eje => eje[0] === form.eje) : [''];
      return selectedEje[1] ? selectedEje[1] : [];
    });

    let asignaturas = computed(() => {
      return Object.keys(props.contenidos);
    });

    let updateEjes = () => {
      form.eje = '';
      form.contenido = '';
    };

    let updateContenidos = () => {
      form.contenido = '';
    };

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

                <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
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

                    
                    <InputLabel for="summary" value="Resumen"/>
                
                    <TextAreacomp
                        v-model="form.summary"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="summary"
                        id="summary"


                        required>

                        {{ clase.summary }}
                    </TextAreacomp>

                    <InputLabel for="pkey1" value="pkey1"/>
                
                    <TextInput  v-model="form.pkey1" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="pkey1"
                        id="pkey1"
                        required
                    />

                    <InputLabel for="pkey2" value="pkey2"/>
                
                    <TextInput  v-model="form.pkey2" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="pkey2"
                        id="pkey2"
                        required
                        autocomplete="Palabra clave 2"

                    />

                    <InputLabel for="pkey3" value="pkey3"/>
                
                    <TextInput  v-model="form.pkey3" 
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="pkey3"
                        id="pkey3"
                        required

                    />
                    <select name="asignatura" id="asignatura" v-model="form.asignatura" @change="updateEjes">
                        <option v-for="asignatura in asignaturas" :value="asignatura" :key="asignatura">
                          {{ asignatura }}
                        </option>
                    </select>
                  
                    <select name="eje" id="eje" v-model="form.eje" @change="updateContenidos">
                        <option v-for="(eje, index) in ejes" :value="index" :key="index">
                          {{ index }}
                        </option>
                    </select>
                  
                    <select name="contenido" id="contenido" v-model="form.contenido">
                        <option v-for="(con, index) in cont" :value="con" :key="index">
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