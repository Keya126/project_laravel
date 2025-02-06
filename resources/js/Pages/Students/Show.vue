<template>
  <Head title="Students List" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-end items-center">
        <h2
            class="text-xl font-semibold leading-tight text-gray-800"
        >
          Student Details
        </h2>
        <PrimaryButton
              class="ml-auto my-4 mr-4"
          >
              <Link :href="`/students/${student.id}/edit`">Edit Student</Link>
          </PrimaryButton>
      </div>  
      
    </template>

    <div class="border p-4 rounded">
      <p><strong>Name:</strong> {{ student.name }}</p>
      <p><strong>Email:</strong> {{ student.email }}</p>
      <p><strong>Class:</strong> {{ student.class }}</p>
      <p><strong>Address:</strong> {{ student.address }}</p>
      <p><strong>Linked User:</strong> {{ student.user?.name || "N/A" }}</p>
    </div>

    <Link href="/students" class="mt-4 ml-4 inline-block text-blue-500 hover:underline">
      Back to Students List
    </Link>
  </AuthenticatedLayout>
</template>

<script setup lang="ts">

import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {
  IStudent
} from '@/types/custom';

defineProps<{
  student: IStudent;
}>();

</script>
