<template>
    <Head title="Students List" />

    <AuthenticatedLayout>
        <template #header>
          <div class="flex justify-end items-center">
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
              Student List
            </h2>
            <PrimaryButton
                  class="ml-auto my-4 mr-4"
              >
                  <Link href="/students/create">Add Student</Link>
              </PrimaryButton>
          </div>    
        </template>

        <table class="table-auto w-full border-collapse border border-gray-200">
          <thead>
            <tr>
              <th class="border border-gray-300 px-4 py-2">#</th>
              <th class="border border-gray-300 px-4 py-2">Name</th>
              <th class="border border-gray-300 px-4 py-2">Email</th>
              <th class="border border-gray-300 px-4 py-2">Class</th>
              <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr 
            v-for="(student, index) in result.data" 
            :key="student.id"
            >
              <td class="border border-gray-300 px-4 py-2">{{ student.id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ student.name }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ student.email }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ student.class }}</td>
              <td class="border border-gray-300 px-4 py-2">
                <Link :href="`/students/${student.id}`" class="text-blue-500 hover:underline">View</Link>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-10 mx-auto max-w-screen-sm px-4">
          <Pagination :links="result.links" />
        </div>

    </AuthenticatedLayout>
</template>

<script setup lang="ts">

import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Pagination from '@/Components/Pagination.vue';
import {
  ITableResult,
  IStudent,
} from '@/types/custom';


defineProps<{
  result: ITableResult<IStudent>;
}>();

</script>

