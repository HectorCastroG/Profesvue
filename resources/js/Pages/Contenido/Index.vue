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

            <div class="border-sm border-gray-50">
                <div v-for="(key, signature) in Object.entries(contenidos)" class="mt-4 border border-gray-400 shadow-sm mx-1 my-2">
            
                    <div class="uppercase border border-gray-200 rounded-sm mx-1 my-2 bg-slate-200">
                        {{ key[0]}}
                    
                    </div>
                

                
                    <div v-for="(key, ejes) in Object.entries(key[1])" class="border border-gray-200 mx-1 my-2">

                        <div class="border border-gray-100 bg-slate-100">                    
                            Eje: {{ key[0] }}
                        </div>
                    
                    
                        <div v-for="(key, content) in Object.entries(key[1])" class="border-sm border-gray-100 bg-slate-50 mx-1 my-2">
                            {{key[1]  }}
                        </div>
                    </div>
                </div>
            </div>
            
        </Body>
        



    </AppLayout>
 </template>