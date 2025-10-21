<script setup>
import { ref } from "vue";
import Navbar from "@/Pages/Partials/Navbar.vue";
import Sidebar from "./Sidebar.vue";
import Overview from "./Overview.vue";
import Users from "./Users.vue";
import Settings from "./Settings.vue";

const props = defineProps({
    role: String,
});

const activeComponent = ref("Overview");
const showMobileSidebar = ref(false);

const components = {
    Overview,
    Users,
    Settings,
};

const handleSelect = (component) => {
    activeComponent.value = component;
    showMobileSidebar.value = false; // Close mobile sidebar on selection
};
</script>
<template>
    <div class="min-h-screen bg-gray-50">
        <Navbar />
        <div class="flex pt-20">
            <!-- Sidebar -->
            <div
                class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 md:pt-20"
            >
                <Sidebar
                    :active-component="activeComponent"
                    :role="role"
                    @select="handleSelect"
                />
            </div>

            <!-- Mobile sidebar toggle button -->
            <div class="md:hidden fixed top-20 left-0 z-50">
                <button
                    @click="showMobileSidebar = !showMobileSidebar"
                    class="bg-white p-2 rounded-r-lg shadow-md border border-gray-200"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-gray-600"
                        viewBox="0 0 24 24"
                        fill="none"
                    >
                        <path
                            d="M4 6h16M4 12h16M4 18h16"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </button>
            </div>

            <!-- Mobile sidebar overlay -->
            <div
                v-if="showMobileSidebar"
                class="md:hidden fixed inset-0 flex z-40"
            >
                <div
                    class="fixed inset-0 bg-gray-600 bg-opacity-75"
                    @click="showMobileSidebar = false"
                ></div>
                <div
                    class="relative flex-1 flex flex-col max-w-xs w-full bg-white"
                >
                    <Sidebar
                        :active-component="activeComponent"
                        :role="role"
                        @select="handleSelect"
                    />
                </div>
            </div>

            <!-- Main content -->
            <div class="md:pl-64 flex flex-col flex-1">
                <main class="flex-1">
                    <component :is="components[activeComponent]" />
                </main>
            </div>
        </div>
    </div>
</template>
