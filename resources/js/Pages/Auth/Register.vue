<script setup>
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import Logo from "@/Assets/Logo/AuthLogo.png";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

/*------Show password-------*/
const showPassword = ref(false);

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-indigo-100 px-6"
    >
        <div
            class="w-full max-w-md bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-8 border border-indigo-100 animate-fade-in"
        >
            <div class="text-center mb-6">
                <img :src="Logo" alt="Logo" class="h-12 w-auto mx-auto mb-2" />
                <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                <p class="text-gray-500 text-sm">
                    Join us and start your journey
                </p>
            </div>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700 mb-1"
                        >Name</label
                    >
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        placeholder="Your full name"
                        class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <p
                        v-if="form.errors.name"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.name }}
                    </p>
                </div>

                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700 mb-1"
                        >Email</label
                    >
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        placeholder="you@example.com"
                        class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                        autocomplete="username"
                    />
                    <p
                        v-if="form.errors.email"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.email }}
                    </p>
                </div>

                <div class="relative mt-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700 mb-1"
                        >Password</label
                    >

                    <input
                        id="password"
                        v-model="form.password"
                        :type="showPassword ? 'text' : 'password'"
                        placeholder="••••••••"
                        class="pl-4 pr-16 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                        autocomplete="new-password"
                    />

                    <p
                        v-if="form.errors.password"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.password }}
                    </p>
                </div>

                <div class="relative mt-4">
                    <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 mb-1"
                        >Confirm Password</label
                    >
                    <input
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        :type="showPassword ? 'text' : 'password'"
                        placeholder="••••••••"
                        class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                        autocomplete="new-password"
                    />
                    <!-- Toggle button inside input -->
                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute right-3 top-2/3 -translate-y-1/2 text-sm text-gray-500 hover:text-gray-700"
                    >
                        {{ showPassword ? "Hide" : "Show" }}
                    </button>
                    <p
                        v-if="form.errors.password_confirmation"
                        class="text-sm text-red-600 mt-1"
                    >
                        {{ form.errors.password_confirmation }}
                    </p>
                </div>

                <div
                    v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
                    class="flex items-start space-x-2"
                >
                    <input
                        type="checkbox"
                        v-model="form.terms"
                        id="terms"
                        class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mt-1"
                        required
                    />
                    <label for="terms" class="text-sm text-gray-600">
                        I agree to the
                        <a
                            :href="route('terms.show')"
                            target="_blank"
                            class="text-indigo-600 hover:text-indigo-500 underline"
                            >Terms of Service</a
                        >
                        and
                        <a
                            :href="route('policy.show')"
                            target="_blank"
                            class="text-indigo-600 hover:text-indigo-500 underline"
                            >Privacy Policy</a
                        >.
                    </label>
                </div>
                <p v-if="form.errors.terms" class="text-sm text-red-600 mt-1">
                    {{ form.errors.terms }}
                </p>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-medium transition disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="form.processing"
                >
                    {{ form.processing ? "Registering..." : "Register" }}
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Already registered?
                <Link
                    href="/login"
                    class="text-indigo-600 hover:text-indigo-500 font-medium"
                    >Sign in</Link
                >
            </p>
        </div>
    </div>
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
