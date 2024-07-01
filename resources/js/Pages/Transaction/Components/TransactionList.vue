<script setup>
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
  transactions: {
    type: Array,
    required: true,
  },
  pagination: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <table class="table-auto w-full border-collapse border border-slate-400">
    <thead>
      <tr>
        <th class="border border-slate-300 p-4 text-left">Category</th>
        <th class="border border-slate-300 p-4 text-left">Amount</th>
        <th class="border border-slate-300 p-4 text-left">Date</th>
        <th class="border border-slate-300 p-4 text-left">Description</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="transaction in props.transactions" :key="transaction.id">
        <td class="border border-slate-300 p-4">{{ transaction.category.name }}</td>
        <td
          class="border border-slate-300 p-4"
          :class="transaction.category.type === 'expense' ? 'text-rose-700' : 'text-green-700'"
        >
          {{ transaction.category.type === 'expense' ? '-' : '+' }}{{ transaction.amount }}
        </td>
        <td class="border border-slate-300 p-4">{{ transaction.date }}</td>
        <td class="border border-slate-300 p-4">{{ transaction.description }}</td>
      </tr>
    </tbody>
  </table>
  <Pagination :pagination="props.pagination" />
</template>

<style scoped>

</style>