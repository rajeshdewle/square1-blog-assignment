<script setup>
import { Inertia } from "@inertiajs/inertia";
import { computed } from "@vue/runtime-core";

defineProps({
    posts: {
        type: Array,
    }
})

const sortQuery = computed(() => route().params.sort);

const formatDate = (value) => {
    const date = new Date(value);
    return date.toLocaleString().toUpperCase();
}

const sortData = () => {
    if (sortQuery.value == 'asc') {
        Inertia.get(route('dashboard', {sort: 'desc'}))
    } else {
        Inertia.get(route('dashboard', {sort: 'asc'}))
    }
}
</script>
<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="my-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                                    <th scope="col" class="px-3 text-left text-sm font-semibold text-gray-900">
                                        Published at
                                        <button class="ml-2" @click="sortData" title="Sort">
                                            <span v-if="sortQuery == 'asc'">&uarr;</span>
                                            <span v-else>&darr;</span>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr v-for="(post, postIdx) in posts" :key="post.id" :class="postIdx % 2 === 0 ? undefined : 'bg-gray-100'">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ post.id }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ post.title }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ formatDate(post.published_at) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>