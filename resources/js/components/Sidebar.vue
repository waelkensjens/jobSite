<template>
<div class="relative flex min-h-screen ">
<!--    sidebar-->
    <section class="
        bg-cyan-600
        text-cyan-50
        w-64
        space-y-6
        px-2
        py-4
        absolute
        inset-y-0
        left-0
        md:relative
        md:-translate-x-0
        transform
        -translate-x-full
        transition
        duration-200
        ease-in-out"
        :class="{ 'relative -translate-x-0': showSidebar }"
    >
        <Link
            class="flex items-center space-x-2 px-4"
        :href="route('admin.dashboard')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
            <span
                class="text-2xl font-extrabold text-white"
            >
                LOGO
            </span>
        </Link>
        <nav>
            <Link
                :href="route('admin.jobs.index')"
                class="group flex items-center py-3  space-x-2 px-4 hover:shadow-lg rounded hover:text-gray-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span
                    class="text-2xl text-white group-hover:text-gray-700"
                >
                Dashboard
            </span>
            </Link>
            <Link
                :href="route('admin.jobs.index')"
                class="group flex items-center py-3 space-x-2 px-4 hover:shadow-lg rounded hover:text-gray-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span
                    class="text-2xl text-white group-hover:text-gray-700"
                >
                Jobs
            </span>
            </Link>
            <Link
                :href="route('admin.jobs.index')"
                class="group flex items-center py-3 space-x-2 px-4 hover:shadow-lg rounded hover:text-gray-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                </svg>
                <span
                    class="text-2xl text-white group-hover:text-gray-700"
                >
                Companies
            </span>
            </Link>
            <Link
                :href="route('admin.jobs.index')"
                class="group flex items-center py-3 space-x-2 px-4 hover:shadow rounded hover:text-gray-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span
                    class="text-2xl text-white group-hover:text-gray-700"
                >
                Cities
            </span>
            </Link>


        </nav>
    </section>
<!--    Header-->
    <section class="flex-1">
        <div >
            <div class="bg-white shadow px-2 py-4 flex justify-between">
                <button
                    @click="showSidebar = !showSidebar" class="text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <Link
                    :href="route('admin.jobs.index')"
                    class="py-3 space-x-2 px-4 hover:shadow-lg rounded hover:text-gray-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </Link>
            </div>
        </div>
    </section>
</div>
    <section class=" relative flex-1">
        <slot/>
    </section>

</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";

const showSidebar = ref(false)

</script>

<style scoped>

</style>
