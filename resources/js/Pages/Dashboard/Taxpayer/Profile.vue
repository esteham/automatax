<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import { ref } from "vue";

import Navbar from "@/Pages/Partials/Navbar.vue";
import Footer from "@/Pages/Partials/Footer.vue";

const props = defineProps({ profile: Object });
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
}
</script>

<template>
    <Head title="Update Profile" />
    <Navbar />
    <div class="max-w-4xl mx-auto px-6">
        <div
            class="bg-white shadow-sm rounded-2xl border border-gray-100 p-8 space-y-10"
        >
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    Taxpayer KYC Profile
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Update your personal and identification information below.
                </p>
            </div>

            <!-- Personal Information -->
            <section>
                <h2 class="text-lg font-medium text-gray-800 mb-4">
                    Personal Information
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
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
                        placeholder="Spouse Name (if any)"
                    />
                    <select v-model="form.gender" class="input">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <input
                        v-model="form.date_of_birth"
                        type="date"
                        class="input"
                        placeholder="Date of Birth"
                    />
                    <input
                        v-model="form.occupation"
                        class="input"
                        placeholder="Occupation"
                    />
                </div>
            </section>

            <!-- Identification -->
            <section>
                <h2 class="text-lg font-medium text-gray-800 mb-4">
                    Identification
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <input
                        v-model="form.nid"
                        class="input"
                        placeholder="National ID (NID)"
                    />
                    <input
                        v-model="form.tin"
                        class="input"
                        placeholder="Tax ID (TIN)"
                    />
                    <input
                        v-model="form.alt_phone"
                        class="input"
                        placeholder="Alternate Phone"
                    />
                </div>
            </section>

            <!-- Address -->
            <section>
                <h2 class="text-lg font-medium text-gray-800 mb-4">Address</h2>
                <div class="grid md:grid-cols-2 gap-4">
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
                </div>
            </section>

            <!-- Documents -->
            <section>
                <h2 class="text-lg font-medium text-gray-800 mb-4">
                    Upload Documents
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="label">Profile Photo</label>
                        <input
                            type="file"
                            @change="(e) => (form.photo = e.target.files[0])"
                            class="file-input"
                        />
                    </div>
                    <div>
                        <label class="label">NID Front</label>
                        <input
                            type="file"
                            @change="
                                (e) => (form.nid_front = e.target.files[0])
                            "
                            class="file-input"
                        />
                    </div>
                    <div>
                        <label class="label">NID Back</label>
                        <input
                            type="file"
                            @change="(e) => (form.nid_back = e.target.files[0])"
                            class="file-input"
                        />
                    </div>
                    <div>
                        <label class="label">Utility Bill</label>
                        <input
                            type="file"
                            @change="
                                (e) => (form.utility_bill = e.target.files[0])
                            "
                            class="file-input"
                        />
                    </div>
                </div>
            </section>

            <!-- Submit -->
            <div class="flex justify-end">
                <button
                    @click="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg transition-all duration-150 disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="form.processing"
                >
                    {{ form.processing ? "Saving..." : "Save Profile" }}
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

.file-input {
    @apply block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500;
}

.label {
    @apply block text-sm font-medium text-gray-700 mb-1;
}
</style>
