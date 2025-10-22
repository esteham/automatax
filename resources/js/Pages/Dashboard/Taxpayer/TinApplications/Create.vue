<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import { ref } from "vue";

import Navbar from "@/Pages/Partials/Navbar.vue";
import Footer from "@/Pages/Partials/Footer.vue";

const props = defineProps({
    application: Object,
    profile: Object,
    user: Object,
});

const showSuccessModal = ref(false);

const form = useForm({
    circle: props.application?.circle ?? "",
    zone: props.application?.zone ?? "",
    assessment_year: props.application?.assessment_year ?? "",
    income: props.application?.income ?? "",
    source_of_income: props.application?.source_of_income ?? "",
    has_business: props.application?.has_business ?? false,
    business_name: props.application?.business_name ?? "",
    business_address: props.application?.business_address ?? "",
    business_type: props.application?.business_type ?? "",
    notes: props.application?.notes ?? "",

    // Files
    photo: null,
    bank_statement: null,
    utility_bill: null,
    other_documents: null,
});

function submit() {
    form.post(route("taxpayer.tin-applications.store"), {
        forceFormData: true,
        onSuccess: () => {
            showSuccessModal.value = true;
        },
    });
}

function closeModal() {
    showSuccessModal.value = false;
    // Optionally redirect to index
    window.location.href = route("taxpayer.tin-applications.index");
}
</script>

<template>
    <Head title="Apply for TIN" />
    <Navbar />

    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-8">
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900">
                    Apply for Taxpayer Identification Number (TIN)
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Fill in the required information to apply for your TIN.
                </p>
            </div>

            <!-- Profile Information Summary -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <h3 class="text-sm font-medium text-blue-900 mb-2">
                    Profile Information
                </h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-blue-700">Name:</span>
                        {{ user.name }}
                    </div>
                    <div>
                        <span class="text-blue-700">NID:</span>
                        {{ profile.nid }}
                    </div>
                    <div>
                        <span class="text-blue-700">Date of Birth:</span>
                        {{ profile.date_of_birth }}
                    </div>
                    <div>
                        <span class="text-blue-700">Occupation:</span>
                        {{ profile.occupation }}
                    </div>
                </div>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Tax Information -->
                <section>
                    <h2 class="text-lg font-medium text-gray-800 mb-4">
                        Tax Information
                    </h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Tax Circle <span class="text-red-500">*</span>
                            </label>
                            <input
                                v-model="form.circle"
                                class="input"
                                placeholder="Enter tax circle"
                                required
                            />
                            <div
                                v-if="form.errors.circle"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.circle }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Tax Zone <span class="text-red-500">*</span>
                            </label>
                            <input
                                v-model="form.zone"
                                class="input"
                                placeholder="Enter tax zone"
                                required
                            />
                            <div
                                v-if="form.errors.zone"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.zone }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Assessment Year
                                <span class="text-red-500">*</span>
                            </label>
                            <input
                                v-model="form.assessment_year"
                                class="input"
                                placeholder="e.g., 2024-2025"
                                required
                            />
                            <div
                                v-if="form.errors.assessment_year"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.assessment_year }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Annual Income (BDT)
                                <span class="text-red-500">*</span>
                            </label>
                            <input
                                v-model="form.income"
                                type="number"
                                class="input"
                                placeholder="Enter annual income"
                                required
                            />
                            <div
                                v-if="form.errors.income"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.income }}
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Source of Income
                                <span class="text-red-500">*</span>
                            </label>
                            <input
                                v-model="form.source_of_income"
                                class="input"
                                placeholder="e.g., Salary, Business, Investment"
                                required
                            />
                            <div
                                v-if="form.errors.source_of_income"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.source_of_income }}
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Business Information -->
                <section>
                    <div class="flex items-center mb-4">
                        <input
                            id="has_business"
                            v-model="form.has_business"
                            type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        />
                        <label
                            for="has_business"
                            class="ml-2 block text-sm text-gray-900"
                        >
                            I have a business
                        </label>
                    </div>

                    <div
                        v-if="form.has_business"
                        class="grid md:grid-cols-2 gap-4"
                    >
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Business Name
                            </label>
                            <input
                                v-model="form.business_name"
                                class="input"
                                placeholder="Enter business name"
                            />
                            <div
                                v-if="form.errors.business_name"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.business_name }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Business Type
                            </label>
                            <input
                                v-model="form.business_type"
                                class="input"
                                placeholder="e.g., Retail, Manufacturing"
                            />
                            <div
                                v-if="form.errors.business_type"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.business_type }}
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Business Address
                            </label>
                            <textarea
                                v-model="form.business_address"
                                class="input"
                                rows="3"
                                placeholder="Enter business address"
                            ></textarea>
                            <div
                                v-if="form.errors.business_address"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.business_address }}
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Supporting Documents -->
                <section>
                    <h2 class="text-lg font-medium text-gray-800 mb-4">
                        Supporting Documents
                    </h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Recent Photo <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="file"
                                @input="form.photo = $event.target.files[0]"
                                accept=".jpg,.jpeg,.png"
                                class="input"
                                required
                            />
                            <p class="text-xs text-gray-500 mt-1">
                                JPG, PNG (max 2MB)
                            </p>
                            <div
                                v-if="form.errors.photo"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.photo }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Bank Statement
                            </label>
                            <input
                                type="file"
                                @input="
                                    form.bank_statement = $event.target.files[0]
                                "
                                accept=".pdf,.jpg,.jpeg,.png"
                                class="input"
                            />
                            <p class="text-xs text-gray-500 mt-1">
                                PDF, JPG, PNG (max 4MB)
                            </p>
                            <div
                                v-if="form.errors.bank_statement"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.bank_statement }}
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Utility Bill
                            </label>
                            <input
                                type="file"
                                @input="
                                    form.utility_bill = $event.target.files[0]
                                "
                                accept=".pdf,.jpg,.jpeg,.png"
                                class="input"
                            />
                            <p class="text-xs text-gray-500 mt-1">
                                PDF, JPG, PNG (max 4MB)
                            </p>
                            <div
                                v-if="form.errors.utility_bill"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.utility_bill }}
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Other Documents (Optional)
                            </label>
                            <input
                                type="file"
                                @input="
                                    form.other_documents =
                                        $event.target.files[0]
                                "
                                accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"
                                class="input"
                            />
                            <p class="text-xs text-gray-500 mt-1">
                                PDF, JPG, PNG, DOC, DOCX (max 5MB)
                            </p>
                            <div
                                v-if="form.errors.other_documents"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.other_documents }}
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Notes -->
                <section>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Additional Notes (Optional)
                    </label>
                    <textarea
                        v-model="form.notes"
                        class="input"
                        rows="4"
                        placeholder="Any additional information you want to provide"
                    ></textarea>
                    <div
                        v-if="form.errors.notes"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.notes }}
                    </div>
                </section>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg transition-all duration-150"
                        :disabled="form.processing"
                    >
                        {{
                            form.processing
                                ? "Submitting..."
                                : "Submit Application"
                        }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div
        v-if="showSuccessModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-lg p-6 max-w-md mx-4">
            <div class="text-center">
                <div
                    class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4"
                >
                    <svg
                        class="h-6 w-6 text-green-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        ></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                    Application Submitted Successfully!
                </h3>
                <p class="text-sm text-gray-500 mb-4">
                    Your TIN application has been successful. Within 7 working
                    days, your information will be verified and your TIN
                    certificate will be ready.
                </p>
                <button
                    @click="closeModal"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-colors"
                >
                    Continue
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
