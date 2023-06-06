<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600 bg-red-100 ease-in p-1 select-none">
            {{ message }}
        </p>
    </div>
</template>
