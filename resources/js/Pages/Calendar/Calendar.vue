<script setup>
import {defineProps} from 'vue';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '../../Components/InputLabel.vue';
import TextInput from '../../Components/TextInput.vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import Body from '../../Components/Body.vue';
import Title from '../../Components/Title.vue';
import { ElCheckbox, ElCheckboxGroup, ElPopover} from 'element-plus';
import Calendario from './Calendario.vue';

const props = defineProps({
        sesion: Array,
        clases: Array

    });

let form = useForm({
    fecha:'',
    horainicio:'',
    horacierre:'',
    checkedClases: []

});


let submit = () => {
        form.post('/sesion/crear');
    }


</script>

<template>
  <AppLayout title="Calendario">
    <template #header>
      <Title>Calendario</Title>
    </template>

    <Body>

      <Calendario :sesion="sesion" :clases="clases"/>

      <div class="mt-7 ">
          ¿Desea agregar una nueva sesión?
          <div class="border border-gray-400 p-2 text-gray-600 text-xl mb-6 sm:rounded-lg">
                <form @submit.prevent="submit" class="max-w mx-auto mt-8">
                    <InputLabel for="fecha" value="Fecha"/>
                
                    <TextInput  v-model="form.fecha" 
                        class="border border-gray-400 p-2 w-full"
                        type="date"
                        name="fecha"
                        id="fecha"
                        required
                        autocomplete="Fecha"

                    />

                    <InputLabel for="horainicio" value="Hora de Inicio"/>
                
                    <TextInput  v-model="form.horainicio" 
                        class="border border-gray-400 p-2 w-full"
                        type="time"
                        name="horainicio"
                        id="horainicio"
                        required
                        autocomplete="Hora de Inicio"

                    />

                    <InputLabel for="horainicio" value="Hora de finalización de la clase"/>
                
                    <TextInput  v-model="form.horacierre" 
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
                            <el-checkbox  :label="clase.id">
                              {{ clase.title }}
                            </el-checkbox>
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


                    <button class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500" 
                        type="submit"
                        :disabled="form.processing"
                        >
                        Agregar sesión
                    </button>

                    {{ form.checkedClases }}


                </form>
            </div>
        </div>
    </Body>
  </AppLayout>
</template>

