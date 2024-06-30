<script setup>
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
          <button>Edit</button>
          <button>Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
  <nav aria-label="Page navigation example" v-if="props.pagination.total">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li
        v-for="page in Math.ceil(props.pagination.total / props.pagination.per_page)"
        :class="{active: props.pagination.current_page === page}"
        class="page-item"
      >
        <a class="page-link" :href="'?page=' + page">{{ page }}</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</template>

<style scoped>

</style>