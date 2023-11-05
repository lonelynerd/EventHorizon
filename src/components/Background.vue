<script setup>
</script>

<template>
  <div class="bg"></div>
</template>

<style scoped>
@media only screen and (orientation: landscape) {
  .bg {
    margin: 0;
    background: var(--bg-img);
    background-size: cover;
    z-index: -5;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    width: 100vw;
    height: 200px;
    animation: HewwoBg ease-out 1.5s;
    transition: all 0.25s;
  }
}

@media only screen and (orientation: portrait) {
  .bg {
    margin: 0;
    background: var(--bg-img);
    background-size: cover;
    z-index: -5;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    width: 100vw;
    height: 25vh;
    animation: HewwoBg ease-out 1.5s;
    transition: all 0.75s;
  }
}
</style>