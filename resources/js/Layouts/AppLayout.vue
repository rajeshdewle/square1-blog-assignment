<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/reactivity";

const csrfToken = computed(() => {
  return window.appVars.csrf_token;
});
const user = computed(() => usePage().props.value.auth.user);
</script>

<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Page Heading -->
    <nav class="bg-white border-b border-gray-100">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex">
            <!-- Logo -->
            <div class="text-2xl font-semibold text-gray-900">
              <Link :href="route('dashboard')"> My Blog </Link>
            </div>
          </div>
          <!-- User -->
          <div>
            <span class="mr-4 text-gray-600"> Hi, {{ user.name }} </span>
            <form method="POST" action="/logout" class="inline">
              <input type="hidden" name="_token" :value="csrfToken" />
              <button
                type="submit"
                class="text-indigo-600 hover:text-indigo-800"
              >
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <!-- Page Heading -->
    <header class="bg-white shadow" v-if="$slots.header">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header"></slot>
      </div>
    </header>
    <!-- Page Content -->
    <main class="container">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot />
      </div>
    </main>
    <!-- Page Footer -->
    <footer class="py-6" v-if="$slots.footer">
      <div class="container py-8">
        <slot name="footer" />
      </div>
    </footer>
  </div>
</template>
