<template>
  <App>
    <div
      class="h-screen bg-auto bg-gradient-to-br from-slate-800 to-violet-900 rounded-lg"
    >
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
          <div class="grid grid-cols-10 gap-1 px-2">
            <div class="col-span-1" v-for="card in deckCards" :key="card.id">
              <img
                :src="card.image[0].image_url_small"
                alt=""
                @click="selectCard(card)"
              />
            </div>
          </div>
        </div>
        <div
          class="col-span-4 scroll rounded"
          style="background-color: red; overflow-x: auto"
        >
          <div class="grid grid-cols-6 gap-1 px-2 scroll" style="max-height: 83vh">
            <div class="col-span-1" v-for="card in userCards" :key="card.id">
              <img
                :src="card.image[0].image_url_small"
                alt=""
                @click="selectCard(card)"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </App>

  <div class="flex">
    <div class="grid grid-cols-2">
      <div>
        <h3>Draggable 1</h3>
        <draggable
          class="list-group"
          :list="list1"
          group="people"
          @change="log"
          itemKey="name"
        >
          <template #item="{ element, index }">
            <div class="list-group-item">{{ element.name }} {{ index }}</div>
          </template>
        </draggable>
      </div>

      <div class="col-3">
        <h3>Draggable 2</h3>
        <draggable
          class="list-group"
          :list="list2"
          group="people"
          @change="log"
          itemKey="name"
        >
          <template #item="{ element, index }">
            <div class="list-group-item">{{ element.name }} {{ index }}</div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import App from "@/Pages/Web/App.vue";
import { defineProps, ref } from "vue";
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
      list1: [
        { name: "John", id: 1 },
        { name: "Joao", id: 2 },
        { name: "Jean", id: 3 },
        { name: "Gerard", id: 4 },
      ],
      list2: [
        { name: "Juan", id: 5 },
        { name: "Edgard", id: 6 },
        { name: "Johnson", id: 7 },
      ],
    };
  },
  methods: {
    add: function () {
      this.list.push({ name: "Juan" });
    },
    replace: function () {
      this.list = [{ name: "Edgard" }];
    },
    clone: function (el) {
      return {
        name: el.name + " cloned",
      };
    },
    log: function (evt) {
      window.console.log(evt);
    },
  },
};
const selectedCard = ref(null);

function selectCard(card) {
  selectedCard.value = card;
}

function getImagePath(imageName) {
  return imageName && "/" + imageName;
}
</script>

<style>
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
