<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center py-2 px-2 bg-gradient-to-r from-emerald-700 to-green-700 font-semibold text-sm leading-5 text-white rounded-lg'
        : 'inline-flex items-center text-sm font-medium text-gray-700 py-2 px-2 hover:bg-gradient-to-r from-emerald-600 to-green-400 hover:text-white rounded-lg';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
