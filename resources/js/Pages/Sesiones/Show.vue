<script setup>
    import {defineProps} from 'vue';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/Title.vue';
    import { ElCheckbox, ElCheckboxGroup, ElPopover} from 'element-plus';
    import { useForm } from '@inertiajs/vue3';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    
    const props = defineProps({
        sesion: Object,
        chckdclases: Array
    });
    let form = useForm({
      _method: 'PUT',
      fecha: props.sesion.fecha,
      horainicio:props.sesion.horainicio,
      horacierre:props.sesion.horacierre,
      checkedClases: props.chckdclases
  
  });

  let submit = () => {
        form.post('/sesion/editar/'+props.sesion.id );
    }


</script>

 <template>
    <AppLayout title="Editar Sesion">
        <template #header>
            <Title>
                <div class="flex justify-between">
                    Editar sesion:
                </div>
            </Title>

        </template>
    
        <Body>

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

            
              <div class="bg-slate-100 border border-gray-200 mb-2 mt-4 rounded-sm ">
                Clases
              </div>
              <el-checkbox-group v-model="form.checkedClases">
                <table class="text-xs border border-gray-200 w-full">
                    <tr class="border border-gray-100 bg-gray-50">
                        <th  class="border border-gray-100">Título</th>
                        <th  class="border border-gray-100">Resumen</th>
                        <th  class="border border-gray-100">Descripcion de la clase</th>
                        <th  class="border border-gray-100">Asignatura</th>
                        <th  class="border border-gray-100">Eje</th>
                        <th  class="border border-gray-100">Contenido</th>
                    </tr>
                  <tr v-for="clase in props.sesion.clases" :key="clase.id">
                    <td  class="border border-gray-100">
                      <el-checkbox :label="clase.id">{{ clase.title }}</el-checkbox>
                    </td>
                    <td  class="border border-gray-100">
                        {{ clase.summary }}
                    </td>
                  
                    <td class="border border-gray-100">{{ clase.body }}</td>
                    <td class="border border-gray-100">{{ clase.contenido.signature.nombre }}</td>
                    <td class="border border-gray-100">{{ clase.contenido.eje }}</td>
                    <td class="border border-gray-100">{{ clase.contenido.content }}</td>
                  </tr>
                </table>
              </el-checkbox-group>
                  
              <button
                class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500"
                type="submit"
                :disabled="form.processing"
              >
                Editar sesión
              </button>

              {{ form.checkedClases }}
            </form>
            
        </Body>


    </AppLayout>
 </template>