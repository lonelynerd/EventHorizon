<script setup>
</script>

<template>
  <div class="error">
    <div>
      <img src="/images/error.webp">
      <h1>An error occurred</h1>
      <p>The given URL returns invalid or corrupt data. Please try again.</p>
    </div>
  </div>
</template>

<style scoped>
@media screen and (orientation: landscape) {
  .error {
    overflow: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 60vh;
  }

  .error > div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 16px;
  }

  .error > div > * {
    margin: 0;
  }

  .error > div > img {
    height: 96px;
  }
}

@media screen and (orientation: portrait) {
  .error {
    overflow: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 60vh;
  }

  .error > div {
    width: 75vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 2vh;
  }

  .error > div > * {
    margin: 0;
    text-align: center;
  }

  .error > div > img {
    height: 15vh;
  }
}
</style>
