<script setup>
const props = defineProps([
  "buttonId",
  "imgLink",
  "shownTitle",
  "isImportant"
])

function showMenu() {
  let elem = document.getElementById(props.buttonId);
  if (elem === null) {
    return false;
  }
  elem.style.display = "block";
}
</script>

<template>
  <a @click="showMenu" :class="{ important : isImportant }">
    <img :src="imgLink" :alt="imgLink">
    <p v-show="shownTitle !== ''">{{ shownTitle }}</p>
  </a>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
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
}

@media only screen and (orientation: portrait) {
  a {
    margin: 0;
    padding: 1.25vh;
    border-radius: 999px;
    background: var(--bg2);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s;
  }

  a:active {
    filter: var(--effect);
  }

  a > img {
    height: 3vh;
  }
}

.important {
  background: var(--bg3) !important;
  color: var(--text2) !important;
}
</style>