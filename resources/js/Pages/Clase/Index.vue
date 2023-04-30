<script setup>
    import {Head, Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/Title.vue';
    import Pagination from '@/Components/Pagination.vue'
    import { ref, watch } from 'vue';
    import {router} from '@inertiajs/vue3';
    defineProps({
        clases: Object

    });

    let buscar = ref('');
    
    watch(buscar, value => {
        router.get('/clase/inicio', {buscar: value},{
            preserveState: true,
            replace: true
        });
    }
    );

</script>

 <template>
    <AppLayout title="Clase">
        <template #header>
            <Title>
                <div class="flex justify-between">
                    Clases
                    <input 
                        class="border border-gray-300 rounded"
                        type="text"
                        name="search"
                        placeholder="¿Que quieres buscar?"
                        v-model="buscar"
                        >
                </div>
            </Title>

            
        </template>

        <Body>
            <div class="font-semibold text-xl text-gray-800 leading-tight divide-gray-100 divide-y">

                <div class="py-2 align-middle inline-block sm:px-6 ">
                
                
                    <div class="border-b border-gray-200 sm:rounded-lg shadow overflow-auto" >
                        <table class="w-full max-w-full divide-y divide-gray-200">
                            <tbody class="max-w-full bg-white divide-y divide-gray-200">
                                <tr v-for="clase in clases.data" :key="clase.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div clas="flex w-full item-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    <div>
                                                        Titulo: {{ clase.title }} 
                                                    </div>
                                                
                                                    <div class="max-w-full whitespace-pre-wrap" >
                                                        Resumen: {{ clase.summary }}
                                                    </div>
                                                
                                                    <div>
                                                        Palabras claves: {{clase.pkey1  }}, {{clase.pkey2  }}, {{ clase.pkey3 }}
                                                    </div>

                                                    <div>
                                                        Asignatura: {{ clase.signature }}
                                                    </div>

                                                    <div>
                                                        Profesor: {{ clase.profesor }}
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
            <Pagination :links="clases.links"/>
        </Body>

    </AppLayout>
 </template>