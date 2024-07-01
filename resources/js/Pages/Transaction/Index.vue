<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateTransactionForm from "@/Pages/Transaction/Components/CreateTransactionForm.vue";
import { Head } from '@inertiajs/vue3';
import {ref} from "vue";
import TransactionList from "@/Pages/Transaction/Components/TransactionList.vue";
</script>

<template>
  <Head title="Transactions" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Transactions</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
          <CreateTransactionForm :categories="$page.props.categories" />
        </div>

        <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
          <TransactionList
            :transactions="$page.props.transactions.data"
            :pagination="{
              current_page: $page.props.transactions.current_page,
              per_page: $page.props.transactions.per_page,
              total: $page.props.transactions.total,
              next_page_url: $page.props.transactions.next_page_url,
              prev_page_url: $page.props.transactions.prev_page_url
            }"
          />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
