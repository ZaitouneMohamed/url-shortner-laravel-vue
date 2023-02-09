<template>
        <div class="row">
            <createLink></createLink>
        </div>
</template>

<script setup>
    import { provide } from 'vue';
    import createLink from './create.vue'

    provide ('user_id', props.user_id);

    const props = defineProps({
        user_id:{
            type: Number,
            required: true
        }
    });

</script>

