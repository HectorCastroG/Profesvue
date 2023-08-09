<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '../../Components/InputLabel.vue';
import TextInput from '../../Components/TextInput.vue';
import TextAreacomp from '../../Components/TextAreacomp.vue';
import Title from '@/Components/Title.vue';
import Body from '../../Components/Body.vue';
import { computed } from 'vue';

const props = defineProps({
  contenidos: Object,
});

let form = useForm({
  titulo: '',
  cuerpo: '',
  asignatura: '',
  summary: '',
  eje: '',
  presentacion: null,
  guia: null,
  pkey1: '',
  pkey2: '',
  pkey3: '',
  contenido: '',
});

const presentacionInput = ref(null);
const guiaInput = ref(null);

const submit = () => {
  if(presentacionInput.value){
    form.presentacion = presentacionInput.value.files[0]

  }
  if(guiaInput.value){
    form.guia = guiaInput.value.files[0]

  }
    form.post('/clase/crear');
};

const updatePresentacionPreview = () => {
  const presentacionFile = presentacionInput.value.files[0];

  if (!presentacionFile) return;

  // Realiza cualquier acción necesaria con el archivo seleccionado, como obtener una vista previa, validar el tipo y tamaño, etc.

  // Por ejemplo, para obtener una vista previa de la presentación y mostrarla en la interfaz, podrías hacer algo como esto:
  const reader = new FileReader();
  reader.onload = (e) => {
    form.presentacion = e.target.result; // Actualiza el valor de form.presentacion con la vista previa del archivo
  };
  reader.readAsDataURL(presentacionFile);
};

const updateGuiaPreview = () => {
  const guiaFile = guiaInput.value.files[0];

  if (!guiaFile) return;

  // Realiza cualquier acción necesaria con el archivo seleccionado, como obtener una vista previa, validar el tipo y tamaño, etc.

  // Por ejemplo, para obtener una vista previa de la presentación y mostrarla en la interfaz, podrías hacer algo como esto:
  const reader = new FileReader();
  reader.onload = (e) => {
    form.guia = e.target.result; // Actualiza el valor de form.presentacion con la vista previa del archivo
  };
  reader.readAsDataURL(guiaFile);
};


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
  <AppLayout title="Clase">
    <template #header>
      <Title>Crear Clase:</Title>
    </template>
    <Body>
      {{ form.presentacion }}


      <div class="border border-gray-400 p-2 text-gray-600 text-xl mb-6 sm:rounded-lg">
        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
          <InputLabel for="titulo" value="Título" />
          <TextInput
            v-model="form.titulo"
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="titulo"
            id="titulo"
            required
            autocomplete="Titulo"
          />

          <InputLabel for="cuerpo" value="Descripcion de la clase" />
          <TextAreacomp
            v-model="form.cuerpo"
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="cuerpo"
            id="cuerpo"
            required
          ></TextAreacomp>

          <InputLabel for="summary" value="Resumen" />
          <TextAreacomp
            v-model="form.summary"
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="summary"
            id="summary"
            required
          ></TextAreacomp>

          <InputLabel for="pkey1" value="Palabra Clave:" />
          <TextInput
            v-model="form.pkey1"
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="pkey1"
            id="pkey1"
            required
            autocomplete="Palabra clave"
          />

          <InputLabel for="pkey2" value="Palabra Clave:" />
          <TextInput
            v-model="form.pkey2"
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="pkey2"
            id="pkey2"
            required
            autocomplete="Palabra clave"
          />

          <InputLabel for="pkey3" value="Palabra Clave:" />
          <TextInput
            v-model="form.pkey3"
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="pkey3"
            id="pkey3"
            required
            autocomplete="Palabra clave"
          />

          <InputLabel for="presentacion" value="Presentación:" />
          <Input
            class="border border-gray-400 p-2 w-full"
            ref="presentacionInput"
            type="file"
            name="presentacion"
            id="presentacion"
            required
            autocomplete="presentacion"
            @change="updatePresentacionPreview"

          />

          <InputLabel for="guia" value="Guía:" />

          <Input
            class="border border-gray-400 p-2 w-full"
            ref="guiaInput"
            type="file"
            name="guia"
            id="guia"
            required
            autocomplete="guia"
            @change="updateGuiaPreview"

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

          <button
            class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500"
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
