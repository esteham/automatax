<script setup>
import { Link } from "@inertiajs/vue3";
import Navbar from "@/Pages/Partials/Navbar.vue";
import Footer from "@/Pages/Partials/Footer.vue";

defineProps({
    applications: Array,
    hasSubmitted: Boolean,
});
</script>

<template>
    <Navbar />

    <div class="max-w-7xl mx-auto py-10 px-6 space-y-8">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    TIN Applications
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Manage your submitted and pending TIN applications.
                </p>
            </div>

            <!-- New Application Button -->
            <Link
                v-if="!hasSubmitted"
                href="/taxpayer/tin-applications/create"
                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all duration-150"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v16m8-8H4"
                    />
                </svg>
                New Application
            </Link>
        </div>

        <!-- Application List / Empty State -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6">
            <!-- Empty State -->
            <div v-if="applications.length === 0" class="text-center py-20">
                <svg
                    class="mx-auto h-16 w-16 text-gray-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z"
                    />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-800">
                    No TIN Applications Yet
                </h3>
                <p class="mt-2 text-sm text-gray-500">
                    Start your application process by clicking the button below.
                </p>

                <div v-if="!hasSubmitted" class="mt-6">
                    <Link
                        href="/taxpayer/tin-applications/create"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 shadow transition-all duration-150"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                            />
                        </svg>
                        New Application
                    </Link>
                </div>
            </div>

            <!-- Applications List -->
            <div v-else class="grid md:grid-cols-2 gap-6">
                <div
                    v-for="application in applications"
                    :key="application.id"
                    class="border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-200"
                >
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Application #
                                {{ application.application_number || "Draft" }}
                            </h3>
                            <span
                                :class="[
                                    'inline-flex items-center px-2.5 py-0.5 mt-1 rounded-full text-xs font-medium capitalize',
                                    application.status === 'draft'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : application.status === 'submitted'
                                        ? 'bg-blue-100 text-blue-800'
                                        : application.status === 'under_review'
                                        ? 'bg-purple-100 text-purple-800'
                                        : application.status === 'approved'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-red-100 text-red-800',
                                ]"
                            >
                                {{ application.status.replace("_", " ") }}
                            </span>

                            <p class="mt-2 text-sm text-gray-600">
                                <strong>Created:</strong>
                                {{
                                    new Date(
                                        application.created_at
                                    ).toLocaleDateString()
                                }}
                            </p>
                            <p
                                v-if="application.submitted_at"
                                class="text-sm text-gray-600"
                            >
                                <strong>Submitted:</strong>
                                {{
                                    new Date(
                                        application.submitted_at
                                    ).toLocaleDateString()
                                }}
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col items-end gap-2">
                            <Link
                                :href="`/taxpayer/tin-applications/${application.id}`"
                                class="text-indigo-600 hover:text-indigo-800 text-sm font-medium"
                            >
                                View
                            </Link>
                            <Link
                                v-if="application.status === 'draft'"
                                :href="`/taxpayer/tin-applications/${application.id}/edit`"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                            >
                                Edit
                            </Link>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div
                        v-if="application.notes"
                        class="mt-3 text-sm text-gray-700 italic"
                    >
                        “{{ application.notes }}”
                    </div>

                    <div
                        class="mt-4 grid grid-cols-2 gap-2 text-sm text-gray-600"
                    >
                        <div v-if="application.circle">
                            <span class="font-medium">Circle:</span>
                            {{ application.circle }}
                        </div>
                        <div v-if="application.zone">
                            <span class="font-medium">Zone:</span>
                            {{ application.zone }}
                        </div>
                        <div v-if="application.assessment_year">
                            <span class="font-medium">Assessment Year:</span>
                            {{ application.assessment_year }}
                        </div>
                        <div v-if="application.income">
                            <span class="font-medium">Income:</span>
                            ৳{{ application.income }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Footer />
</template>
