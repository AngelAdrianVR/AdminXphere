<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="shadow-md shadow-green-900/100 inline-flex items-center px-4 py-2 bg-green-800 rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-cyan-500 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
