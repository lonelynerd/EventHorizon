<script setup>
defineProps([
  "imgLink",
  "shownTitle",
  "isImportant",
])

defineEmits([
  "update:buttonClicked"
])
</script>

<template>
  <a :class="{ important : isImportant, noimage : imgLink === '' }" class="link" @click="$emit('update:buttonClicked')">
    <img :src="imgLink">
    <p v-show="shownTitle !== ''">{{ shownTitle }}</p>
  </a>
</template>

<style scoped>
@media screen and (orientation: landscape) {
  .link {
    margin: 0;
    padding: 16px 24px;
    border-radius: 16px;
    font-size: 1em;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s;
    background: var(--widget);
  }

  .link:hover {
    filter: var(--effect);
  }

  .link > img {
    height: 1.25em;
    filter: var(--icon);
  }

  .link > p {
    padding: 0;
    margin: 0 0 0 12px;
    transition: all 0.25s;
  }

  .link.important {
    background: var(--important);
  }

  .link.important:hover {
    background: var(--important);
    filter: var(--effect);
  }

  .link.important > img {
    filter: var(--icon-imp);
  }

  .link.noimage {
    max-width: none;
  }

  .link.noimage > img {
    display: none;
  }

  .link.noimage > p {
    margin: 0;
    max-width: none;
  }

  .link.noimage:hover {
    margin: 0;
    background: var(--widget);
    max-width: none;
  }
}

@media screen and (orientation: portrait) {
  .link {
    margin: 0;
    padding: 2vh;
    border-radius: 2vh;
    font-size: 1em;
    font-weight: bold;
    background: var(--widget);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s;
    gap: 1vh;
  }

  .link:active {
    filter: var(--effect);
  }

  .link > img {
    height: 1.5em;
    filter: var(--icon);
  }

  .link > p {
    margin: 0;
  }

  .link.important {
    background: var(--important);
  }

  .link.important > img {
    filter: var(--icon-imp);
  }
}
</style>