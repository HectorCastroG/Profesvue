<script setup>
    import {Head, Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    import Postcreate from './Post/Postcreate.vue';
    import Postshow from './Post/Postshow.vue';
    import Pagination from '@/Components/Pagination.vue';
    defineProps({
        user: Object,
        posts: Array
    });


</script>

 <template>
    <AppLayout title="Mi sala">
        <template #header>
 
            <Title>
                Mi Sala
            </Title>

        </template>

        <Body>

            <div class="border border-slate-200 m-8">
                <Postcreate/>
            </div>
            <div class="m-2 mt-2 border rounded ml-8 mr-8">
                <p class="ml-52 mt-4">                Mis Post</p>
                
                <div v-for="post in posts.data" class="m-8 ml-52 mr-52 border bg-slate-50 rounded">
                    <Postshow :post="post"/>


                </div>
                <Pagination :links="posts.links" class="ml-52 mr-52 mb-4"/>

            </div>


            <div class="border border-gray-200 m-8">
                Asignaturas 
                <div 
                    v-for="asignatura in user.signatures" 
                    class="border border-gray-300 p-6 rounded-lg mt-2 px-7">
                    <p class="uppercase">{{ asignatura.nombre }}</p>
                    <div v-for="clase in user.clases" >
                        
                        <div v-if="clase.contenido.signature_id === asignatura.id" class="border border-gray-300 p-6 rounded-lg mt-2 px-7 flex">
                            <p class="w-3/4">{{ clase.title }}</p>
                            <Link 
                                :href="'/clase/'+user.username+'/'+clase.id" 
                                class="w-1/12 text-blue-500">
                                 Ver
                            </Link>

                            <Link 
                                :href="route('clase.editar', {clase: clase.id})" 
                                class="w-1/12 text-blue-500">
                                 Editar
                            </Link>

                            <Link 
                                :href="'/delete/'+clase.id" 
                                as="button" 
                                type="button" 
                                method="delete" 
                                :data="{clase: clase.id}"
                                class="rounded-sm bg-slate-300 border border-slate-400 p-1 ">
                                Borrar
                            </Link>

                        </div>
                    </div>
                </div>

            </div>
        </Body>
        



    </AppLayout>
 </template>
