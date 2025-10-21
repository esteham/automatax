<script setup>
import { Link } from "@inertiajs/vue3";

import Logo from "@/Assets/Logo/AuthLogo.png";
</script>

<template>
    <footer
        class="py-12 bg-gradient-to-br from-neutral-50 to-white border-t border-neutral-100"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col lg:flex-row items-center justify-between gap-8"
            >
                <!-- Brand -->
                <Link :href="brandTo" class="flex items-center gap-3">
                    <div class="flex items-center gap-3">
                        <img :src="Logo" alt="" class="h-14" />
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
                </Link>

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
</template>
