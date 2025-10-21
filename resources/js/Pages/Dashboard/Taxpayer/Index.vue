<script setup>
import { router, Link } from "@inertiajs/vue3";

defineProps({ user: Object });

const logout = () => {
    router.post("/logout");
};
</script>

<template>
    <div class="max-w-5xl mx-auto p-6 space-y-4">
        <h1 class="text-2xl font-bold">Taxpayer Dashboard</h1>
        <div class="grid md:grid-cols-4 gap-4">
            <Link
                :href="route('taxpayer.profile.show')"
                class="p-4 border rounded-lg hover:bg-gray-50"
                >Update Profile / KYC</Link
            >
            <a
                href="/applications"
                class="p-4 border rounded-lg hover:bg-gray-50"
                >Apply for Land Tax</a
            >
            <a href="/payments" class="p-4 border rounded-lg hover:bg-gray-50"
                >Payments & Receipts</a
            >
            <button
                @click="logout"
                class="p-4 border rounded-lg hover:bg-gray-50 text-left"
            >
                Logout
            </button>
        </div>
    </div>
</template>
