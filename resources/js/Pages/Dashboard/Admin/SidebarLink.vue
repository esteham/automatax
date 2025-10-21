<template>
    <button
        @click="$emit('select', component)"
        :class="[
            'flex items-center gap-3 w-full px-4 py-3 text-left rounded-lg transition-colors',
            active
                ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700'
                : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900',
        ]"
    >
        <div class="flex-shrink-0" v-html="icon"></div>
        <span class="font-medium">{{ label }}</span>
    </button>
</template>

<script setup>
defineProps({
    label: String,
    icon: String,
    component: String,
    active: Boolean,
});

defineEmits(["select"]);
</script>
