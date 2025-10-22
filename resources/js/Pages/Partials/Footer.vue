<script setup>
import { Link } from "@inertiajs/vue3";
import Logo from "@/Assets/Logo/AuthLogo.png";

const brandTo = route("dashboard");
</script>

<template>
    <footer
        class="relative z-10 bg-gradient-to-br from-black/90 via-gray-900/90 to-black/80 backdrop-blur-lg text-neutral-300 border-t border-gray-800"
    >
        <div class="max-w-7xl mx-auto px-6 py-14">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 border-b border-gray-800 pb-10"
            >
                <!-- Brand & About -->
                <div>
                    <Link
                        :href="brandTo"
                        class="flex items-center gap-3 mb-4 group"
                    >
                        <img
                            :src="Logo"
                            alt="AutomateX Logo"
                            class="h-12 transition-transform duration-200 group-hover:scale-105"
                        />
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent"
                        >
                            AutomateX
                        </span>
                    </Link>
                    <p class="text-sm text-neutral-400 leading-relaxed">
                        A modern tax automation platform designed to simplify
                        compliance, accelerate filings, and empower taxpayers in
                        Bangladesh.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">
                        Quick Links
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <Link
                                href="/"
                                class="hover:text-white transition-colors duration-150"
                                >Home</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/taxpayer/tin-applications"
                                class="hover:text-white transition-colors duration-150"
                                >TIN Applications</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/dashboard"
                                class="hover:text-white transition-colors duration-150"
                                >Dashboard</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/support"
                                class="hover:text-white transition-colors duration-150"
                                >Support</Link
                            >
                        </li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">
                        Resources
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <Link
                                href="/documentation"
                                class="hover:text-white transition-colors duration-150"
                                >Documentation</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/privacy"
                                class="hover:text-white transition-colors duration-150"
                                >Privacy Policy</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/terms"
                                class="hover:text-white transition-colors duration-150"
                                >Terms of Service</Link
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="hover:text-white transition-colors duration-150"
                                >System Status</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">
                        Contact
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li class="text-neutral-400">
                            📍 23/A, Kawran Bazar, Dhaka
                        </li>
                        <li>
                            📧
                            <a
                                href="mailto:support@automatex.com"
                                class="hover:text-white transition-colors"
                                >support@automatex.com</a
                            >
                        </li>
                        <li>📞 +880 1777 000 999</li>
                    </ul>
                    <div class="flex gap-4 mt-5">
                        <a
                            href="#"
                            class="text-neutral-400 hover:text-blue-400 transition-colors"
                        >
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a
                            href="#"
                            class="text-neutral-400 hover:text-sky-400 transition-colors"
                        >
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a
                            href="#"
                            class="text-neutral-400 hover:text-pink-400 transition-colors"
                        >
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a
                            href="#"
                            class="text-neutral-400 hover:text-blue-500 transition-colors"
                        >
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div
                class="mt-8 flex flex-col sm:flex-row items-center justify-between text-sm text-neutral-500"
            >
                <p>
                    © {{ new Date().getFullYear() }} AutomateX. All rights
                    reserved.
                </p>
                <p>
                    Crafted with by
                    <span class="text-white font-medium"
                        >AutomateX Dev Team</span
                    >
                </p>
            </div>
        </div>
    </footer>
</template>
