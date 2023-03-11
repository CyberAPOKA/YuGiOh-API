<template>
  <div>
    <img :src="image" alt="card attribute" />
    <div>{{ label }}</div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  image: String,
  label: String,
});
</script>
