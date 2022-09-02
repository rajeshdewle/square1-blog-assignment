<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    title: '',
    description: '',
});
const submit = () => form.post(route('post.store'));
</script>

<template>
    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create a Post
                </h2>

                <Link
                    :href="route('dashboard')"
                    class="rounded py-2 px-12 border text-sm text-gray-600 hover:text-gray-900"
                >
                    &laquo; Go Back
                </Link>
            </div>
        </template>
        <div class="bg-white overflow-hidden p-5 shadow-sm sm:rounded-lg">
            <form @submit.prevent="submit" class="w-full">
                <label
                    for="title"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                >
                    Title
                </label>
                <input
                    id="title"
                    type="text"
                    placeholder="Enter Post Title"
                    v-model="form.title"
                    :class="{ 'border-red-500': form.errors.title}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                >
                <p v-if="form.errors.title" class="text-red-500 text-xs italic">
                    {{ form.errors.title }}
                </p>
                <label
                    for="description"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-5"
                >
                    Description
                </label>
                <textarea
                    rows="8"
                    v-model="form.description"
                    id="description"
                    placeholder="Enter description here..."
                    :class="{ 'border-red-500': form.errors.description}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                ></textarea>
                <p v-if="form.errors.description" class="text-red-500 text-xs italic">
                    {{ form.errors.description }}
                </p>
                <div class="bg-gray-50 py-3 text-right ">
                    <button
                        type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-12 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
