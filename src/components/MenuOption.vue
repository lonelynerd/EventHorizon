<script setup>
defineProps([
  "onClick",
  "imgLink",
  "shownTitle",
  "hrefLink"
])
</script>

<template>
  <a @click="onClick" :href="hrefLink">
    <img :src="imgLink" :alt="imgLink">
    <p>{{ shownTitle }}</p>
  </a>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  a {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    border-radius: 999px;
    padding: 16px 24px;
    background: none;
    animation: all 0.25s;
    cursor: pointer;
  }

  a:hover {
    background: var(--bg1);
    filter: var(--effect);
  }

  a > img {
    height: 32px;
    margin-right: 16px;
  }

  a > p {
    margin: 0;
    font-weight: bold;
  }
}


@media only screen and (orientation: portrait) {
  a {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    border-radius: 999px;
    padding: 2vh 3vh;
    background: none;
    animation: all 0.25s;
    cursor: pointer;
  }

  a:active {
    background: var(--bg1);
    filter: var(--effect);
  }

  a > img {
    height: 2vh;
    margin-right: 1vh;
  }

  a > p {
    font-size: 2vh;
    margin: 0;
    font-weight: bold;
  }
}

</style>