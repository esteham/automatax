<script setup>
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Mail, Lock } from "lucide-vue-next";

import Logo from "@/Assets/Logo/AuthLogo.png";
import Navbar from "@/Pages/Partials/Navbar.vue";
import Footer from "@/Pages/Partials/Footer.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

/*------Show password-------*/
const showPassword = ref(false);

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />
    <Navbar />

    <div
        class="flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-indigo-100 px-6"
    >
        <div
            class="w-full max-w-md bg-white/90 backdrop-blur-lg rounded-2xl shadow-xl p-8 my-20 border border-indigo-100 animate-fade-in"
        >
            <div class="text-center mb-6">
                <img :src="Logo" alt="Logo" class="h-12 w-auto mx-auto mb-2" />
                <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-gray-500 text-sm">Sign in to your account</p>
            </div>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700 mb-1"
                        >Email</label
                    >
                    <div class="relative">
                        <Mail
                            class="absolute left-3 top-3 h-5 w-5 text-gray-400 pointer-events-none"
                        />
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            placeholder="you@example.com"
                            class="pl-10 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                            autofocus
                        />
                    </div>
                    <p
                        v-if="form.errors.email"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.email }}
                    </p>
                </div>

                <div>
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700 mb-1"
                        >Password</label
                    >
                    <div class="relative">
                        <Lock
                            class="absolute left-3 top-3 h-5 w-5 text-gray-400 pointer-events-none"
                        />
                        <input
                            id="password"
                            :type="showPassword ? 'text' : 'password'"
                            v-model="form.password"
                            placeholder="••••••••"
                            class="pl-10 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        <!-- Toggle button-->
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-gray-500"
                        >
                            {{ showPassword ? "Hide" : "Show" }}
                        </button>
                    </div>
                    <p
                        v-if="form.errors.password"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.password }}
                    </p>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2">
                        <input
                            type="checkbox"
                            v-model="form.remember"
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                        />
                        <span class="text-gray-600">Remember me</span>
                    </label>

                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-indigo-600 hover:text-indigo-500"
                        >Forgot password?</Link
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-medium transition disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="form.processing"
                >
                    {{ form.processing ? "Signing in..." : "Sign In" }}
                </button>

                <div
                    v-if="status"
                    class="text-sm text-green-600 text-center mt-4"
                >
                    {{ status }}
                </div>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Don’t have an account?
                <Link
                    href="/register"
                    class="text-indigo-600 hover:text-indigo-500"
                    >Sign up</Link
                >
            </p>
        </div>
    </div>
    <Footer />
</template>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in {
    animation: fade-in 0.6s ease-out both;
}
</style>
