<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from "vue";

const strategies = ref([
    'monthly',
    'category',
]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex flex-col gap-2">
                        <div class="flex justify-between">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 capitalize">
                                    {{$page.props.report_strategy}} Strategy Report
                                </h2>
                            </header>
                            <ul class="flex gap-1">
                                <li v-for="strategy in strategies.filter(el => el !== $page.props.report_strategy)">
                                    <a class="capitalize disabled" :href="'?report_strategy=' + strategy">{{ strategy }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <table class="table-auto w-full border-collapse border border-slate-400">
                                <thead>
                                    <tr>
                                        <th class="border border-slate-300 p-4 text-left">Dimension</th>
                                        <th class="border border-slate-300 p-4 text-left">Income</th>
                                        <th class="border border-slate-300 p-4 text-left">Expense</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="dimension in Object.keys($page.props.report)" :key="dimension">
                                        <td class="border border-slate-300 p-4">{{ dimension }}</td>
                                        <td class="border border-slate-300 p-4 uppercase">{{ $page.props.report[dimension].income }}</td>
                                        <td class="border border-slate-300 p-4 uppercase">{{ $page.props.report[dimension].expense }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
