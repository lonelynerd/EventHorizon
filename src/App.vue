<script setup>
import {Suspense} from "vue";
import Timetable from "@/components/Timetable.vue";
import Navbar from "@/components/navbarComponements/Navbar.vue";
import MobileNavbar from "@/components/navbarComponements/MobileNavbar.vue";
import Background from "@/components/Background.vue";

document.querySelector('html').dataset.theme = `theme-stars`;

</script>

<template>
  <Navbar/>
  <MobileNavbar/>
  <Suspense>
    <Timetable/>
  </Suspense>
  <Background />
</template>

<style scoped>
</style>

