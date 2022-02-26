<template>
    <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead>
            <tr class="text-left font-bold">
                <th class="pb-4 pt-6 px-6">Name</th>
                <th class="pb-4 pt-6 px-6">Company</th>
                <th class="pb-4 pt-6 px-6" >Type</th>
                <th class="pb-4 pt-6 px-6" >Active</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in data.data" :key="item.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                <td v-for="(key, el) in item" class="border-t" ></td>
            </tr>
            <tr v-if="data.data.length === 0">
                <td class="px-6 py-4 border-t" colspan="4">No jobs found.</td>
            </tr>
            </tbody>
        </table>
    </div>
    <pagination class="mt-6" :links="data.links" />
</template>

<script>
export default {
    name: "DataTable"
}
</script>

<script setup>
const props = defineProps({
    data: Object
})

</script>

<style scoped>

</style>
