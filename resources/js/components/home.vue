<template>
        <div class="row">
            <createLink></createLink>
            <links_list></links_list>
        </div>
</template>

<script setup>
    import { provide } from 'vue';
    import createLink from './create.vue'
    import links_list from './links.vue'

    provide ('user_id', props.user_id);

    const props = defineProps({
        user_id:{
            type: Number,
            required: true
        }
    });

</script>

