<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PostList from "@/Components/PostList.vue";
import Pagination from "@/Components/Pagination.vue";
import NoPosts from "@/Components/NoPosts.vue";

defineProps({
    posts: {
        type: Object,
    }
})
</script>

<template>
    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Posts
                </h2>
                <Link
                    :href="route('post.create')"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-12 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Create
                </Link>
            </div>
        </template>
        <div class="bg-white overflow-hidden p-5 shadow-sm sm:rounded-lg">
            <PostList :posts="posts.data" v-if="posts.data.length" />
            <NoPosts v-else />
        </div>
        <div class="py-5">
            <Pagination :pages="posts"/>
        </div>
    </AppLayout>
</template>
