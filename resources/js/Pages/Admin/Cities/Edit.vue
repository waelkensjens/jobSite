<template>

    <h1 class="text-3xl">Edit city</h1>

    <div class="text-right float-right mb-10 pb-10">
    <button
        @click="deleteCity"
        type="submit" class="w-90 flex justify-center
                             py-2 px-4 border border-transparent
                              rounded-md shadow-sm text-sm font-medium text-white
                     bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                      focus:ring-offset-2 focus:ring-indigo-500">
        Delete
    </button>
    </div>
    <div class="pt-6 mt-8 sm:mx-auto sm:w-full w-full">
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
                    <label for="zip" class="block text-sm font-medium text-gray-700">zip</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="zip"
                            id="zip" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="zipError" class="text-sm text-red-600">{{ zipError }}</span>
                    </div>
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
import {boolean} from "yup";
import Swal from "sweetalert2";


const props = defineProps({
    city:Object,
    types: Object,
    companies: Object
})

const schema = yup.object({
    name: yup.string().required().min(5),
    zip: yup.number().required(),
});

const { handleSubmit } = useForm({
    validationSchema: schema,
});

const { value: name, errorMessage: nameError } = useField(
    'name',
    null,
    {initialValue: props.city.name}

);
const { value: zip, errorMessage: zipError } = useField(
    'zip',
    null,
    {initialValue: props.city.zip}

);


const submit = handleSubmit((values) => {
    Inertia.post(route('admin.cities.update', {cityId: props.city.id}), {
        title: values.title,
        zip:values.zip
    })
})

const deleteCity = () => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result) {
           Inertia.delete(route('admin.cities.destroy', { cityId: props.city.id}))
        }
    })
}

</script>
