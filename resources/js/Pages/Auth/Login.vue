<template>
    <Form v-slot="{ errors }" :validation-schema="schema">
        <Field as="input" name="email" />
        <span>{{ errors.email }}</span>
        <br />
        <Field as="input" name="password" type="password" />
        <span>{{ errors.password }}</span>
        <br />
        <button>Submit</button>
    </Form>
</template>
<script setup>
import { Form, Field } from "vee-validate";
import * as yup from "yup";
const schema = yup.object().shape({
    email: yup.string().required().email(),
    password: yup.string().required().min(8),
})

</script>
