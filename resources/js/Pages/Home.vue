<template>

    <!-- component -->
    <div class="h-screen flex justify-center items-center">

        <card v-for="job in jobs" class="grid grid-cols-6 max-w-5xl mx-8 rounded-xl bg-blue-800">

            <div class="col-span-4">

                <h2 class="font-bold text-3xl text-white ml-10 mt-8">
                    {{ job.title }}
                </h2>

                <p class="font-light text-white text-sm ml-10 mt-5">
                    {{
                        job.description
                    }}
                </p>

                <button
                    @click="visitJobPage(job.id)"
                    class="text-white font-semibold ml-10 mt-5 mb-8">
                    View the docs
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>

            </div>

            <div class="col-span-2 relative">
                <img src="https://www.digitalocean.com/_next/static/media/cloudJourneyImage.954519ea.svg"  class="absolute bottom-0 right-0"/>
            </div>

        </card>

    </div>
</template>

<script setup>

import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    jobs: Object
})

const visitJobPage = (jobId) => {
    Inertia.get(route('jobs.detail', {jobId: jobId}))
}

</script>
