<script setup>
import { Head, Link } from "@inertiajs/vue3";

import Navbar from "@/Pages/Partials/Navbar.vue";

// --- Demo data (replace with props or server data) ---
const queued = [
    { company: "Finlay Foods Ltd.", when: "Today, 3:10 PM" },
    { company: "Decent Retailers", when: "Today, 4:45 PM" },
    { company: "E‑Land Holdings", when: "Tomorrow, 10:00 AM" },
];

const features = [
    {
        title: "e‑TIN & Profiles",
        text: "Create, verify and manage e‑TIN profiles with KYC checks and role‑based access.",
        icon: "id",
        gradient: "from-purple-500 to-pink-500",
    },
    {
        title: "Smart VAT Returns",
        text: "Pre‑filled lines, anomaly detection and auto‑reconciliation with purchase/sales.",
        icon: "calculator",
        gradient: "from-blue-500 to-cyan-500",
    },
    {
        title: "e‑Challan & Payments",
        text: "Generate e‑Challans and track payment statuses with bank integrations.",
        icon: "file",
        gradient: "from-green-500 to-emerald-500",
    },
    {
        title: "Audit Trail",
        text: "Every action is signed and timestamped so reviews are painless.",
        icon: "shield",
        gradient: "from-orange-500 to-red-500",
    },
    {
        title: "Bulk Workflows",
        text: "Queue hundreds of filings with approvals and SLAs that fit your team.",
        icon: "stack",
        gradient: "from-indigo-500 to-purple-500",
    },
    {
        title: "APIs & OAuth 2.0",
        text: "Connect ERPs and data sources securely via Passport/OAuth 2.0.",
        icon: "link",
        gradient: "from-teal-500 to-blue-500",
    },
];

const steps = [
    {
        title: "Connect data",
        text: "Sync purchase, sales and ledger data from CSV or your ERP.",
        icon: "cloud-upload",
        number: "01",
    },
    {
        title: "Review & validate",
        text: "AutomateX flags anomalies and suggests fixes before filing.",
        icon: "shield-check",
        number: "02",
    },
    {
        title: "File securely",
        text: "Submit to portals and generate e‑Challan receipts instantly.",
        icon: "rocket",
        number: "03",
    },
];

const faqs = [
    {
        q: "Do I need a credit card to start?",
        a: "No. You can create an account and explore sandbox filings free.",
    },
    {
        q: "Is my data secure?",
        a: "Yes. We use TLS in transit, encryption at rest, and role‑based access with detailed audit logs.",
    },
    {
        q: "Can I import from Excel?",
        a: "Absolutely. Upload CSV/Excel or connect via API for automated syncs.",
    },
    {
        q: "Does it support Bangla?",
        a: "Yes. Interface and reports can be localized in Bangla and English.",
    },
];

const stats = [
    { value: "1,482", label: "Filed Returns", change: "+12%" },
    { value: "04m 12s", label: "Avg. Filing Time", change: "-23%" },
    { value: "0.2%", label: "Error Rate", change: "-68%" },
    { value: "৳3.2M", label: "Tax Saved", change: "+15%" },
];
</script>

<template>
    <div
        class="min-h-screen bg-white text-neutral-900 selection:bg-blue-100 selection:text-blue-900"
    >
        <Head title="AutomateX — Modern Tax Automation" />

        <!-- ====== Reusabe NAVBAR ====== -->
        <Navbar />

        <!-- ====== MODERN HERO SECTION ====== -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-white via-blue-50/30 to-purple-50/20"
        >
            <!-- Animated background elements -->
            <div class="absolute inset-0 -z-10">
                <div
                    class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl animate-pulse"
                ></div>
                <div
                    class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl animate-pulse delay-1000"
                ></div>
                <div
                    class="absolute top-1/2 right-1/3 w-64 h-64 bg-cyan-200/20 rounded-full blur-3xl animate-pulse delay-500"
                ></div>
            </div>

            <div
                class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-16 lg:pt-5 lg:pb-24"
            >
                <div class="grid lg:grid-cols-2 items-center gap-16">
                    <div class="relative">
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 backdrop-blur-sm border border-blue-200 text-blue-700 text-sm font-medium shadow-sm mb-8"
                        >
                            <div
                                class="size-2 bg-red-800 rounded-full animate-ping"
                            ></div>
                            &nbsp; New: End-to-end e‑Return automation
                        </div>

                        <!-- Main headline -->
                        <h1
                            class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-tight"
                        >
                            Tax Automation
                            <span
                                class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-cyan-600"
                            >
                                Reimagined
                            </span>
                        </h1>

                        <!-- Subheadline -->
                        <p
                            class="mt-6 text-lg text-neutral-600 max-w-xl leading-relaxed"
                        >
                            Streamline e‑TIN, VAT, and return filing for
                            Bangladesh businesses with AI-powered automation.
                            Secure, compliant, and built for speed.
                        </p>

                        <!-- CTA Buttons -->
                        <div class="mt-8 flex flex-wrap items-center gap-4">
                            <Link
                                href="/register"
                                class="group relative px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold shadow-2xl shadow-blue-500/25 hover:shadow-3xl hover:shadow-blue-500/30 transition-all duration-300 hover:scale-105"
                            >
                                <span class="relative z-10"
                                    >Start free trial</span
                                >
                                <div
                                    class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                ></div>
                            </Link>

                            <Link
                                href="/demo"
                                class="group px-6 py-4 rounded-2xl border-2 border-neutral-200 hover:border-blue-300 text-neutral-700 font-semibold hover:text-blue-600 transition-all duration-300 hover:scale-105"
                            >
                                <span class="flex items-center gap-2">
                                    <svg
                                        class="size-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    Watch demo
                                </span>
                            </Link>
                        </div>

                        <!-- Trust indicators -->
                        <div
                            class="mt-8 flex items-center gap-6 text-sm text-neutral-500"
                        >
                            <div class="flex items-center gap-2">
                                <svg
                                    class="size-5 text-green-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    />
                                </svg>
                                <span>Bank-grade security</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg
                                    class="size-5 text-blue-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                                    />
                                </svg>
                                <span>OAuth 2.0 & APIs</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard preview -->
                    <div class="relative">
                        <div
                            class="relative rounded-3xl bg-white/80 backdrop-blur-xl border border-white/50 shadow-2xl shadow-blue-500/10 hover:shadow-3xl hover:shadow-blue-500/20 transition-all duration-500 transform hover:scale-101"
                        >
                            <!-- MacOS-style window controls -->
                            <div
                                class="flex items-center gap-2 p-6 border-b border-neutral-100"
                            >
                                <div class="flex gap-2">
                                    <div
                                        class="size-3 rounded-full bg-red-400"
                                    ></div>
                                    <div
                                        class="size-3 rounded-full bg-yellow-400"
                                    ></div>
                                    <div
                                        class="size-3 rounded-full bg-green-400"
                                    ></div>
                                </div>
                                <div class="flex-1 text-center">
                                    <span
                                        class="text-sm font-semibold text-neutral-600"
                                        >AutomateX Dashboard</span
                                    >
                                </div>
                            </div>

                            <div class="p-6">
                                <!-- Stats grid -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div
                                        v-for="stat in stats"
                                        :key="stat.label"
                                        class="p-4 rounded-xl bg-gradient-to-br from-white to-neutral-50/80 border border-neutral-100 hover:border-blue-200 transition-colors"
                                    >
                                        <div
                                            class="text-2xl font-bold text-neutral-900"
                                        >
                                            {{ stat.value }}
                                        </div>
                                        <div
                                            class="text-sm text-neutral-600 mt-1"
                                        >
                                            {{ stat.label }}
                                        </div>
                                        <div
                                            class="text-xs font-medium mt-2"
                                            :class="
                                                stat.change.startsWith('+')
                                                    ? 'text-green-600'
                                                    : 'text-red-600'
                                            "
                                        >
                                            {{ stat.change }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Charts and queue -->
                                <div class="mt-6 grid lg:grid-cols-2 gap-6">
                                    <!-- Activity chart -->
                                    <div
                                        class="rounded-2xl bg-gradient-to-br from-white to-blue-50/50 border border-blue-100 p-4"
                                    >
                                        <h4
                                            class="font-semibold text-neutral-900 mb-4"
                                        >
                                            Weekly Activity
                                        </h4>
                                        <div class="h-32 flex items-end gap-1">
                                            <div
                                                v-for="(h, i) in [
                                                    18, 34, 22, 46, 38, 54, 48,
                                                ]"
                                                :key="i"
                                                class="flex-1 bg-gradient-to-t from-blue-500 to-cyan-400 rounded-t-lg transition-all duration-500 hover:scale-105"
                                                :style="{ height: h + '%' }"
                                            ></div>
                                        </div>
                                    </div>

                                    <!-- Queue -->
                                    <div
                                        class="rounded-2xl bg-gradient-to-br from-white to-purple-50/50 border border-purple-100 p-4"
                                    >
                                        <h4
                                            class="font-semibold text-neutral-900 mb-4"
                                        >
                                            Queued Filings
                                        </h4>
                                        <div class="space-y-3">
                                            <div
                                                v-for="(q, i) in queued"
                                                :key="i"
                                                class="flex items-center justify-between p-3 rounded-lg bg-white/50 hover:bg-white transition-colors"
                                            >
                                                <div
                                                    class="flex items-center gap-3"
                                                >
                                                    <div
                                                        class="size-2 bg-green-500 rounded-full animate-pulse"
                                                    ></div>
                                                    <span
                                                        class="font-medium text-sm text-neutral-900"
                                                        >{{ q.company }}</span
                                                    >
                                                </div>
                                                <span
                                                    class="text-xs text-neutral-500"
                                                    >{{ q.when }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating elements -->
                        <div class="absolute -bottom-6 -left-6 hidden lg:block">
                            <div
                                class="bg-white/90 backdrop-blur-xl rounded-2xl border border-green-200 p-4 shadow-2xl shadow-green-500/10 animate-float"
                            >
                                <div
                                    class="flex items-center gap-2 text-green-600"
                                >
                                    <svg
                                        class="size-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    <span class="text-sm font-semibold"
                                        >Smart check completed</span
                                    >
                                </div>
                                <p class="text-xs text-neutral-600 mt-1">
                                    3 anomalies fixed automatically
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== MODERN FEATURES SECTION ====== -->
        <section id="features" class="py-20 lg:py-32 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">
                        Built for
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600"
                            >Modern Tax Teams</span
                        >
                    </h2>
                    <p class="mt-4 text-lg text-neutral-600 leading-relaxed">
                        Everything you need for compliant filings in Bangladesh,
                        powered by intelligent automation and real-time
                        validation.
                    </p>
                </div>

                <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-for="feature in features"
                        :key="feature.title"
                        class="group relative p-8 rounded-3xl bg-gradient-to-br from-white to-neutral-50/80 border border-neutral-100 hover:border-transparent hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 transform hover:-translate-y-2"
                    >
                        <!-- Gradient overlay on hover -->
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-br opacity-0 group-hover:opacity-5 transition-opacity duration-500"
                            :class="
                                feature.gradient
                                    .replace('from-', 'from-')
                                    .replace('to-', 'to-')
                            "
                        ></div>

                        <!-- Icon -->
                        <div
                            class="size-14 rounded-2xl bg-gradient-to-br shadow-lg mb-6 flex items-center justify-center text-white"
                            :class="feature.gradient"
                        >
                            <svg
                                class="size-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                />
                            </svg>
                        </div>

                        <!-- Content -->
                        <h3 class="text-xl font-bold text-neutral-900">
                            {{ feature.title }}
                        </h3>
                        <p class="mt-3 text-neutral-600 leading-relaxed">
                            {{ feature.text }}
                        </p>

                        <!-- Hover arrow -->
                        <div
                            class="absolute bottom-6 right-6 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                        >
                            <svg
                                class="size-5 text-blue-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== MODERN HOW IT WORKS ====== -->
        <section
            id="how"
            class="py-20 lg:py-32 bg-gradient-to-br from-neutral-50 via-blue-50/30 to-purple-50/20"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">
                        Simple, Fast,
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600"
                            >Automated</span
                        >
                    </h2>
                    <p class="mt-4 text-lg text-neutral-600 leading-relaxed">
                        From data to filed returns in three seamless steps.
                        Focus on your business while we handle the compliance.
                    </p>
                </div>

                <div class="mt-16 relative">
                    <!-- Connecting line -->
                    <div
                        class="absolute top-1/2 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-cyan-500/20 transform -translate-y-1/2 hidden lg:block"
                    ></div>

                    <div class="grid lg:grid-cols-3 gap-8">
                        <div
                            v-for="step in steps"
                            :key="step.title"
                            class="relative group text-center p-8 rounded-3xl bg-white/80 backdrop-blur-sm border border-white/50 shadow-xl hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 transform hover:-translate-y-2"
                        >
                            <!-- Step number -->
                            <div
                                class="absolute -top-4 left-1/2 transform -translate-x-1/2 size-12 rounded-2xl bg-gradient-to-br from-blue-600 to-purple-600 text-white font-black text-lg flex items-center justify-center shadow-lg"
                            >
                                {{ step.number }}
                            </div>

                            <!-- Icon -->
                            <div
                                class="size-20 mx-auto rounded-2xl bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500"
                            >
                                <svg
                                    class="size-8 text-blue-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                    />
                                </svg>
                            </div>

                            <!-- Content -->
                            <h3 class="text-xl font-bold text-neutral-900">
                                {{ step.title }}
                            </h3>
                            <p class="mt-3 text-neutral-600 leading-relaxed">
                                {{ step.text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== MODERN CTA SECTION ====== -->
        <section class="relative py-20 lg:py-32 overflow-hidden">
            <!-- Background gradient -->
            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-600 via-purple-600 to-cyan-600"
            ></div>

            <!-- Animated orbs -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="absolute -top-1/2 -left-1/4 w-1/2 h-1/2 bg-white/5 rounded-full blur-3xl animate-pulse"
                ></div>
                <div
                    class="absolute -bottom-1/2 -right-1/4 w-1/2 h-1/2 bg-white/5 rounded-full blur-3xl animate-pulse delay-1000"
                ></div>
            </div>

            <div
                class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center"
            >
                <h2
                    class="text-4xl sm:text-5xl font-black text-white tracking-tight"
                >
                    Ready to Transform Your
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-200 to-blue-200"
                        >Tax Workflow?</span
                    >
                </h2>
                <p
                    class="mt-4 text-xl text-blue-100/80 max-w-2xl mx-auto leading-relaxed"
                >
                    Join hundreds of businesses automating their tax compliance.
                    Start free today with no credit card required.
                </p>

                <div
                    class="mt-8 flex flex-col sm:flex-row gap-4 justify-center items-center"
                >
                    <Link
                        href="/register"
                        class="group relative px-8 py-4 rounded-2xl bg-white text-blue-600 font-bold shadow-2xl shadow-blue-900/30 hover:shadow-3xl hover:shadow-blue-900/40 transition-all duration-300 hover:scale-105"
                    >
                        <span class="relative z-10">Start free trial</span>
                        <div
                            class="absolute inset-0 rounded-2xl bg-gradient-to-r from-white to-blue-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        ></div>
                    </Link>

                    <Link
                        href="/demo"
                        class="px-6 py-4 rounded-2xl border-2 border-blue-400 text-white font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105"
                    >
                        Schedule a demo
                    </Link>
                </div>

                <p class="mt-6 text-sm text-blue-200/60">
                    No credit card required • 14-day free trial • Cancel anytime
                </p>
            </div>
        </section>

        <!-- ====== MODERN FAQ SECTION ====== -->
        <section id="faq" class="py-20 lg:py-32 bg-white">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto">
                    <h2 class="text-4xl sm:text-5xl font-black tracking-tight">
                        Frequently Asked
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600"
                            >Questions</span
                        >
                    </h2>
                    <p class="mt-4 text-lg text-neutral-600 leading-relaxed">
                        Everything you need to know about AutomateX. Can't find
                        the answer? Contact our team.
                    </p>
                </div>

                <div class="mt-16 space-y-6">
                    <div
                        v-for="(faq, index) in faqs"
                        :key="index"
                        class="group rounded-2xl bg-gradient-to-br from-white to-neutral-50/80 border border-neutral-100 hover:border-blue-200 p-8 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/5"
                    >
                        <h3
                            class="text-lg font-bold text-neutral-900 flex items-center justify-between cursor-pointer"
                        >
                            {{ faq.q }}
                            <svg
                                class="size-5 text-blue-600 transform group-hover:rotate-180 transition-transform duration-300"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </h3>
                        <p class="mt-3 text-neutral-600 leading-relaxed">
                            {{ faq.a }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== MODERN FOOTER ====== -->
        <footer
            class="py-12 bg-gradient-to-br from-neutral-50 to-white border-t border-neutral-100"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="flex flex-col lg:flex-row items-center justify-between gap-8"
                >
                    <!-- Brand -->
                    <div class="flex items-center gap-3">
                        <div
                            class="size-10 grid place-items-center rounded-2xl bg-gradient-to-br from-blue-600 to-purple-600 text-white font-bold shadow-lg"
                        >
                            <svg
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                />
                            </svg>
                        </div>
                        <div>
                            <div
                                class="font-bold text-lg bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"
                            >
                                AutomateX
                            </div>
                            <div class="text-sm text-neutral-600">
                                Modern tax automation
                            </div>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="flex items-center gap-8 text-sm">
                        <Link
                            href="/privacy"
                            class="text-neutral-600 hover:text-blue-600 transition-colors"
                            >Privacy</Link
                        >
                        <Link
                            href="/terms"
                            class="text-neutral-600 hover:text-blue-600 transition-colors"
                            >Terms</Link
                        >
                        <a
                            href="#"
                            class="text-neutral-600 hover:text-blue-600 transition-colors"
                            >Status</a
                        >
                        <a
                            href="#"
                            class="text-neutral-600 hover:text-blue-600 transition-colors"
                            >Documentation</a
                        >
                    </div>

                    <!-- Copyright -->
                    <div class="text-sm text-neutral-500">
                        © {{ new Date().getFullYear() }} AutomateX. All rights
                        reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
@keyframes float {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}
</style>
