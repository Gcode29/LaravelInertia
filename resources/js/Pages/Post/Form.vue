<template>
  <app-layout title="Posts Form">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post Form
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label
                        for="title"
                        class="block text-sm font-medium text-gray-700"
                      >
                        Title
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <input
                          type="text"
                          name="title"
                          id="title"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                          placeholder="Title"
                          v-model="form.title"
                        />
                      </div>
                    </div>
                  </div>

                  <div>
                    <label
                      for="content"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Content
                    </label>
                    <div class="mt-1">
                      <textarea
                        id="content"
                        name="content"
                        rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="Content"
                        v-model="form.content"
                      ></textarea>
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <Link
                    :href="route('posts.index')"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 cursor-pointer mr-3"
                  >
                    Cancel
                  </Link>

                  <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';

import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
  title: null,
  content: null,
});

function submit() {
  form.post(route('posts.store'), {
    onSuccess: () => {
      form.reset();
    },
  });
}
</script>
