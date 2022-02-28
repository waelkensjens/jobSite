<template>

    <h1 class="text-3xl">Edit Company</h1>

    <div class="text-right float-right mb-10 pb-10">
        <button
            @click="deleteCompany"
            type="submit" class="w-90 flex justify-center
                             py-2 px-4 border border-transparent
                              rounded-md shadow-sm text-sm font-medium text-white
                     bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                      focus:ring-offset-2 focus:ring-indigo-500">
            Delete
        </button>
    </div>

    <div class="mt-8 pt-8 sm:mx-auto sm:w-full w-full">
        <div class="bg-white py-8 px-6 border border-gray-300 shadow rounded-lg sm:px-10">
            <form
                @submit.prevent="submit"
                class="mb-0 space-y-6" >
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">name</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="name"
                            id="name" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="nameError" class="text-sm text-red-600">{{ nameError }}</span>
                    </div>
                </div>
                <div>
                    <label for="vat" class="block text-sm font-medium text-gray-700">vat</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="vat"
                            id="vat" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="vatError" class="text-sm text-red-600">{{ vatError }}</span>
                    </div>
                </div>
                <div>
                    <label for="street" class="block text-sm font-medium text-gray-700">street</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="street"
                            id="street" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="streetError" class="text-sm text-red-600">{{ streetError }}</span>
                    </div>
                </div>
                <div>
                    <label for="number" class="block text-sm font-medium text-gray-700">number</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="number"
                            id="number" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="numberError" class="text-sm text-red-600">{{ numberError }}</span>
                    </div>
                </div>
                <div>
                    <label for="city" class="block text-sm font-medium">city</label>
                    <div class="mt-1 w-1/4">
                        <select
                            v-model="city"
                            name="city"
                            id="city"
                            class="w-full  border border-gray-300 rounded-lg shadow-sm"
                        >
                            <option v-for="city in props.cities">{{ city.name }}</option>
                        </select>
                    </div>
                    <span v-if="cityError" class="text-sm text-red-600">{{ cityError }}</span>

                </div>

                <div>
                    <button type="submit" class="w-1/4 flex justify-center
                             py-2 px-4 border border-transparent
                              rounded-md shadow-sm text-sm font-medium text-white
                     bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                      focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import Layout from "../../../Shared/Layout";
import Toggle from '@vueform/toggle'

export default {
    name: "Edit",

    layout: Layout,
    components: { Toggle }
}
</script>

<script setup>

import * as yup from "yup";
import {useField, useForm} from "vee-validate";
import {Inertia} from "@inertiajs/inertia";
import Swal from "sweetalert2";


const props = defineProps({
    company:Object,
    cities: Object
})

const schema = yup.object({
    name: yup.string().required().min(5),
    vat: yup.string().required(),
    city: yup.string().required(),
    address: yup.object().nullable(),
});

const { handleSubmit } = useForm({
    validationSchema: schema,
});

const { value: name, errorMessage: nameError } = useField(
    'name',
    null,
    {initialValue: props.company.name}

);
const { value: vat, errorMessage: vatError } = useField(
    'vat',
    null,
    {initialValue: props.company.VAT}

);
const { value: city, errorMessage: cityError } = useField(
    'city',
    null,
    {initialValue: props.company.city?.name}

);
const { value: street, errorMessage: streetError } = useField(
    'street',
    null,
    {initialValue: props.company.data?.street}
);
const { value: number, errorMessage: numberError } = useField(
    'number',
    null,
    {initialValue: props.company.data?.number}
);

const submit = handleSubmit((values) => {
    Inertia.post(route('admin.companies.update', {companyId: props.company.id}), {
        name: values.name,
        vat: values.vat,
        city: values.city,
        data: {
            street: values.street,
            number: values.number,
        }
    })
})

const deleteCompany = () => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this! and all jobs will be deleted to",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result) {
            Inertia.delete(route('admin.companies.destroy', {companyId: props.company.id}))
        }
    })
}

</script>
