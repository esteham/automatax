<script setup>
import { Link } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import Logo from "@/Assets/Logo/AuthLogo.png";

const props = defineProps({
    brandTo: { type: String, default: "/" },
    links: {
        type: Array,
        default: () => [
            { label: "Features", href: "#features" },
            { label: "How it works", href: "#how" },
            { label: "FAQ", href: "#faq" },

            {
                label: "Contact",
                href: "/contact",
                match: (url) => url.startsWith("/contact"),
            },
        ],
    },
});
</script>

<template>
    <header
        class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-neutral-100"
    >
        <nav
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between"
        >
            <!-- Brand -->
            <Link :href="brandTo" class="flex items-center gap-3">
                <img :src="Logo" alt="Logo" class="h-12 mx-auto mb-2" />
                <span
                    class="font-bold text-xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"
                    >AutomateX</span
                >
            </Link>

            <!-- Center links -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <template v-for="(l, i) in links" :key="i">
                    <a
                        v-if="l.href.startsWith('#')"
                        :href="l.href"
                        class="text-neutral-700 hover:text-blue-600 transition-colors"
                    >
                        {{ l.label }}
                    </a>
                    <NavLink
                        v-else
                        :href="l.href"
                        :active="l.match ? l.match($page.url) : undefined"
                    >
                        {{ l.label }}
                    </NavLink>
                </template>
            </div>

            <!-- Right side -->
            <div class="flex items-center gap-3">
                <NavLink href="/login" :active="$page.url.startsWith('/login')"
                    >Sign in</NavLink
                >
                <Link
                    href="/register"
                    class="px-6 py-2.5 rounded-2xl bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transition-all duration-200 hover:scale-105"
                >
                    Get started
                </Link>
            </div>
        </nav>
    </header>
</template>
