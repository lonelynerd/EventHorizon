<script setup>
defineProps([
  "onClick",
  "imgLink",
  "shownTitle"
])
</script>

<template>
  <a @click="onClick">
    <img :src="imgLink">
    <p>{{ shownTitle }}</p>
  </a>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  a {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: start;
    border-radius: 16px;
    padding: 16px 32px;
    background: none;
    transition: all 0.25s;
    cursor: pointer;
  }

  a:hover {
    background: var(--widget-imp);
  }

  a > img {
    height: 24px;
    margin-right: 16px;
    filter: var(--icon);
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
    border-radius: 12vw;
    padding: 4vw 6vw;
    background: none;
    transition: all 0.25s;
    cursor: pointer;
  }

  a:active {
    background: var(--bg);
    filter: var(--effect);
  }

  a > img {
    height: 4vw;
    margin-right: 2vw;
    filter: var(--icon);
  }

  a > p {
    font-size: 3.5vw;
    margin: 0;
    font-weight: bold;
  }
}

</style>