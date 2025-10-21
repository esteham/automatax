<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">
            Dashboard Overview
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="bg-white p-6 rounded-lg shadow-sm border border-gray-200"
            >
                <div class="flex items-center">
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-blue-600"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 12a5 5 0 100-10 5 5 0 000 10zM3 22a9 9 0 1118 0H3z"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">
                            Total Users
                        </p>
                        <p class="text-2xl font-bold text-gray-900">1,234</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-lg shadow-sm border border-gray-200"
            >
                <div class="flex items-center">
                    <div class="p-2 bg-green-50 rounded-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-green-600"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">
                            Active Applications
                        </p>
                        <p class="text-2xl font-bold text-gray-900">567</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-lg shadow-sm border border-gray-200"
            >
                <div class="flex items-center">
                    <div class="p-2 bg-yellow-50 rounded-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-yellow-600"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">
                            Pending Payments
                        </p>
                        <p class="text-2xl font-bold text-gray-900">89</p>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="mt-8 bg-white p-6 rounded-lg shadow-sm border border-gray-200"
        >
            <h2 class="text-lg font-semibold text-gray-900 mb-4">
                Recent Activity
            </h2>
            <div class="space-y-4">
                <div
                    class="flex items-center justify-between py-2 border-b border-gray-100"
                >
                    <div>
                        <p class="text-sm font-medium text-gray-900">
                            New user registration
                        </p>
                        <p class="text-xs text-gray-500">2 minutes ago</p>
                    </div>
                    <span
                        class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full"
                        >Success</span
                    >
                </div>
                <div
                    class="flex items-center justify-between py-2 border-b border-gray-100"
                >
                    <div>
                        <p class="text-sm font-medium text-gray-900">
                            Payment processed
                        </p>
                        <p class="text-xs text-gray-500">5 minutes ago</p>
                    </div>
                    <span
                        class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full"
                        >Info</span
                    >
                </div>
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="text-sm font-medium text-gray-900">
                            Application submitted
                        </p>
                        <p class="text-xs text-gray-500">10 minutes ago</p>
                    </div>
                    <span
                        class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full"
                        >Pending</span
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// This component can be enhanced with props for dynamic data
</script>
