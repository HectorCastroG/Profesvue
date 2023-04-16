<script setup>
    import {Head, Link} from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    defineProps({

    });

</script>

 <template>
    <AppLayout title="Clase">
        <template #header>




            <Link href="/misala">
                Mi sala
            </Link>

            <Link href="/dashboard">
                Dashboard
            </Link>

        </template>

    </AppLayout>
 </template>