<script setup>
const value = ref(null);

const model = defineModel({
  type: String,
  required: true,
});
</script>

<template>
  <input :value="value" />
</template>
