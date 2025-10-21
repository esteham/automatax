<template>
    <div class="h-full bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Admin Panel</h2>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <SidebarLink
                v-for="link in links"
                :key="link.component"
                :label="link.label"
                :icon="link.icon"
                :component="link.component"
                :active="activeComponent === link.component"
                @select="handleSelect"
            />
        </nav>
    </div>
</template>

<script setup>
import { computed } from "vue";
import SidebarLink from "./SidebarLink.vue";

const allLinks = [
    {
        label: "Overview",
        icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" stroke="currentColor" stroke-width="1.8"/><path d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z" stroke="currentColor" stroke-width="1.8"/></svg>',
        component: "Overview",
    },
    {
        label: "Users",
        icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 12a5 5 0 100-10 5 5 0 000 10zM3 22a9 9 0 1118 0H3z" stroke="currentColor" stroke-width="1.8"/></svg>',
        component: "Users",
    },
    {
        label: "Settings",
        icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke="currentColor" stroke-width="1.8"/><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="1.8"/></svg>',
        component: "Settings",
    },
];

const props = defineProps({
    activeComponent: String,
    role: String,
});

const emit = defineEmits(["select"]);

const handleSelect = (component) => {
    emit("select", component);
};

// Filter links based on role
const links = computed(() => {
    if (props.role === "admin") {
        return allLinks; // Admin gets all links
    } else if (props.role === "auditor") {
        return allLinks.filter(
            (link) =>
                link.component === "Overview" || link.component === "Users"
        );
    } else if (props.role === "accountant") {
        return allLinks.filter(
            (link) =>
                link.component === "Overview" || link.component === "Settings"
        );
    }
    return allLinks; // Default to all links if role not recognized
});
</script>
