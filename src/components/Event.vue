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
  return text.replace("/\"/\([^()]*\) */g");
}

function isNow(sT, eT){
  let d = new Date();
  let dt = `${d.getHours()}_${d.getMinutes()}`;
  return sT <= dt <= eT;
}

</script>

<template>
  <div class="event" :class="{ 'isnow' : isNow(startTime, endTime) }">
    <h1 v-html="spanner(mainTitle)"></h1>
    <div>
      <div>
        <img src="/icons/event/clock.webp">
        <p>{{ convertDate(startTime, true) }} - {{ convertDate(endTime, true) }}</p>
      </div>
      <div>
        <img src="/icons/event/location.webp">
        <p>{{ removeParenthesis(location) }}</p>
      </div>
      <div>
        <img src="/icons/event/teacher.webp">
        <p>{{ teacher }}</p>
      </div>

    </div>
  </div>
</template>

<style scoped>
@media only screen and (orientation: landscape) {
  .event {
    border-radius: 16px;
    padding: 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
    background: var(--widget);
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
    gap: 12px;
  }

  .event > div > div {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }

  .event > div > div > img {
    height: 1em;
    margin: 0 8px 0 0;
    filter: var(--icon);
  }

  .event > div > div > p {
    font-size: 0.9em;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
  }

  .isnow {
    background: var(--widget-imp);
  }
}

@media only screen and (orientation: portrait) {
  .event {
    border-radius: 2vh;
    padding: 3vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
    background: var(--widget);
  }

  .event > h1 {
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
    font-size: 1em;
    margin: 0 0 2vh 0;
  }

  .event > div {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
    gap: 2vh;
  }

  .event > div > div {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }

  .event > div > div > img {
    height: 1em;
    margin: 0 1vh 0 0;
    filter: var(--icon);
  }

  .event > div > div > p {
    font-size: 0.9em;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
  }

  .isnow {
    background: var(--widget-imp);
  }
}
</style>