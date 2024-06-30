<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateCategoryForm from "@/Pages/Category/Components/CreateCategoryForm.vue";
import CategoryList from "@/Pages/Category/Components/CategoryList.vue";
import { Head } from '@inertiajs/vue3';
import {ref} from "vue";
</script>

<template>
    <Head title="Categories" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                    <CreateCategoryForm />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                    <CategoryList
                        :categories="$page.props.categories.data"
                        :pagination="{
                            current_page: $page.props.categories.current_page,
                            per_page: $page.props.categories.per_page,
                            total: $page.props.categories.total,
                            next_page_url: $page.props.categories.next_page_url,
                            prev_page_url: $page.props.categories.prev_page_url
                        }"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
