<script setup> 
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import InputLabel from '../../../Components/InputLabel.vue';
    import TextAreacomp from '../../../Components/TextAreacomp.vue';   
    import {defineProps} from 'vue'; 
    import { usePage } from '@inertiajs/vue3';
    import { Link} from '@inertiajs/vue3';
    const props = defineProps({
        post: Object
    });
 
    const form = useForm({
        comment: '',
        user: usePage().props.auth.user.id,

    })

    let submit = ()=>{
        form.post('/comment/create/'+props.post.id)
    }

    const showcomments = ref(false);
    function showclick(){
        showcomments.value = !showcomments.value;
    }

    
    
</script>

<template>


    <div class="m-4 border border-gray-200">
        <p class="m-2">{{ post.name }}</p>
    </div>

    <div class="m-4">                
        {{ post.body }}
    </div>

    <div class="flex border rounded border-slate-300">
        <div class="w-1/3 m-2" @click="showclick">
            {{ showcomments ? 'Ocultar comentarios' : 'Mostrar comentarios'  }}
        </div>
        <Link class="w-1/3 m-2"
            :href="route('post.editar', {post: post.id})" 
        >
            Editar Post
        </Link>
        <Link class="w-1/3 m-2"
            :href="'/deletepost/'+post.id" 
            as="button" 
            type="button" 
            method="delete" 
            :data="{post: post.id}"
        >
            Borrar Post
        </Link>

    </div>

    <form @submit.prevent="submit" clase="max-w-md mx-auto">
        <InputLabel for="Comment" value="Esciba su comentario" />
        <TextAreacomp
          v-model="form.comment"
          class="border border-gray-400 p-2 w-full"
          type="text"
          name="comment"
          id="comment"
          required
        ></TextAreacomp>

        <button class="border border-gray-800 mt-3 rounded bg-slate-400 text-white py-2 px-4 hover:bg-slate-500" 
                type="submit"
                :disabled="form.processing"
                >
            Comentar
        </button>
    </form>

    <div v-if="showcomments" v-for="comment in post.comment" class="m-4">
        
        {{ comment.comment }} 
        <Link
            :href="'/deletecomment/'+comment.id" 
            as="button" 
            type="button" 
            method="delete" 
            :data="{comment: comment.id}" 
            class="border border-gray-300 bg-gray-50">
            Borrar comentario
        </Link>
    </div>
</template>

