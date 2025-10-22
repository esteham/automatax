<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import { ref } from "vue";

import Navbar from "@/Pages/Partials/Navbar.vue";
import Footer from "@/Pages/Partials/Footer.vue";

const props = defineProps({ profile: Object });

// Edit mode toggle
const isEditing = ref(false);

const form = useForm({
    first_name: props.profile?.first_name ?? "",
    last_name: props.profile?.last_name ?? "",
    father_name: props.profile?.father_name ?? "",
    mother_name: props.profile?.mother_name ?? "",
    spouse_name: props.profile?.spouse_name ?? "",
    gender: props.profile?.gender ?? "",
    date_of_birth: props.profile?.date_of_birth ?? "",
    nid: props.profile?.nid ?? "",
    tin: props.profile?.tin ?? "",
    occupation: props.profile?.occupation ?? "",
    alt_phone: props.profile?.alt_phone ?? "",
    present_address_line: props.profile?.present_address_line ?? "",
    present_post_code: props.profile?.present_post_code ?? "",
    permanent_address_line: props.profile?.permanent_address_line ?? "",
    permanent_post_code: props.profile?.permanent_post_code ?? "",
    photo: null,
    nid_front: null,
    nid_back: null,
    utility_bill: null,
});

function submit() {
    form.post(route("taxpayer.profile.update"), { forceFormData: true });
    isEditing.value = false; // Save হলে আবার ভিউ মোডে ফেরা
}
</script>

<template>
    <Head title="Profile" />
    <Navbar />

    <div class="max-w-4xl mx-auto px-6">
        <div
            class="bg-white shadow-sm rounded-2xl border border-gray-100 p-8 space-y-10"
        >
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        Taxpayer KYC Profile
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        View or update your personal information.
                    </p>
                </div>
                <button
                    @click="isEditing = !isEditing"
                    class="px-4 py-2 rounded-lg text-sm font-medium text-white transition-all"
                    :class="
                        isEditing
                            ? 'bg-gray-500 hover:bg-gray-600'
                            : 'bg-indigo-600 hover:bg-indigo-700'
                    "
                >
                    {{ isEditing ? "Cancel" : "Edit Profile" }}
                </button>
            </div>

            <!-- Personal Information -->
            <section>
                <h2 class="text-lg font-medium text-gray-800 mb-4">
                    Personal Information
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <template v-if="isEditing">
                        <input
                            v-model="form.first_name"
                            class="input"
                            placeholder="First Name"
                        />
                        <input
                            v-model="form.last_name"
                            class="input"
                            placeholder="Last Name"
                        />
                        <input
                            v-model="form.father_name"
                            class="input"
                            placeholder="Father’s Name"
                        />
                        <input
                            v-model="form.mother_name"
                            class="input"
                            placeholder="Mother’s Name"
                        />
                        <input
                            v-model="form.spouse_name"
                            class="input"
                            placeholder="Spouse Name"
                        />
                        <select v-model="form.gender" class="input">
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                        <input
                            v-model="form.date_of_birth"
                            type="date"
                            class="input"
                        />
                        <input
                            v-model="form.occupation"
                            class="input"
                            placeholder="Occupation"
                        />
                    </template>

                    <!-- Read-only view -->
                    <template v-else>
                        <p>
                            <strong>First Name:</strong> {{ form.first_name }}
                        </p>
                        <p><strong>Last Name:</strong> {{ form.last_name }}</p>
                        <p>
                            <strong>Father’s Name:</strong>
                            {{ form.father_name }}
                        </p>
                        <p>
                            <strong>Mother’s Name:</strong>
                            {{ form.mother_name }}
                        </p>
                        <p>
                            <strong>Spouse Name:</strong> {{ form.spouse_name }}
                        </p>
                        <p><strong>Gender:</strong> {{ form.gender }}</p>
                        <p>
                            <strong>Date of Birth:</strong>
                            {{ form.date_of_birth }}
                        </p>
                        <p>
                            <strong>Occupation:</strong> {{ form.occupation }}
                        </p>
                    </template>
                </div>
            </section>

            <!-- Address -->
            <section>
                <h2 class="text-lg font-medium text-gray-800 mb-4">Address</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <template v-if="isEditing">
                        <input
                            v-model="form.present_address_line"
                            class="input"
                            placeholder="Present Address"
                        />
                        <input
                            v-model="form.present_post_code"
                            class="input"
                            placeholder="Present Post Code"
                        />
                        <input
                            v-model="form.permanent_address_line"
                            class="input"
                            placeholder="Permanent Address"
                        />
                        <input
                            v-model="form.permanent_post_code"
                            class="input"
                            placeholder="Permanent Post Code"
                        />
                    </template>
                    <template v-else>
                        <p>
                            <strong>Present Address:</strong>
                            {{ form.present_address_line }}
                        </p>
                        <p>
                            <strong>Present Post Code:</strong>
                            {{ form.present_post_code }}
                        </p>
                        <p>
                            <strong>Permanent Address:</strong>
                            {{ form.permanent_address_line }}
                        </p>
                        <p>
                            <strong>Permanent Post Code:</strong>
                            {{ form.permanent_post_code }}
                        </p>
                    </template>
                </div>
            </section>

            <!-- Submit Button -->
            <div class="flex justify-end" v-if="isEditing">
                <button
                    @click="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg transition-all duration-150"
                    :disabled="form.processing"
                >
                    {{ form.processing ? "Saving..." : "Save Changes" }}
                </button>
            </div>
        </div>
    </div>

    <Footer />
</template>

<style scoped>
.input {
    @apply border border-gray-300 rounded-lg px-3 py-2.5 w-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500;
}
</style>
