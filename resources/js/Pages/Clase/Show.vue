<script setup>
    import {Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    defineProps({
        user: Array,
        clase: Array
    });

</script>

 <template>
    <AppLayout title="Clase">
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profesor: {{ user.name }} {{ user.lastname }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clase: {{ clase.title }}
            </h2>
            

        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <div class="bg-white  sm:rounded-lg">
                <div class="border border-gray-300 p-6 rounded-lg mt-2 px-7">

                    {{ clase.body }} 

                </div>
            </div>
            
        </div>


    </AppLayout>
 </template>