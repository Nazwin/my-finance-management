<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const nameInput = ref(null);
const typeInput = ref(null);

const form = useForm({
    name: '',
    type: 'income',
});

const createCategory = () => {
    form.post(route('category.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {
                form.reset('name');
                nameInput.value.focus();
            }
            if (form.errors.type) {
                form.reset('type');
                typeInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Create Category</h2>

            <p class="mt-1 text-sm text-gray-600">
              Type the name of the category you want to create.
            </p>
        </header>

        <form @submit.prevent="createCategory" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div>
                <InputLabel for="type" value="Type" />

                <select
                    id="type"
                    name="type"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    ref="typeInput"
                    v-model="form.type"
                >
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>

                <InputError :message="form.errors.type" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
