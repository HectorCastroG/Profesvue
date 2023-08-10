<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    import TextAreacomp from '../../Components/TextAreacomp.vue';
    import { ElCheckbox, ElCheckboxGroup, ElPopover } from 'element-plus';
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({

        signatures: Array,
        planes: Array,
        sesiones: Array,
    });

    let form = useForm({
        name: '',
        informacion: '',
        signature_id: '',
        checkedSesions: []
    });

    let submit = () => {
        form.post('/misplanes/crear');
    };


</script>

<template>
    <AppLayout title="Mis Planes">
        <template #header>
 
            <Title>
                Mis planes
            </Title>

        </template>

        <Body>

          <div class="border border-gray-200 bg-slate-50 text-lg mt-5 px-5 mb-5">
            Mis planes
            

          </div>
          <table class="text-xs border-gray-300 border w-full">

            <tr class="border-gray-200 border p-2 bg-slate-200 w-full">
              <th class="w-1/6 border border-gray-500">Nombre</th>
              <th class="w-64 border border-gray-500">Asignatura</th>
              <th class="w-1/4 border border-gray-500">Informacion</th>
              <th class="w-96 border border-gray-500">Sesiones</th>
              <th class="w-1/8 border border-gray-500">CRUD</th>

            </tr>
            <tr v-for="plan in props.planes" :key="plan.id" class="border border-gray-100">
              <td class="border border-gray-200 w-1/6">
                {{plan.name}}
              
              </td>
              <td class="border border-gray-200 w-64">
                {{plan.signature.nombre}}

              </td> 
              <td class="border border-gray-200 w-96 ">
                {{ plan.informacion }}

              </td> 
              <td class="border border-gray-200 w-1/4 text-xs">
                <div v-for="sesion in plan.sesion">
                  Día: {{ sesion.fecha }} de  {{ sesion.horainicio }} a {{ sesion.horacierre }}
                
                
                </div>
              </td>

              <td class="border border-gray-200 w-1/8 text-xs items-center flex-column">

                <Link                   
                  :href="'/plan/'+plan.id"
                  as="button" 
                  type="button"
                  class="rounded-sm bg-slate-50 border border-slate-400 p-1 mr-1"
                >
                  Ver
                </Link>
                
                <Link 
                  :href="'/editarplan/'+plan.id"
                  as="button" 
                  type="button"
                  class="rounded-sm bg-slate-50 border border-slate-400 p-1 mr-1">editar</Link>
                <Link 
                  :href="'/deleteplan/'+plan.id" 
                  as="button" 
                  type="button" 
                  method="delete" 
                  :data="{plan: plan.id}"
                  class="rounded-sm bg-slate-50 border border-slate-400 p-1 "
                >
                  Borrar

                </Link>
                
              </td>
            </tr>
          </table>

          <div class="border border-gray-200 bg-slate-50 text-lg mt-5 px-5">
            Agregar plan

          </div>            
            <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
                <InputLabel for="name" value="Nombre del Plan" />
                <TextInput
                  v-model="form.name"
                  class="border border-gray-400 p-2 w-full"
                  type="text"
                  name="name"
                  id="name"
                  required
                  autocomplete="Nombre del Plan"
                />
                
                <InputLabel for="informacion" value="Información adicional" />
                <TextAreacomp
                  v-model="form.informacion"
                  class="border border-gray-400 p-2 w-full"
                  type="text"
                  name="informacion"
                  id="informacion"
                  required
                ></TextAreacomp>

                <select name="signature" id="signatures" v-model="form.signature_id">
                    <option v-for="signature in signatures" :value ="signature.id" :key="signature.id">
                        {{ signature.nombre }}
                    </option>
                </select>

                <el-checkbox-group v-model="form.checkedSesions">
                    <table class="text-xs border-gray-300 border">

                        <tr class="border-gray-200 border p-2 bg-slate-200 w-full">
                          <th class="w-1/4 border border-gray-500">Fecha</th>
                          <th class="w-1/4 border border-gray-500">Hora Inicio</th>
                          <th class="w-1/4 border border-gray-500">Hora Cierre</th>
                          <th class="w-1/4 border border-gray-500">Clases</th>
                        </tr>
                        <tr v-for="sesion in props.sesiones" :key="sesion.id" class="border border-gray-100">
                          <td class="border border-gray-200 w-1/4">
                            <el-checkbox :label="sesion.id">{{ sesion.fecha }}</el-checkbox>
                          </td>
                          <td class="border border-gray-200 w-1/4">
                              {{sesion.horainicio}}
                          </td> 
                          <td class="border border-gray-200 w-1/4">
                              {{sesion.horacierre}}
                          </td> 
                          <td class="border border-gray-200 w-1/4">
                            <el-popover trigger="click" placement="right">
                                <table class="bg-white border border-black rounded px-4 py-2">
                                    <tr>
                                        <th>Titulo</th>
                                    </tr>
                                    <tr v-for="clase in sesion.clase">
                                        <th>{{ clase.title }}</th>
                                    </tr>
                                </table>

                              <template #reference>
                                <span class="popover-trigger underline cursor-pointer">ver</span>
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
                  Crear nuevo Plan
                </button>
            </form>

            {{ form.checkedSesions }}
            {{ form.signature_id }}
        </Body>
    </AppLayout>
</template>