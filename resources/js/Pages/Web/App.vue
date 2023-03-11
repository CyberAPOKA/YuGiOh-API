<script setup>
import Sidebar from "@/Pages/Web/Layouts/Sidebar.vue";
import Header from "@/Pages/Web/Layouts/Header.vue";
import Footer from "@/Pages/Web/Layouts/Footer.vue";
</script>
<template>
  <Header></Header>
  <!-- <Sidebar></Sidebar> -->
  <div class="main-content">
    <slot></slot>
  </div>
  <!-- <Footer></Footer> -->
</template>
