<script setup>
    import {Head, Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/Title.vue';
    defineProps({
        clases: Array

    });

</script>

 <template>
    <AppLayout title="Clase">
        <template #header>
            <Title>
                Clases
            </Title>

        </template>

        <Body>
            <div class="font-semibold text-xl text-gray-800 leading-tight divide-gray-100 divide-y">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 ">
                
                
                    <div class="border-b border-gray-200 sm:rounded-lg shadow overflow-auto" >
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="clase in clases" :key="clase.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div clas="flex item-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    <div>
                                                        Titulo: {{ clase.title }} 
                                                    </div>
                                                
                                                    <div>
                                                        Cuerpo: {{ clase.summary }}
                                                    </div>
                                                
                                                    <div v-for="signatures in clases.signature" class="border border-gray-200 mt-2 rounded p-2">
                                                        Asignatura: {{ signatures.nombre }} 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </Body>

    </AppLayout>
 </template>