<script setup>
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  categories: {
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
        <th class="border border-slate-300 p-4 text-left">Name</th>
        <th class="border border-slate-300 p-4 text-left">Type</th>
        <th class="border border-slate-300 p-4 text-left">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="category in props.categories" :key="category.id">
        <td class="border border-slate-300 p-4">{{ category.name }}</td>
        <td class="border border-slate-300 p-4 uppercase">{{ category.type }}</td>
        <td class="border border-slate-300 p-4">
          <div class="flex gap-1">
            <PrimaryButton :disabled="true">Edit</PrimaryButton>
            <PrimaryButton :disabled="true">Delete</PrimaryButton>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <Pagination :pagination="props.pagination" />
</template>

<style scoped>

</style>