<script setup>
    import {Head, Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/Title.vue';
    defineProps({
        user: Array,
        asignaturas: Array,
        clases: Array
    });

</script>

 <template>
    <AppLayout title="Sala">
        <template #header>
            <Title>
                Sala del profesor: {{ user.name }} {{ user.lastname }}

            </Title>
            

        </template>

        <Body>
            <div class="p-6 rounded-lg mt-2 flex">
                <div class="border border-gray-300 p-6 rounded-lg mt-2 w-1/2">
                    Está de cumpleaños el día:    {{ user.birthday }}
                </div>
                <div class="border border-gray-300 p-6 rounded-lg mt-2 w-1/2">
                    Su correo electrónico:    {{ user.email }}
                </div>
            </div>

            <div class="border border-gray-300 p-6 rounded-lg mt-2 px-7">

                Asignaturas 
                <div 
                    v-for="asignatura in asignaturas" 
                    class="border border-gray-300 p-6 rounded-lg mt-2 px-7">
                    <p class="uppercase">{{ asignatura.nombre }}</p>

                    
                    <div v-for="clase in clases" >
                        
                        <div v-if="clase.contenido.signature_id === asignatura.id" class="border border-gray-300 p-6 rounded-lg mt-2 px-7 flex">
                            <p class="w-11/12">{{ clase.title }}</p>
                            <Link 
                                :href="'/clase/'+user.username+'/'+clase.id" 
                                class="w-1/12 text-blue-500">
                                 Ver
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </Body>

    </AppLayout>
 </template>