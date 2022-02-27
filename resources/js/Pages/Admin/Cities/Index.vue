<template>
    <div>
        <Head title="cities" />
        <h1 class="mb-8 text-3xl font-bold">cities</h1>
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
                    <th class="pb-4 pt-6 px-6">name</th>
                    <th class="pb-4 pt-6 px-6">Zip</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="city in cities.data" :key="city.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('admin.cities.edit', {cityId: city.id})">
                            {{ city.name }}
                            <icon v-if="city.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('admin.cities.edit', {cityId: city.id})" tabindex="-1">
                            {{ city.zip }}
                        </Link>
                    </td>
                </tr>
                <tr v-if="cities.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">No cities found.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <pagination class="mt-6" :links="cities.links" />
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
    {cities: Object}
)

const createNew = () => {
    Inertia.get(route('admin.cities.create'))
}

</script>
<style scoped>
</style>
