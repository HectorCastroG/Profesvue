<script setup>
    import { Link } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    defineProps({
        user: Object,
        clase: Object
    });

</script>

 <template>
    <AppLayout title="Clase">
        <template #header>
            <Title>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Profesor: {{ user.name }} {{ user.lastname }}
                </h2>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Clase: {{ clase.title }}
                </h2>
            </Title>


            

        </template>
        <Body>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
                <div class="bg-white  sm:rounded-lg">
                    <div class="border border-gray-300 p-6 rounded-lg mt-2 px-7">
                        <table class="text-xs border border-gray-200 w-full">
                            <tr>
                                <td class="border border-gray-100 bg-gray-50 w-1/4">Descripcion</td>
                                <td class="border border-gray-100">{{ clase.body }} </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-100 bg-gray-50">Resumen</td>
                                <td class="border border-gray-100">{{ clase.summary }} </td>
                            </tr>

                            <tr >
                                <td class="border border-gray-100 bg-gray-50">Palabra Clave 1</td>
                                <td class="border border-gray-100">{{ clase.pkey1 }}</td>
                            </tr>

                            <tr >
                                <td class="border border-gray-100 bg-gray-50">Palabra Clave 2</td>
                                <td class="border border-gray-100">{{ clase.pkey2 }}</td>

                                
                            </tr>

                            <tr >
                                <td class="border border-gray-100 bg-gray-50">Palabra Clave 3</td>
                                <td class="border border-gray-100">{{ clase.pkey3}}</td>
                            </tr>
                            <tr >
                                <td class="border border-gray-100 bg-gray-50">Presentacion</td>
                                <td class="border border-gray-100">
                                    <a :href="'/presentation/'+clase.id">Descargar</a>
                                </td>
                            </tr>
                            <tr >
                                <td class="border border-gray-100 bg-gray-50">Guía</td>
                                <td class="border border-gray-100">
                                    <a
                                        :href="'/guide/'+clase.id"

                                    >
                                        Descargar</a>
                                </td>
                            </tr>

                        </table>


                    </div>
                </div>
            
            </div>
        </Body>


    </AppLayout>
 </template>