<template>
    <Link :href="route('logout')" method="post">Logout</Link>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {defineComponent} from "vue";

defineComponent(
    {Link}
)


</script>
