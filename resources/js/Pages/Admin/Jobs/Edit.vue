<template>
    <div>
        <div class="md:col-span-1 mb-10">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Job {{ props.job.title}}</h3>
                <p class="mt-1 text-sm text-gray-600">information regarding the job.</p>
            </div>
            <div class="px-4 sm:px-0 text-right">
                <button @click="deleteJob"
                        class="inline-flex
                         justify-center py-2 px-4 border
                         border-transparent shadow-sm text-sm
                         font-medium rounded-md text-white
                         bg-red-600 hover:bg-red-700 focus:outline-none
                         focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >
                    Delete
                </button>
            </div>
        </div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form
                    @submit.prevent="submit"
                    method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-2">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <div class="mt-1 relative rounded-md shadow-lg">
                                        <div class="relative w-full text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-teal-300 focus-visible:ring-offset-2 sm:text-sm overflow-hidden">
                                            <input
                                                v-model="title"
                                                id="title"
                                                class="w-full border-0 focus:ring-0 py-2 pl-3 pr-10 text-sm leading-5 text-gray-900"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <div class="mt-1 relative rounded-md shadow-lg">
                                        <div class="relative w-full text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-teal-300 focus-visible:ring-offset-2 sm:text-sm overflow-hidden">
                                            <input
                                                v-model="description"
                                                id="description"
                                                class="w-full border-0 focus:ring-0 py-2 pl-3 pr-10 text-sm leading-5 text-gray-900"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700">content</label>
                                    <div class="mt-1 relative rounded-md shadow-lg">
                                        <div class="relative w-full text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-teal-300 focus-visible:ring-offset-2 sm:text-sm overflow-hidden">
                                            <vue-editor id="content"
                                                        v-model="content">
                                            </vue-editor>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
<!--                                 Todo: dropdown-->
                                <div>
                                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                    <div class="mt-1 relative rounded-md shadow-lg">
                                        <div class="relative w-full text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-teal-300 focus-visible:ring-offset-2 sm:text-sm overflow-hidden">
                                            <input
                                                :disabled="true"
                                                v-model="company"
                                                id="company"
                                                class="w-full border-0 focus:ring-0 py-2 pl-3 pr-10 text-sm leading-5 text-gray-900"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                                 Todo: dropdown-->
                            <div class="grid grid-cols-1 w-3/4">
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                    <div class="mt-1 relative rounded-md shadow-lg">
                                        <div class="relative w-full text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-teal-300 focus-visible:ring-offset-2 sm:text-sm overflow-hidden">
                                            <div class="relative w-full text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-teal-300 focus-visible:ring-offset-2 sm:text-sm overflow-hidden">
                                                <input
                                                    v-model="type"
                                                    id="type"
                                                    class="w-full border-0 focus:ring-0 py-2 pl-3 pr-10 text-sm leading-5 text-gray-900"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center
                                py-2 px-4 border border-transparent shadow-sm
                                text-sm font-medium rounded-md text-white bg-indigo-600
                                hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                focus:ring-indigo-500"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "../../../Shared/Layout";

export default {
    name: "Edit",

    layout: Layout
}
</script>

<script setup>

import * as yup from "yup";
import {useField, useForm} from "vee-validate";
import {Inertia} from "@inertiajs/inertia";
import Swal from "sweetalert2";
import { VueEditor } from "vue2-editor";

const props = defineProps({
    job: Object,
    types: Object
})

const schema = yup.object({
    title: yup.string().required().min(5),
    description: yup.string().required(),
    content: yup.string().required(),
    company: yup.object().required(),
    type: yup.object().required(),
    active: yup.bool(),
});

const { handleSubmit } = useForm({
    validationSchema: schema,
});

const { value: title, errorMessage: titleError } = useField(
    'title',
    null,
    {initialValue: props.job.title}
);
const { value: description, errorMessage: descriptionError } = useField(
    'description',
    null,
    {initialValue: props.job.description});
const { value: content, errorMessage: contentError } = useField(
    'content',
    null,
    {initialValue: props.job.content});
const { value: company, errorMessage: companyError } = useField(
    'company',
    null,
    {initialValue: props.job.company.name});
const { value: type, errorMessage: typeError } = useField(
    'type',
    null,
    {initialValue: props.job.type.title});
const { value: active, errorMessage: activeError } = useField(
    'active',
    null,
    {initialValue: props.job.is_active});

const submit = handleSubmit((values) => {
    console.log(values)
    Inertia.post(route('admin.jobs.store'), {
        title: values.title,
        description:values.description,
        content: values.content,
        company: values.company,
        type: values.type,
        active: values.active
    })
})

const deleteJob = () => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Inertia.delete(route('admin.jobs.destroy', { jobId: props.job.id }))
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}
const setEditorContent = () => {
    props.job.content.value = "<h1>Html For Editor</h1>";
}

</script>

<style scoped>

</style>
