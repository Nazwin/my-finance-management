<script setup>
const props = defineProps({
  pagination: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <nav aria-label="Page navigation example" v-if="props.pagination.total > props.pagination.per_page">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" :class="{disabled: !props.pagination.prev_page_url}" :href="props.pagination.prev_page_url">Previous</a>
      </li>
      <li
        v-for="page in Math.ceil(props.pagination.total / props.pagination.per_page)"
        :class="{active: props.pagination.current_page === page}"
        class="page-item"
      >
        <a class="page-link" :href="'?page=' + page">{{ page }}</a>
      </li>
      <li class="page-item">
        <a class="page-link" :class="{disabled: !props.pagination.next_page_url}" :href="props.pagination.next_page_url">Next</a>
      </li>
    </ul>
  </nav>
</template>

<style scoped>

</style>