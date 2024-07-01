<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
});

const categoryInput = ref(null);
const amountInput = ref(null);
const dateInput = ref(null);
const descriptionInput = ref(null);

const form = useForm({
    category_id: null,
    amount: null,
    date: null,
    description: '',
});

const createTransaction = () => {
    form.post(route('transaction.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.category_id) {
                form.reset('category_id');
                categoryInput.value.focus();
            }
            if (form.errors.amount) {
                form.reset('amount');
                amountInput.value.focus();
            }
            if (form.errors.date) {
                form.reset('date');
                dateInput.value.focus();
            }
            if (form.errors.description) {
                form.reset('description');
                descriptionInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Create Transaction</h2>

            <p class="mt-1 text-sm text-gray-600">
                Fill in the form below to create a new transaction.
            </p>
        </header>

        <form @submit.prevent="createTransaction" class="mt-6 space-y-6">
            <div>
                <InputLabel for="category_id" value="Category" />

                <select
                    id="category_id"
                    name="category_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    ref="categoryInput"
                    v-model="form.category_id"
                >
                    <option v-for="category in props.categories" :value="category.id" :key="category.id">
                        {{ category.name }}
                    </option>
                </select>

                <InputError :message="form.errors.category_id" class="mt-2" />
            </div>

            <div>
                <InputLabel for="amount" value="Amount" />

                <input
                    type="number"
                    name="amount"
                    id="amount"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    v-model="form.amount"
                    ref="amountInput"
                >

                <InputError :message="form.errors.amount" class="mt-2" />
            </div>

            <div>
                  <InputLabel for="date" value="Date" />

                  <input
                      type="date"
                      name="date"
                      id="date"
                      class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                      v-model="form.date"
                      ref="dateInput"
                  >

                  <InputError :message="form.errors.date" class="mt-2" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.description" class="mt-2" />
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
