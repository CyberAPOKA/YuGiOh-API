<template>
  <App>
    <div>
      <h1>Cartas</h1>
      <ul>
        <li v-for="card in cards" :key="card.id">
          <div>Nome: {{ card.name }}</div>
          <div>Imagem:</div>
          <img :src="card.image_url" alt="Imagem da carta" />
          <!-- Exibe a imagem usando a URL armazenada no banco de dados -->
        </li>
      </ul>
    </div>
  </App>
</template>

<script setup>
import App from "@/Pages/Web/App.vue";
import { defineProps } from "vue";

const props = defineProps({
  cards: Array,
});
</script>
