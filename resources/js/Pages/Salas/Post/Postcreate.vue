<script setup>
    import { useForm } from '@inertiajs/vue3';
    import InputLabel from '../../../Components/InputLabel.vue';
    import TextInput from '../../../Components/TextInput.vue';
    import TextAreacomp from '../../../Components/TextAreacomp.vue';    
    
    defineProps({
    });

    const form = useForm({
        name: '',
        body:'',
        pkey1:'',
        pkey2:'',
        discusion:''
    })

    let submit = ()=>{
        form.post('/post/create')
    }
</script>

<template>
    <form @submit.prevent="submit" clase="max-w-md mx-auto">
        <InputLabel for="name" value="Nombre del Post" class="mt-4"/>
        <TextInput
          v-model="form.name"
          class="border border-gray-400 p-2 w-full"
          type="text"
          name="name"
          id="name"
          required
          autocomplete="Nombre del Post"
        />
        
        <InputLabel for="body" value="Esciba su Post" />
        <TextAreacomp
          v-model="form.body"
          class="border border-gray-400 p-2 w-full"
          type="text"
          name="body"
          id="body"
          required
        ></TextAreacomp>
        <InputLabel for="pkey1" value="Palabra clave 1" />
        <TextInput
          v-model="form.pkey1"
          class="border border-gray-400 p-2 w-full"
          type="text"
          name="pkey1"
          id="pkey1"
          required
          autocomplete="Palabra clave 1"
        />
        <InputLabel for="pkey2" value="Palabra clave 2" />
        <TextInput
          v-model="form.pkey2"
          class="border border-gray-400 p-2 w-full"
          type="text"
          name="pkey2"
          id="pkey2"
          required
          autocomplete="Palabra clave 2"
        />
        <InputLabel for="disucion" value="¿Desea abrir una discusión acerca del post?" />

        <select name="discusion" id="discusion" v-model="form.discusion">
                <option value="0">Mostrar discusion</option>
                <option value="1">No mostrar discusion</option>
            </select>
        <button class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500" 
                type="submit"
                :disabled="form.processing"
                >
            Publica un nuevo Post
        </button>
    </form>
</template>