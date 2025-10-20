<script setup>
defineProps({ user: Object });
</script>

<template>
    <div class="max-w-5xl mx-auto p-6 space-y-4">
        <h1 class="text-2xl font-bold">Taxpayer Dashboard</h1>
        <div class="grid md:grid-cols-3 gap-4">
            <a
                href="/taxpayer/profile"
                class="p-4 border rounded-lg hover:bg-gray-50"
                >Update Profile / KYC</a
            >
            <a
                href="/applications"
                class="p-4 border rounded-lg hover:bg-gray-50"
                >Apply for Land Tax</a
            >
            <a href="/payments" class="p-4 border rounded-lg hover:bg-gray-50"
                >Payments & Receipts</a
            >
        </div>
    </div>
</template>
