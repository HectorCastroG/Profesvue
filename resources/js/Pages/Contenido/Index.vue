<script setup>
     import AppLayout from '@/Layouts/AppLayout.vue';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    defineProps({

        contenidos: Array
    });


</script>

<template>
    <AppLayout title="Contenidos">
        <template #header>
 
            <Title>
                Contenidos
            </Title>

        </template>

        <Body>
            <div v-for="signature in contenidos" class="mt-4">
            
                {{ signature.nombre }}

                <div v-for="content in signature.contenido" class="border border-gray-200">
                
                    {{ content.content }}
                </div>
            </div>
        </Body>
        



    </AppLayout>
 </template>