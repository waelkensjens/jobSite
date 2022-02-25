<template>

    <div class="w-3/4 mx-auto p-6 bg-white rounded-lg shadow-xl">
        <div class="w-full flex">
            <h1 class="text-base">Jobs</h1>
            <icon></icon>
        </div>


        <div class="pt-4">
            <table class="table-auto shadow-lg bg-white">
                <thead>
                <tr>
                    <th class="bg-blue-100 border text-left px-8 py-4">title</th>
                    <th class="bg-blue-100 border text-left px-8 py-4">description</th>
                    <th class="bg-blue-100 border text-left px-8 py-4">company</th>
                    <th class="bg-blue-100 border text-left px-8 py-4">type</th>
                    <th class="bg-blue-100 border text-left px-8 py-4">active</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(job, index) in props.jobs.data" :key="job.id">
                    <td class="border px-8 py-4">{{ job.title }}</td>
                    <td class="border px-8 py-4">{{ job.description }}</td>
                    <td class="border px-8 py-4">{{ job.company.name }}</td>
                    <td class="border px-8 py-4">{{ job.type_id }}</td>
                    <td class="border px-8 py-4">{{ job.is_active }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



</template>

<script setup>


const props = defineProps({
    jobs: {
        type: Object,
    },
})

console.log(props.jobs.data)
</script>

<style scoped>

</style>
