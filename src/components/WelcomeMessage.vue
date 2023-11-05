<script setup>
</script>

<template>
  <div class="hello">
    <div>
      <img src="/images/welcome.webp">
      <h1>Welcome to EventHorizon</h1>
      <p>Please select a calendar with the buttons above !</p>
    </div>
  </div>
</template>

<style scoped>
@media screen and (orientation: landscape) {
  .hello {
    overflow: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 60vh;
  }

  .hello > div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 16px;
  }

  .hello > div > * {
    margin: 0;
  }

  .hello > div > img {
    height: 96px;
  }
}

@media screen and (orientation: portrait) {
  .hello {
    overflow: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 60vh;
  }

  .hello > div {
    width: 75vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 2vh;
  }

  .hello > div > * {
    text-align: center;
    margin: 0;
  }

  .hello > div > img {
    height: 15vh;
  }
}
</style>
