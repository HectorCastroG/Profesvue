<script setup>
    import { Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Pagination from '@/Components/Pagination.vue';
    import { ref, watch } from 'vue';
    import {router} from '@inertiajs/vue3';
    import Body from '../Components/Body.vue';
    import Title from '@/Components/title.vue';
    let props = defineProps({
        users: Object,
        filter: Object

    });

    let search = ref(props.filter.search);
    watch(search, value => {
        router.get('/usuarios', {search: value},{
            preserveState: true,
            replace: true
        });
    }
    );


</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>

            <Title>
                <div class="flex justify-between">
                    <div class="px-2">
                        Lista de usuarios

                    </div>

                    <input v-model="search" type="text" placeholder="Search" class="rounded px-2 border">
                </div>
            </Title>

        </template>
        
        <Body>

            <div class="font-semibold text-xl text-gray-800 leading-tight divide-gray-100 divide-y">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 ">
                

                    <div class="border-b border-gray-200 sm:rounded-lg shadow overflow-auto" >
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div clas="flex item-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"> Edit </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <Pagination :links="users.links"/>

            </div>
        </Body>
    </AppLayout>
</template>