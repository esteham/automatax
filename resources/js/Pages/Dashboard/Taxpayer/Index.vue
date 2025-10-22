<script setup>
import { router, Link } from "@inertiajs/vue3";
import Navbar from "@/Pages/Partials/Navbar.vue";
import Footer from "@/Pages/Partials/Footer.vue";

defineProps({ user: Object });

const logout = () => router.post("/logout");

const icons = {
    profile:
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 12a5 5 0 100-10 5 5 0 000 10zM3 22a9 9 0 1118 0H3z" stroke="currentColor" stroke-width="1.8"/></svg>',
    apply: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 7h16M4 12h10M4 17h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
    pay: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M3 10h18" stroke="currentColor" stroke-width="1.8"/></svg>',
    receipt:
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M7 3h10v18l-3-2-2 2-2-2-3 2V3z" stroke="currentColor" stroke-width="1.8"/><path d="M9 7h6M9 11h6M9 15h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
    logout: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M15 12H3m12 0l-3-3m3 3l-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M9 7V5a2 2 0 012-2h7a2 2 0 012 2v14a2 2 0 01-2 2h-7a2 2 0 01-2-2v-2" stroke="currentColor" stroke-width="1.8"/></svg>',
};
</script>

<template>
    <div class="min-h-screen bg-gradient-to-b from-white to-neutral-50">
        <!-- Top nav with auth-aware menu -->
        <Navbar :brand-to="'/'" />

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            <!-- Page header -->
            <div
                class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8"
            >
                <div>
                    <h1
                        class="text-2xl md:text-3xl font-extrabold tracking-tight"
                    >
                        Taxpayer Dashboard
                    </h1>
                    <p class="text-neutral-600 mt-1">
                        Welcome back<span v-if="user">, {{ user.name }}</span
                        >—manage your profile, applications and payments in one
                        place.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <Link
                        href="/support"
                        class="px-4 py-2 rounded-xl border border-neutral-200 hover:bg-neutral-50 text-sm font-medium"
                        >Support</Link
                    >
                    <button
                        @click="logout"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-neutral-900 text-white hover:bg-neutral-800 text-sm font-medium"
                        v-html="icons.logout"
                    />
                </div>
            </div>

            <!-- Quick actions -->
            <section>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                    <Link
                        :href="route('taxpayer.profile.show')"
                        class="group p-5 rounded-2xl border border-neutral-200 bg-white hover:shadow-md hover:border-neutral-300 transition-all"
                    >
                        <div
                            class="inline-flex items-center justify-center h-10 w-10 rounded-xl bg-blue-50 text-blue-600 group-hover:scale-105 transition"
                            v-html="icons.profile"
                        />
                        <h3 class="mt-3 font-semibold">Update Profile / KYC</h3>
                        <p class="mt-1 text-sm text-neutral-600">
                            Keep your personal and property details up to date.
                        </p>
                    </Link>

                    <Link
                        :href="route('taxpayer.tin-applications.create')"
                        class="group p-5 rounded-2xl border border-neutral-200 bg-white hover:shadow-md hover:border-neutral-300 transition-all"
                    >
                        <div
                            class="inline-flex items-center justify-center h-10 w-10 rounded-xl bg-purple-50 text-purple-600 group-hover:scale-105 transition"
                            v-html="icons.apply"
                        />
                        <h3 class="mt-3 font-semibold">Apply for Tin Number</h3>
                        <p class="mt-1 text-sm text-neutral-600">
                            Start a new application and track approval status.
                        </p>
                    </Link>

                    <Link
                        href="/payments"
                        class="group p-5 rounded-2xl border border-neutral-200 bg-white hover:shadow-md hover:border-neutral-300 transition-all"
                    >
                        <div
                            class="inline-flex items-center justify-center h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 group-hover:scale-105 transition"
                            v-html="icons.pay"
                        />
                        <h3 class="mt-3 font-semibold">Payments & Receipts</h3>
                        <p class="mt-1 text-sm text-neutral-600">
                            View invoices, pay dues and download receipts.
                        </p>
                    </Link>

                    <Link
                        href="/receipts"
                        class="group p-5 rounded-2xl border border-neutral-200 bg-white hover:shadow-md hover:border-neutral-300 transition-all"
                    >
                        <div
                            class="inline-flex items-center justify-center h-10 w-10 rounded-xl bg-amber-50 text-amber-600 group-hover:scale-105 transition"
                            v-html="icons.receipt"
                        />
                        <h3 class="mt-3 font-semibold">Receipt Archive</h3>
                        <p class="mt-1 text-sm text-neutral-600">
                            Access all your historical payment receipts.
                        </p>
                    </Link>
                </div>
            </section>
        </main>
        <Footer />
    </div>
</template>
