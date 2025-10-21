<script setup>
import { ref, computed } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";
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

const page = usePage();
const user = computed(() => page.props?.auth?.user || null);
const isAuthed = computed(() => !!user.value);

const mobileOpen = ref(false);
const userMenuOpen = ref(false);

const initials = computed(() => {
    const name = user.value?.name || user.value?.email || "U";
    return name
        .split(" ")
        .map((p) => p[0])
        .join("")
        .slice(0, 2)
        .toUpperCase();
});

const logout = () => {
    router.post("/logout", {}, { preserveScroll: true });
    userMenuOpen.value = false;
};
</script>

<template>
    <header
        class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-neutral-100"
    >
        <nav
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 md:h-20 flex items-center justify-between"
        >
            <!-- Brand -->
            <Link :href="brandTo" class="flex items-center gap-3 group">
                <img :src="Logo" alt="Logo" class="h-9 md:h-12" />
                <span
                    class="font-extrabold text-lg md:text-xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent group-hover:opacity-90"
                    >AutomateX</span
                >
            </Link>

            <!-- Center links (desktop) -->
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
            <div class="hidden md:flex items-center gap-3">
                <!-- When NOT authenticated -->
                <template v-if="!isAuthed">
                    <NavLink
                        href="/login"
                        :active="$page.url.startsWith('/login')"
                    >
                        Sign in
                    </NavLink>
                    <Link
                        href="/register"
                        class="px-5 py-2.5 rounded-2xl bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transition-all duration-200 hover:scale-[1.02]"
                    >
                        Get started
                    </Link>
                </template>

                <!-- When authenticated -->
                <template v-else>
                    <NavLink
                        href="/dashboard"
                        :active="$page.url.startsWith('/dashboard')"
                    >
                        Dashboard
                    </NavLink>

                    <!-- User menu -->
                    <div class="relative">
                        <button
                            @click="userMenuOpen = !userMenuOpen"
                            class="flex items-center gap-3 px-3 py-2 rounded-xl border border-neutral-200 hover:bg-neutral-50 transition"
                        >
                            <span
                                class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-purple-600 text-white text-xs font-bold"
                                >{{ initials }}</span
                            >
                            <span
                                class="hidden lg:block text-sm font-medium text-neutral-800"
                            >
                                {{ user?.name || user?.email }}
                            </span>
                            <svg
                                class="h-4 w-4 text-neutral-500"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>

                        <div
                            v-show="userMenuOpen"
                            @click.outside="userMenuOpen = false"
                            class="absolute right-0 mt-2 w-56 rounded-2xl border border-neutral-200 bg-white shadow-lg overflow-hidden"
                        >
                            <div class="px-4 py-3 border-b border-neutral-100">
                                <p class="text-sm text-neutral-500">
                                    Signed in as
                                </p>
                                <p class="text-sm font-semibold truncate">
                                    {{ user?.email || user?.name }}
                                </p>
                            </div>
                            <div class="py-1">
                                <NavLink class="block px-4 py-2" href="/profile"
                                    >Profile</NavLink
                                >
                                <NavLink
                                    class="block px-4 py-2"
                                    href="/settings"
                                    >Settings</NavLink
                                >
                                <hr class="my-1" />
                                <button
                                    @click="logout"
                                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50"
                                >
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Mobile toggle -->
            <button
                class="md:hidden p-2 rounded-lg border border-neutral-200"
                @click="mobileOpen = !mobileOpen"
                aria-label="Toggle menu"
            >
                <svg
                    v-if="!mobileOpen"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <path
                        d="M4 6h16M4 12h16M4 18h16"
                        stroke="currentColor"
                        stroke-width="2"
                    />
                </svg>
                <svg v-else class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M6 6l12 12M18 6l-12 12"
                        stroke="currentColor"
                        stroke-width="2"
                    />
                </svg>
            </button>
        </nav>

        <!-- Mobile menu -->
        <div
            v-show="mobileOpen"
            class="md:hidden border-t border-neutral-100 bg-white"
        >
            <div class="px-4 py-3 space-y-1">
                <template v-for="(l, i) in links" :key="'m' + i">
                    <a
                        v-if="l.href.startsWith('#')"
                        :href="l.href"
                        class="block px-3 py-2 rounded-lg hover:bg-neutral-50 text-neutral-700"
                        @click="mobileOpen = false"
                    >
                        {{ l.label }}
                    </a>
                    <NavLink
                        v-else
                        :href="l.href"
                        class="block px-3 py-2"
                        :active="l.match ? l.match($page.url) : undefined"
                        @click="mobileOpen = false"
                    >
                        {{ l.label }}
                    </NavLink>
                </template>

                <div class="pt-2 border-t border-neutral-100">
                    <template v-if="!isAuthed">
                        <NavLink href="/login" class="block px-3 py-2"
                            >Sign in</NavLink
                        >
                        <Link
                            href="/register"
                            class="block text-center mt-2 px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium"
                            @click="mobileOpen = false"
                            >Get started</Link
                        >
                    </template>
                    <template v-else>
                        <NavLink href="/dashboard" class="block px-3 py-2"
                            >Dashboard</NavLink
                        >
                        <NavLink href="/profile" class="block px-3 py-2"
                            >Profile</NavLink
                        >
                        <button
                            @click="
                                logout;
                                mobileOpen = false;
                            "
                            class="w-full text-left px-3 py-2 rounded-lg text-red-600 hover:bg-red-50"
                        >
                            Logout
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </header>
</template>
