<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Body from '../../Components/Body.vue';
    import Title from '@/Components/Title.vue';
    defineProps({

    });

</script>

 <template>
    <AppLayout title="Clase">
        <template #header>
            <Title>
                <div class="flex justify-between">
                    Sesion:
                </div>
            </Title>

        </template>
    
        <Body>
            Sesion:
        </Body>


    </AppLayout>
 </template>