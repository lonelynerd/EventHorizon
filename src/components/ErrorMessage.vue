<script setup>
defineProps(["linkUsed"]);

let rick = setTimeout(function () {
  let audio = new Audio('/edt/music/rick.mp3');
  audio.play();
}, 5000);

/*let curTheme = document.querySelector('html').dataset.theme === "theme-light";
document.documentElement.style.setProperty('--bg3', curTheme?"#FFA0A0":"#2F0000");*/
</script>

<template>
  <div class="error">
    <div>
      <img src="/images/error.png">
      <h1>An error occured</h1>
      <p>The given URL returns invalid or corrupt data. Please try again.</p>
    </div>
  </div>
</template>

<style scoped>
@media screen and (orientation: landscape) {
  .error {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    overflow: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .error > div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .error > div > * {
    margin: 0;
  }

  .error > div > *:not(:last-child) {
    margin-bottom: 16px;
  }

  .error > div > img {
    height: 96px;
  }
}

@media screen and (orientation: portrait) {
  .error {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    overflow: scroll;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .error > div {
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .error > div > * {
    margin: 0;
  }

  .error > div > *:not(:last-child) {
    margin-bottom: 2vh;
  }

  .error > div > img {
    height: 15vh;
  }
}
</style>
