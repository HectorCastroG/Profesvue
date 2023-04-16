<script setup>
    import { Link} from '@inertiajs/vue3';
    defineProps({
        links: Array

    });


</script>

<template>
    <div class="mt-6">
        <template v-for="link in links">
            <Link
                v-if="link.url"
                :href="link.url" 
                v-html="link.label"
                class="px-1 text-sm"
                :class="{'font-bold text-blue-600' : link.active }"
            />
            <span v-else v-html="link.label" class="text-gray-600 px-1 text-sm"></span>
        </template>
    </div>
</template>