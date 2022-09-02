<script setup>
import { Link } from "@inertiajs/inertia-vue3"

defineProps({
    pages: {
        type: Object,
    }
})
</script>

<template>
    <div class="flex justify-between">
        <Link
            v-if="pages.prev_page_url"
            :href="pages.prev_page_url"
            class="rounded-lg py-2 px-12 border text-sm text-gray-600 hover:text-gray-900"
        >
            &larr; Previous
        </Link>
        <button
            v-else
            disabled
            class="cursor-not-allowed text-sm rounded-lg py-2 px-12 text-gray-500 border"
        >
            &larr; Previous
        </button>
        <Link
            v-if="pages.next_page_url"
            :href="pages.next_page_url"
            class="rounded-lg py-2 px-12 border text-sm text-gray-600 hover:text-gray-900"
        >
            Next &rarr;
        </Link>
        <button
            v-else
            disabled
            class="cursor-not-allowed text-sm rounded-lg py-2 px-12 text-gray-500 border"
        >
            Next &rarr;
        </button>
    </div>
</template>