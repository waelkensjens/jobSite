<template>
<h1>{{ $page.props.auth.name }}</h1>

    <Link :href="route('logout')" method="post">Logout</Link>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {defineComponent} from "vue";

defineComponent(
    {Link}
)


</script>
