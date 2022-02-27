<template>

    <h1 class="text-3xl">Create New Job</h1>

    <div class="mt-8 sm:mx-auto sm:w-full w-full">
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
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="description"
                            id="description" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="descriptionError" class="text-sm text-red-600">{{ descriptionError }}</span>
                    </div>
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <div class="mt-1 w-2/4">
                        <input
                            v-model="content"
                            id="content" type="text" class="w-full border border-gray-300 rounded-lg shadow-sm" />
                        <span v-if="contentError" class="text-sm text-red-600">{{ contentError }}</span>
                    </div>
                </div>
                <div >
                    <label for="company" class="block text-sm font-medium">Company</label>
                    <div class="mt-1 w-1/4">
                        <select
                            v-model="company"
                            name="type"
                            id="company"
                            class="w-full  border border-gray-300 rounded-lg shadow-sm"
                        >
                            <option v-for="company in props.companies">{{ company.name }}</option>
                        </select>
                    </div>
                    <span v-if="companyError" class="text-sm text-red-600">{{ companyError }}</span>

                </div>

                <div>
                    <label for="type" class="block text-sm font-medium">Type</label>
                    <div class="mt-1 w-1/4">
                        <select
                            v-model="type"
                            name="type"
                            id="type"
                            class="w-full  border border-gray-300 rounded-lg shadow-sm"
                        >
                            <option v-for="type in props.types">{{ type.title }}</option>
                        </select>
                    </div>
                    <span v-if="typeError" class="text-sm text-red-600">{{ typeError }}</span>

                </div>

                <div class="flex items-center">
                    <input id="active" v-model="active" type="checkbox" class="" />
                    <label for="active" class="ml-2 block text-sm text-gray-900"
                    >Set this job active
                    </label>
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


const props = defineProps({
    job:Object,
    types: Object,
    companies: Object
})

const schema = yup.object({
    title: yup.string().required().min(5),
    description: yup.string().required(),
    content: yup.string().required(),
    company: yup.object().nullable(),
    type: yup.string().required(),
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
    {initialValue: props.job.description}

);
const { value: content, errorMessage: contentError } = useField(
    'content',
    null,
    {initialValue: props.job.content}

);
const { value: company, errorMessage: companyError } = useField(
    'company',
    null,
    {initialValue: props.job.company.name}
);
const { value: type, errorMessage: typeError } = useField(
    'type',
    null,
    {initialValue: props.job.type.title}
);
const { value: active, errorMessage: activeError } = useField(
    'active',
    null,
    {initialValue: Boolean(props.job.is_active)}
);


const submit = handleSubmit((values) => {
    Inertia.post(route('admin.jobs.update', {jobId: props.job.id}), {
        title: values.title,
        description:values.description,
        content: values.content,
        company: values.company,
        type: values.type,
        is_active: values.active
    })
})

</script>
