<template>
  <div class="h-screen bg-auto bg-gradient-to-br from-slate-800 to-violet-900 rounded-lg">
    <div class="grid grid-cols-12 gap-4 px-4" style="padding-top: 15vh">
      <div class="col-span-3" style="background-color: red">
        <div v-if="selectedCard">
          <div class="flex justify-between" style="background-color: #b78b50">
            <h2>{{ selectedCard.name }}</h2>
            <img :src="getImagePath(selectedCard.image[0].attribute_image)" />
          </div>

          <img :src="selectedCard.image[0].image_url" alt="" />
        </div>
        <div v-else>Selecione uma carta</div>
      </div>
      <div class="col-span-5" style="background-color: red">
        <draggable
          class="grid grid-cols-10 gap-1 px-2"
          :list="deckCards"
          group="people"
          @change="log"
          itemKey="card"
        >
          <template #item="{ element, index }">
            <div class="col-span-1">
              <img
                :src="element.image[0].image_url_small"
                :alt="index"
                @click="selectCard(element)"
              />
            </div>
          </template>
        </draggable>
      </div>

      <div class="col-span-4" style="background-color: red">
        <draggable
          class="grid grid-cols-6 gap-1 px-2 scroll"
          :list="userCards"
          group="people"
          @change="log"
          itemKey="card"
        >
          <template #item="{ element, index }">
            <div class="col-span-1">
              <img
                :src="element.image[0].image_url_small"
                :alt="index"
                @click="selectCard(element)"
              />
            </div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";

export default {
  props: ["deck", "deckCards", "userCards"],
  name: "two-lists",
  display: "Two Lists",
  order: 1,
  components: {
    draggable,
  },
  data() {
    return {
      selectedCard: null,
    };
  },
  methods: {
    selectCard(card) {
      this.selectedCard = card;
    },
    getImagePath(imageName) {
      console.log(imageName);
      return imageName && "/" + imageName;
    },
  },
};
</script>
<style>
.scroll {
  max-height: 84vh;
  overflow-y: scroll;
}
.scroll::-webkit-scrollbar {
  /* largura da barra de rolagem */
  width: 5px;
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
