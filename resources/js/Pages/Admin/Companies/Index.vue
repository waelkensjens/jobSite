<template>
    <div>
        <Head title="companies" />
        <h1 class="mb-8 text-3xl font-bold">companies</h1>
        <div class="px-4 py-3 text-right sm:px-6">
            <button
                @click="createNew"
                class="inline-flex justify-center
                                py-2 px-4 border border-transparent shadow-sm
                                text-sm font-medium rounded-md text-white bg-indigo-600
                                hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                focus:ring-indigo-500"
            >
                Add new
            </button>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Name</th>
                    <th class="pb-4 pt-6 px-6">VAT</th>
                    <th class="pb-4 pt-6 px-6" >City</th>
                    <th class="pb-4 pt-6 px-6" >Address</th>
                    <th class="pb-4 pt-6 px-6" >Jobs</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="company in companies.data" :key="company.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('admin.companies.edit', {companyId: company.id})">
                            {{ company.name }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('admin.companies.edit', {companyId: company.id})" tabindex="-1">
                            {{ company.VAT }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('admin.companies.edit', {companyId: company.id})" tabindex="-1">
                            {{ company.city?.name }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('admin.companies.edit', {companyId: company.id})" tabindex="-1">
                            {{ company.data?.street + ' ' + company.data?.number }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('admin.companies.edit', {companyId: company.id})" tabindex="-1">
                            {{ Object.keys(company.jobs).length }}
                        </Link>
                    </td>
                </tr>
                <tr v-if="companies.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">No companies found.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <pagination class="mt-6" :links="companies.links" />
    </div>
</template>
<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '../../../Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '../../../Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '../../../Shared/Pagination'
import SearchFilter from '../../../Shared/SearchFilter'

export default {
    components: {
        Head,
        Icon,
        Link,
        Pagination,
        SearchFilter,
    },
    layout: Layout,
    props: {
        filters: Object,
        organizations: Object,
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/organizations', pickBy(this.form), { preserveState: true })
            }, 150),
        },
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null)
        },
    },
}
</script>
<script setup>

import {Inertia} from "@inertiajs/inertia";

const props = defineProps(
    {companies: Object}
)

const createNew = () => {
    Inertia.get(route('admin.companies.create'))
}

</script>
<style scoped>
</style>
