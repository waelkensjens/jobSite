<template>

    <h1 class="text-3xl">Create New Type</h1>

    <div class="mt-8 sm:mx-auto sm:w-full w-full">
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

                <div class="flex w-full">
                    <div class="flex-col">
                    <label for="street" class="block text-sm font-medium text-gray-700">street</label>
                    <div class="mt-1 w-full">
                        <input
                            v-model="street"
                            id="street" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="streetError" class="text-sm text-red-600">{{ streetError }}</span>
                    </div>
                    </div>
                    <div class="ml-8">
                        <label for="number" class="block text-sm font-medium text-gray-700">number</label>
                        <div class="mt-1 w-2/4">
                            <input
                                v-model="number"
                                id="number" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                            <span v-if="numberError" class="text-sm text-red-600">{{ numberError }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium">city</label>
                    <div class="mt-1 w-1/4">
                        <select
                            v-model="city"
                            name="city"
                            id="type"
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
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import Layout from "../../../Shared/Layout";

export default {
    name: "Edit",

    layout: Layout,
}

</script>

<script setup>



import * as yup from "yup";
import {useField, useForm} from "vee-validate";
import {Inertia} from "@inertiajs/inertia";


const props = defineProps({
    cities: Object
})

const schema = yup.object({
    name: yup.string().required().min(5),
    vat: yup.string().required(),
    street: yup.string().required(),
    number: yup.number().required(),
    city: yup.string().required(),
});

const { handleSubmit } = useForm({
    validationSchema: schema,
});

const { value: name, errorMessage: nameError } = useField(
    'name',
    null,
);
const { value: vat, errorMessage: vatError } = useField(
    'vat',
    null,
);
const { value: street, errorMessage: streetError } = useField(
    'street',
    null,
);
const { value: number, errorMessage: numberError } = useField(
    'number',
    null,
);
const { value: city, errorMessage: cityError } = useField(
    'city',
    null,
);


const submit = handleSubmit((values) => {
    Inertia.post(route('admin.companies.store'), {
        name: values.name,
        vat: values.vat,
        city: values.city,
        data: {
            street: values.street,
            number: values.number,
        }
    })
})

</script>
