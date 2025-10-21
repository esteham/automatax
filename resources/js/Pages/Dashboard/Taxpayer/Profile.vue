<script setup>
import { useForm } from "@inertiajs/vue3";

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
    <div class="max-w-3xl mx-auto p-6 space-y-6">
        <h1 class="text-xl font-semibold">Taxpayer Profile (KYC)</h1>

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
            <input v-model="form.nid" class="input" placeholder="NID" />
            <input v-model="form.tin" class="input" placeholder="TIN" />
            <input
                v-model="form.occupation"
                class="input"
                placeholder="Occupation"
            />
            <input
                v-model="form.alt_phone"
                class="input"
                placeholder="Alternate Phone"
            />
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

        <div class="grid md:grid-cols-2 gap-4">
            <input
                type="file"
                @change="(e) => (form.photo = e.target.files[0])"
            />
            <input
                type="file"
                @change="(e) => (form.nid_front = e.target.files[0])"
            />
            <input
                type="file"
                @change="(e) => (form.nid_back = e.target.files[0])"
            />
            <input
                type="file"
                @change="(e) => (form.utility_bill = e.target.files[0])"
            />
        </div>

        <button
            @click="submit"
            class="px-4 py-2 rounded bg-black text-white"
            :disabled="form.processing"
        >
            Save
        </button>
    </div>
</template>

<style>
.input {
    @apply border rounded px-3 py-2 w-full;
}
</style>
