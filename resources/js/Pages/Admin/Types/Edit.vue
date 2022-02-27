<template>

    <h1 class="text-3xl">Edit type</h1>

    <div class="text-right float-right mb-10 pb-10">
        <button
            @click="deleteType"
            type="submit" class="w-90 flex justify-center
                             py-2 px-4 border border-transparent
                              rounded-md shadow-sm text-sm font-medium text-white
                     bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                      focus:ring-offset-2 focus:ring-indigo-500">
            Delete
        </button>
    </div>

    <div class="mt-8 pt-6 sm:mx-auto sm:w-full w-full">
        <div class="bg-white py-8 px-6 border border-gray-300 shadow rounded-lg sm:px-10">
            <form
                @submit.prevent="submit"
                class="mb-0 space-y-6" >
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="title"
                            id="title" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="titleError" class="text-sm text-red-600">{{ titleError }}</span>
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
import Swal from "sweetalert2";

const props = defineProps({
    type:Object,
    types: Object,
    companies: Object
})

const schema = yup.object({
    title: yup.string().required().min(5),
});

const { handleSubmit } = useForm({
    validationSchema: schema,
});

const { value: title, errorMessage: titleError } = useField(
    'title',
    null,
    {initialValue: props.type.title}

);

const submit = handleSubmit((values) => {
    Inertia.post(route('admin.types.update', {typeId: props.type.id}), {
        title: values.title,
    })
})

const deleteType = () => {
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
            Inertia.delete(route('admin.types.destroy', { typeId: props.type.id}))
        }
    })
}

</script>
