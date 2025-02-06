<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Student Information
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ student ? 'Edit' : 'Add' }} student's basic information
            </p>
        </header>
        
        <form
            @submit.prevent="student 
                ? form.patch(route('students.update', {id: student.id}))
                : form.post(route('students.store'))
                "
            class="mt-6 space-y-6"
        >
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="age" value="Age" />

                <TextInput
                    id="age"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.age"
                    required
                />

                <InputError class="mt-2" :message="form.errors.age" />
            </div>

            <div>
                <InputLabel for="class" value="Class" />

                <TextInput
                    id="class"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.class"
                    required
                />

                <InputError class="mt-2" :message="form.errors.class" />
            </div>

            <div>
                <InputLabel for="address" value="Address" />

                <TextInput
                    id="address"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.address"
                    required
                />

                <InputError class="mt-2" :message="form.errors.address" />
            </div>


            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>
        </form>
    </section>
</template>

<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import {
    IStudent
} from '@/types/custom';

const props = defineProps<{
    student?: IStudent;
}>();

const {
    name = '',
    email = '',
    age = '',
    class: cls = '',
    address = ''
} = props.student || {};

const form = useForm({
    name,
    email,
    age: age.toString(),
    class: cls,
    address,
});

</script>