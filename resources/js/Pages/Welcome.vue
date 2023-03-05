<template>
  <App>
    <section class="relative">
      <div class="h-screen bg-auto bg-gradient-to-br from-slate-800 to-violet-900">
        <div class="grid grid-cols-2 h-screen">
          <div class="flex items-center justify-center text-white">
            TEXTO LADO ESQUERDO
          </div>
          <div>
            <img
              class="absolute h-screen animate-dragon"
              src="/assets/blue.png"
              alt="Imagem do Dragão Branco de Olhos Azuis"
            />
          </div>
        </div>
      </div>
    </section>
  </App>
</template>

<script setup>
import App from "@/Pages/Web/App.vue";
import Header from "@/Pages/Web/Layouts/Header.vue";
import Footer from "@/Pages/Web/Layouts/Footer.vue";
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
section {
  overflow: hidden;
}
</style>
