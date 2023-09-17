<script setup>

import {convertDate} from "@/assets/js/calUtils.js"

defineProps([
  'mainTitle',
  'startTime',
  'endTime',
  'teacher',
  'location',
])

function spanner(text) {
  let res = text.match("^([A-Za-z]{2}[0-9]{0,1})(.*)$");
  return `<span>${res[1]}</span>${res[2]}`;
}

function removeParenthesis(text) {
  //console.log(text.replace("/\\([^)]*\\)\ /g", ""));
  return text.replace("/\"/\([^()]*\) */g");
}

</script>

<template>
  <div class="event">
    <h1 v-html="spanner(mainTitle)"></h1>
    <div>
      <div>
        <img src="/images/icons/event/clock.png">
        <p>{{ convertDate(startTime, true) }} - {{ convertDate(endTime, true) }}</p>
      </div>
      <div>
        <img src="/images/icons/event/location.png">
        <p>{{ removeParenthesis(location) }}</p>
      </div>
      <div>
        <img src="/images/icons/event/teacher.png">
        <p>{{ teacher }}</p>
      </div>

    </div>
  </div>
</template>

<style scoped>
@media only screen and (orientation: landscape) {
  .event {
    background: var(--bg2);
    border-radius: 16px;
    padding: 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
  }

  .event > h1 {
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
    font-size: 1em;
    margin: 0 0 16px 0;
  }

  .event > div {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
  }

  .event > div > div {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .event > div > div:not(:last-child) {
    margin-bottom: 16px;
  }

  .event > div > div > img {
    height: 1em;
    margin: 0 8px 0 0;
  }

  .event > div > div > p {
    font-size: 0.9em;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
  }
}

@media only screen and (orientation: portrait) {
  .event {
    background: var(--bg2);
    border-radius: 2vh;
    padding: 4vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
  }

  .event > h1 {
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
    font-size: 1.25em;
    margin: 0 0 2vh 0;
  }

  .event > div {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
  }

  .event > div > div {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .event > div > div:not(:last-child) {
    margin-bottom: 16px;
  }

  .event > div > div > img {
    height: 1em;
    margin: 0 1vh 0 0;
  }

  .event > div > div > p {
    font-size: 1em;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
  }
}
</style>