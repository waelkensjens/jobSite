<template>
  <Head title="Login" />
  <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-800">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="submit">
        <div class="px-10 py-12">
          <h1 class="text-center text-3xl font-bold mb-8">Welcome Back!</h1>
            <span v-if="errors.email" class="text-red-600 text-sm">{{ errors.email }}</span>
            <div class="rounded-md shadow-sm -space-y-px">
                <span v-if="emailError" class="text-red-600 text-sm">{{emailError}}</span>
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input
                        v-model="email"
                        id="email-address"
                        name="email"
                        class="appearance-none rounded-none
                             relative block w-full px-3 py-2
                              border border-gray-300 placeholder-gray-500
                               text-gray-900 rounded-t-md focus:outline-none
                                focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Email address" />
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input
                        v-model="password"
                        id="password"
                        name="password"
                        type="password"
                        class="appearance-none rounded-none relative
                             block w-full px-3 py-2 border border-gray-300
                              placeholder-gray-500 text-gray-900 rounded-b-md
                               focus:outline-none focus:ring-indigo-500
                               focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Password"
                    />
                    <span v-if="passwordError" class="text-red-600 text-sm">{{passwordError}}</span>
                </div>
            </div>

            <label class="flex items-center mt-6 select-none" for="remember">
            <input id="remember" v-model="remember" class="mr-1" type="checkbox" />
            <span class="text-sm">Remember Me</span>
          </label>
        </div>
        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
          <button class="btn-indigo ml-auto text-center" type="submit">Login</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import Logo from '../../Shared/Logo'
import TextInput from '../../Shared/TextInput'
import LoadingButton from '../../Shared/LoadingButton'
import * as yup from "yup";
import {useField, useForm} from "vee-validate";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    errors: Object
})

const schema = yup.object({
    email: yup.string().required().email(),
    password: yup.string().required().min(8),
    remember: yup.bool(),
});

const { handleSubmit } = useForm({
    validationSchema: schema,
});

const { value: email, errorMessage: emailError } = useField('email');
const { value: password, errorMessage: passwordError } = useField('password');

const submit = handleSubmit((values) => {
    Inertia.post(route('login.store'), {
        email: values.email,
        password: values.password,
        remember: values.remember
    })
})
</script>
