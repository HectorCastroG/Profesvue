<script setup>
    import {Head, Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/title.vue';
    defineProps({
        profesores: Array

    });


</script>

 <template>
    <AppLayout title="Profesores">
        <template #header>
            <Title>
                Profesor
            </Title>



        </template>

        <Body>
            
            <div class="font-semibold text-xl text-gray-800 leading-tight divide-gray-100 divide-y">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 ">
                
                
                    <div class="border-b border-gray-200 sm:rounded-lg shadow overflow-auto" >
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="profesor in profesores" :key="profesor.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div clas="flex item-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    <div>
                                                        Nombre: {{ profesor.user.name }} {{ profesor.user.lastname }}
                                                    </div>
                                                
                                                    <div>
                                                        Email: {{ profesor.user.email }}
                                                    </div>

                                                    <div v-for="signatures in profesor.signature" class="border border-gray-200 mt-2 rounded p-2">
                                                        Asignatura: {{ signatures.nombre }} 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"> Ver Perfil </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <nav>
            
                <ul>
            
                    <li><Link href="/clases" class="hover:underline">Clases</Link></li>
            
                    <li><Link href="/profesores" :class="{'font-bold underline': $page.url.startsWith('/profesores')}">Ir a profesores</Link></li>
            
                    <li><Link href="/misala">Mi sala</Link></li>
            
                    <li><Link href="/usuarios">usuarios</Link></li>
            
                </ul>
            
            </nav>
        </Body>


    </AppLayout>
 </template>