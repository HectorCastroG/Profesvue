<script setup>
     import AppLayout from '@/Layouts/AppLayout.vue';
    import Title from '@/Components/Title.vue';
    import Body from '../../Components/Body.vue';
    defineProps({

        contenidos: Object
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

            <div v-for="(key, signature) in Object.entries(contenidos)" class="mt-4 border border-gray-400">
            
                <div class="uppercase">
                    {{ key[0]}}

                </div>

                

                <div v-for="(key, ejes) in Object.entries(key[1])" class="border border-gray-200">
                
                    Eje: {{ key[0] }}


                    <div v-for="(key, content) in Object.entries(key[1])">
                        {{key[1]  }}
                    </div>
                </div>
            </div>
        </Body>
        



    </AppLayout>
 </template>