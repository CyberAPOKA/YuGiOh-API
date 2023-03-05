<template>
  <App>
    <div class="h-screen bg-auto bg-gradient-to-br from-slate-800 to-violet-900">
      <div class="grid grid-cols-2">
        <div>TEXTO LADO ESQUERDO</div>
        <div>
          <img
            class="fixed h-screen animate-dragon"
            src="/assets/blue.png"
            alt="Imagem do Dragão Branco de Olhos Azuis"
          />
        </div>
      </div>
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

<style>
@keyframes fly {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-20px);
  }
  100% {
    transform: translateY(0);
  }
}

.animate-dragon {
  animation: fly 10s ease-in-out infinite;
}
</style>
