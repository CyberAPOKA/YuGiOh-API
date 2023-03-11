<template>
  <App>
    <div
      class="h-screen bg-auto bg-gradient-to-br from-slate-800 to-violet-900 rounded-lg"
    >
      <div class="grid grid-cols-12 gap-4 px-4" style="padding-top: 15vh">
        <div class="col-span-3" style="background-color: red">A</div>
        <div class="col-span-5" style="background-color: red">
          <div class="grid grid-cols-10 gap-1 px-2">B</div>
        </div>
        <div
          class="col-span-4 scroll rounded"
          style="background-color: red; overflow-x: auto"
        >
          <div class="grid grid-cols-6 gap-1 px-2 scroll" style="max-height: 83vh">
            <div class="col-span-1" v-for="card in cards" :key="card.id">
              <img :src="card.image[0].image_url_small" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </App>
</template>

<script setup>
import App from "@/Pages/Web/App.vue";
import { defineProps } from "vue";

const props = defineProps({
  user: Object,
  cards: Array,
});
</script>
<style>
.scroll::-webkit-scrollbar {
  /* largura da barra de rolagem */
  width: 10px;
}

.scroll::-webkit-scrollbar-thumb {
  /* cor da barra de rolagem */
  background-color: #bbbbbb;

  /* borda arredondada da barra de rolagem */
  border-radius: 10px;
}

.scroll::-webkit-scrollbar-track {
  /* cor do fundo da barra de rolagem */
  background-color: #414141;
}
</style>
