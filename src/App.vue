<script setup>
import Navbar from "@/components/Navbar.vue"
import MobileNavbar from "@/components/MobileNavbar.vue";
import {ref, Suspense} from "vue";
import Timetable from "@/components/Timetable.vue";

document.querySelector('html').dataset.theme = `theme-dark`;

</script>

<template>
  <Navbar :alignRight="false"/>
  <MobileNavbar/>

  <Suspense>
    <template #fallback>
    </template>
    <template #default>
      <Timetable/>
    </template>
  </Suspense>
</template>

<style scoped>
</style>

