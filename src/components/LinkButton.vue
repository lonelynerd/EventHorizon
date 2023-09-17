<script setup>
defineProps([
  "hrefLink",
  "imgLink",
  "shownTitle",
  "isImportant"
])
</script>

<template>
  <a :href="hrefLink" :class="{ important : isImportant }">
    <img :src="imgLink" :alt="imgLink">
    <p v-show="shownTitle !== ''">{{ shownTitle }}</p>
  </a>
</template>

<style scoped>
a {
  margin: 0;
  padding: 16px 24px;
  border-radius: 999px;
  font-size: 1em;
  font-weight: bold;
  background: var(--bg2);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  max-width: 200px;
  transition: all 0.25s;
}

a:hover {
  max-width: 150px;
  filter: var(--effect);
}

a > img {
  height: 1.25em;
}

a > p {
  margin: 0;
  padding: 0;
  text-overflow: fade;
  text-wrap: none;
  max-width: 0;
  overflow: hidden;
  transition: all 0.25s;
}

a:hover > p {
  max-width: 999px;
  margin: 0 0 0 12px;
  transition: all 0.25s;
}
</style>