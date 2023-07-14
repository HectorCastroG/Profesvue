<script setup>
    import {defineProps} from 'vue';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/Title.vue';
    import { Link } from '@inertiajs/vue3';
    
    const props = defineProps({
        sesion: Object,
        clases: Array,
        profesor: Object,
        inscritos: Array,
        errors: Object
    });

    const inscribirUsuario = async () => {
        try {
            const response = await form.post('/inscribir/' + sesion.id);
            if (Object.keys(props.errors).length === 0) {
                alert('Sesión creada');
            }
        } catch (error) {
          console.error(error);
        } 
    };
</script>

 <template>
    <AppLayout title="Clase">
        <template #header>
            <Title>
                <div class="flex justify-between">
                    Sesion:
                </div>
            </Title>

        </template>
    
        <Body>

            <div class="border border-gray-200 rounded-sm">

                <div class="flex">                
                    Datos de la sesion:
                    <table class="border border-gray-200 w-full">
                        <tr>
                            <td class="border border-gray-200">
                                Nombre del Profesor
                            </td>
                            <td class="border border-gray-200">
                                <Link :href="'/sala/'+profesor.username" class="text-indigo-600 hover:text-indigo-900">{{ profesor.nombre }}</Link></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-200">Fecha</td>
                            <td class="border border-gray-200">{{ sesion.fecha }}</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-200">Hora Inicio</td>
                            <td class="border border-gray-200">{{ sesion.horainicio }}</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-200">Hora Cierre</td>
                            <td class="border border-gray-200">{{ sesion.horacierre }}</td>
                        </tr>
                    </table>
                </div>
                
            
            
            </div>



            <div class="border border-gray-200 rounded-sm">

                <div class="border border-gray-200 rounded-sm flex" v-for="clase in clases" :key="clase.id">
                    
                    <div class="border border-gray-200 rounded-sm w-3/4">  
                        Clase: {{ clase.title }}
                    </div>

                    <div class="border border-gray-200 rounded-sm w-1/4">
                        <Link 
                                    :href="'/clase/'+profesor.username+'/'+clase.id" 
                                    class="w-1/12 text-blue-500">
                                     Ver
                        </Link>
                    </div>
                </div>


            </div>

            <div class="border border-gray-200 rounded-sm flex">

                <div class="w-1/8"></div>
                Inscritos en la sesion

                <div class="w-3/4">                
                    <div class="border border-gray-200 rounded-sm" v-for="inscrito in inscritos" :key="inscrito.id">
                    {{ inscrito.name }} {{ inscrito.lastname }}
                </div>
                <div>
                    <Link
                        :href="'/inscribir/' + sesion.id"
                        method="post"
                        as="button"
                        type="button"
                        :data="{sesion: sesion.id}"
                        class="text-blue-500"
                        @click="inscribirUsuario"
                    >
                        Inscribirse
                    </Link>

                    <template v-if="props.errors =! null">
                        <div class="text-red-500">
                          <ul>
                            <li v-for="error in props.errors" >
                              {{ error }}
                            </li>
                          </ul>
                        </div>
                    </template>
                </div>
            </div>


                
            </div>
        </Body>


    </AppLayout>
 </template>