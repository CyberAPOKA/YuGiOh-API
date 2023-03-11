<template>
  <div>
    {{ decks }}
  </div>
  <div>
    <div class="col-span-1" v-for="deck in decks" :key="deck.id">
      <a :href="route('deck', { slug: deck.slug })"> {{ deck.name }} </a>
    </div>
  </div>
</template>

<script setup>
import App from "@/Pages/Web/App.vue";
import { defineProps } from "vue";

const props = defineProps({
  user: Object,
  decks: Array,
});
</script>
