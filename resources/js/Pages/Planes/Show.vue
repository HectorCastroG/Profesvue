<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Title from '../../Components/Title.vue';
    import Body from '../../Components/Body.vue';
    defineProps({
        plan: Object
    });

</script>

 <template>
    <AppLayout title="Plan">
        <template #header>
            <Title>
                Plan {{ plan.nombre }}
            </Title>
        </template>

        <Body>
            <div class="border border-gray-100 bg-gray-50 flex w-full pt-2 ">

                <table class="border border-gray-200 w-full">
                    <tr >                    
                        <td class="w-64 border-r-2 pl-8">Profesor</td>
                        <td class="pl-8">{{ plan.profesor.name }} {{ plan.profesor.lastname }}</td>
                    </tr>

                    <tr class="border border-gray-200 bg-slate-100 pt-2">
                        <td class="w-64 border-r-2 pl-8">
                            Asignatura
                        </td>
                    
                        <td class="pl-8">
                            {{ plan.signature }}
                        </td>
                    </tr>

                    <tr class="border border-gray-200 bg-gray-50  pt-2">
                        <td class="w-64 border-r-2 pl-8">
                            Información
                        </td>
                    
                        <td class="pl-8">
                            {{ plan.informacion }}
                        </td>
                    </tr>

                    <tr class="border border-gray-200 bg-slate-100 pt-2 w-full">
                        <td class="w-64 border-r-2 pl-8">
                            Sesiones:
                        </td>
                        
                        <td>
                            <tr v-for="sesion in plan.sesion" class="pl-8 border border-gray-200 w-full">
                                <tr>
                                    <td class="pl-8 w-64 border-r-2">
                                        Fecha
                                    </td>
                                    <td class="pl-8">
                                        {{ sesion.fecha }}
                                     </td>
                                </tr>
                            
                                <tr class="border border-gray-200 bg-slate-200 pt-2">
                                    <td class="pl-8 w-64 border-r-2">
                                        Hora de Inicio
                                    </td>
                                    <td class="pl-8">
                                        {{ sesion.horainicio }}
                                     </td>
                                </tr>
                            
                                <tr class="border border-gray-200 pt-2">
                                    <td class="pl-8 w-64 border-r-2">
                                        Hora de cierre
                                    </td>
                                    <td class="pl-8">
                                        {{ sesion.horacierre }}
                                     </td>
                                </tr>
                            
                            
                                <tr class="border border-gray-200 bg-slate-200 pt-2">
                                    <td class="pl-8 w-64 border-r-2">
                                        Clases
                                    </td>
                                    <td>
                                        <tr v-for="clase in sesion.clase" class="border border-gray-300">
                                            <tr>
                                                <td class="pl-4 w-64 border-r-2">
                                                    Title
                                                </td>
                                                <div class="pl-4 w-96">
                                                    {{ clase.title }}
                                                </div>
                                            </tr>
                                            <tr>
                                                <td class="pl-4 w-64 border-r-2">
                                                    Resumen
                                                </td>
                                                <td class="pl-4 w-96">
                                                    {{ clase.summary }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4 w-64 border-r-2">
                                                    Contenido
                                                </td>
                                                <td class="pl-4 w-96">
                                                    {{ clase.contenido.content }}
                                                </td>
                                            </tr>
                                        
                                        
                                        </tr>
                                     </td>
                                </tr>
                            </tr>
                        </td>
                    </tr>

                </table>


            </div>





            
            {{ plan.signature }}
            
            <div v-for="sesion in plan.sesion">
                {{ sesion.fecha }}
            </div>
        </Body>

    </AppLayout>
 </template>