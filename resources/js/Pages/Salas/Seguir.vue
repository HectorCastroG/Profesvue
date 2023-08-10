<script setup>
    import { Link } from '@inertiajs/vue3';
    import {defineProps} from 'vue';
    const props = defineProps({
        user:Object,
        errors: Object
    });

    const seguirUsuario = async () => {
        try {
            const response = await form.post('/seguir/' + user.id);
            if (Object.keys(props.errors).length === 0) {
                alert('Usuario Seguido');
            }
        } catch (error) {
          console.error(error);
        } 
    };
</script>

 <template>
    <Link
        :href="'/seguir/' + user.id"
        method="post"
        as="button"
        type="button"
        :data="{user: user.id}"
        class="text-blue-500"
        @click="seguirUsuario"
    >
        Seguir
    </Link>
    <template v-if="props.errors =! null">
        <div class="text-red-500">
          <ul>
            <li v-for="error in props.errors" >
              {{ error }}
            </li>
          </ul>
        </div>
    </template>
 </template>