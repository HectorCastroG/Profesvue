<script setup>
  import {defineProps, reactive} from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import InputLabel from '../../Components/InputLabel.vue';
  import TextInput from '../../Components/TextInput.vue';
  import AppLayout from '../../Layouts/AppLayout.vue';
  import Body from '../../Components/Body.vue';
  import Title from '../../Components/Title.vue';
  import { ElCheckbox, ElCheckboxGroup, ElPopover,ElMessageBox} from 'element-plus';
  import Calendario from './Calendario.vue';
  import { Link } from '@inertiajs/vue3';
  
  const props = defineProps({
          sesion: Array,
          clases: Array,
          errors: Object
  
      });
    
  let form = useForm({
      fecha:'',
      horainicio:'',
      horacierre:'',
      checkedClases: []
  
  });
  
  
  
  
  let submit = async () => {
    try {
      const response = await form.post('/sesion/crear');
    
      if (Object.keys(props.errors).length === 0) {
        alert('Sesión creada');
      }
    } catch (error) {
      console.error(error);
    } 
  };
</script>

<template>
  <AppLayout title="Calendario">
    <template #header>
      <Title>Calendario</Title>
    </template>

    <Body>
      <Calendario :sesion="sesion" :clases="clases" />

      <div class="mt-7">
        ¿Desea agregar una nueva sesión?
        <div class="border border-gray-400 p-2 text-gray-600 text-xl mb-6 sm:rounded-lg">
          <form @submit.prevent="submit" class="max-w mx-auto mt-8">
            <InputLabel for="fecha" value="Fecha" />

            <TextInput
              v-model="form.fecha"
              class="border border-gray-400 p-2 w-full"
              type="date"
              name="fecha"
              id="fecha"
              required
              autocomplete="Fecha"
            />

            <InputLabel for="horainicio" value="Hora de Inicio" />

            <TextInput
              v-model="form.horainicio"
              class="border border-gray-400 p-2 w-full"
              type="time"
              name="horainicio"
              id="horainicio"
              required
              autocomplete="Hora de Inicio"
            />

            <InputLabel for="horacierre" value="Hora de finalización de la clase" />

            <TextInput
              v-model="form.horacierre"
              class="border border-gray-400 p-2 w-full"
              type="time"
              name="horacierre"
              id="horacierre"
              required
              autocomplete="Hora de Cierre"
            />

            <el-checkbox-group v-model="form.checkedClases">
              <table class="text-xs">
                <tr v-for="clase in props.clases" :key="clase.id">
                  <td>
                    <el-checkbox :label="clase.id">{{ clase.title }}</el-checkbox>
                  </td>
                  <td>
                    <el-popover trigger="click" placement="left">
                      <p class="bg-white border border-black rounded px-4 py-2">{{ clase.summary }}</p>

                      <template #reference>
                        <span class="popover-trigger underline cursor-pointer">Descripción</span>
                      </template>
                    </el-popover>
                  </td>
                </tr>
              </table>
            </el-checkbox-group>

            <button
              class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500"
              type="submit"
              :disabled="form.processing"
            >
              Agregar sesión
            </button>

            {{ form.checkedClases }}
          </form>
        </div>
      </div>

      <template v-if="props.errors =! null">
        <div class="text-red-500">
          <ul>
            <li v-for="error in props.errors" >
              {{ error }}
            </li>
          </ul>
        </div>
      </template>

      <table class="text-xs border-gray-300 border w-full">

        <tr class="border-gray-200 border p-2 bg-slate-200 w-full">
          <th class="border border-gray-500 w-1/6">Fecha</th>
          <th class="border border-gray-500 w-1/6">Hora Inicio</th>
          <th class="border border-gray-500 w-1/6">Hora Cierre</th>
          <th class="border border-gray-500">Clases</th>
          <th class="border border-gray-500 w-1/12">crud</th>
        </tr>
        <tr v-for="sesion in props.sesion" :key="sesion.id" class="border border-gray-100">
          <td class="border border-gray-200">
            {{ sesion.fecha }}
          </td>
          <td class="border border-gray-200">
              {{sesion.horainicio}}
          </td> 
          <td class="border border-gray-200">
              {{sesion.horacierre}}
          </td> 
          <td class="border border-gray-200">
            <table class="w-full">
              <tr class="border border-gray-200  ">
              <th class="border w-1/4">Titulo</th>
              <th class="border">Resumen</th>
            </tr>
            <tr v-for="clase in sesion.clase" class="border border-gray-100">
              <td class="border">{{ clase.title }}</td>
              <td class="border">{{ clase.summary }}</td>
            </tr> 
            </table>
              
          </td>
          <td>
                
            <Link 
              :href="'/editarsesion/'+sesion.id"
              as="button" 
              type="button"
              class="rounded-sm bg-slate-50 border border-slate-400 p-1 mr-1">editar</Link>
            <Link 
              :href="'/deletesesion/'+sesion.id" 
              as="button" 
              type="button" 
              method="delete" 
              :data="{sesion: sesion.id}"
              class="rounded-sm bg-slate-50 border border-slate-400 p-1 "
            >
              Borrar
            </Link>
          </td>
        </tr>
      </table>
    </Body>
  </AppLayout>
</template>

