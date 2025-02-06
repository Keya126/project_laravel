

<template>
    <Head title="Mutate Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Mutate Student 
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div
                    class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                    <StudentForm
                        class="max-w-xl"
                        :student="student"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import StudentForm from './Partials/StudentForm.vue';
import { Head } from '@inertiajs/vue3';
import {
    IStudent
} from '@/types/custom';

defineProps<{
    student: IStudent;
}>();

</script>