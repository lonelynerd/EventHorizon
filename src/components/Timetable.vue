<script setup>

import {convertDate} from "@/assets/js/calUtils";
import TimeEvent from "@/components/Event.vue";
import {ref} from "vue";
import calendarPresets from "@/assets/json/presets.json"
import ErrorMessage from "@/components/ErrorMessage.vue";

function getURLValues() {

  let search = window.location.search.replace(/^\?/, '').replace(/\+/g, ' ');
  let values = {};

  if (search.length) {
    let part, parts = search.split('&');

    for (let i = 0, iLen = parts.length; i < iLen; i++) {
      part = parts[i].split('=');
      values[part[0]] = window.decodeURIComponent(part[1]);
    }
  }
  return values;
}

let callink = getURLValues()["url"];

if (callink === undefined || callink === "null") {
  callink = calendarPresets.default;
}

async function fetchCal() {
  const response = await fetch("https://imalonelynerd.fr/edt/api/?url=" + encodeURIComponent(callink));
  let jsoned = await response.json();
  console.log(jsoned)
  if(jsoned === undefined || jsoned.hasOwnProperty("error")){
    console.log("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
    return false;
  }
  return jsoned;
}

const fetchedCal = ref(await fetchCal());
</script>

<template>
  <ErrorMessage v-if="fetchedCal === false" :link-used="callink"/>
  <div class="timetable" v-if="fetchedCal !== false">
    <div v-for='key in Object.keys(fetchedCal)'>
      <p>{{ convertDate(key, false) }}</p>
      <div class="day">
        <TimeEvent v-for="elem in fetchedCal[key]"
                   :mainTitle="elem['SUMMARY']"
                   :startTime="elem['DTSTART'][1]"
                   :endTime="elem['DTEND'][1]"
                   :teacher="elem['DESCRIPTION']"
                   :location="elem['LOCATION']"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  .timetable {
    position: absolute;
    overflow: scroll;
    padding: 96px 32px 32px;
    display: flex;
    flex-direction: row;
    align-items: start;
    justify-content: start;
  }

  .timetable > div {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
  }

  .timetable > div:not(:last-child) {
    margin-right: 16px;
  }

  .timetable > div > p {
    text-align: center;
    font-weight: bold;
    background: var(--bg2);
    width: 60%;
    border-radius: 999px;
    padding: 8px;
  }

  .day {
    width: 400px;
  }

  .day > div:not(:last-child) {
    margin-bottom: 16px;
  }
}

@media only screen and (orientation: portrait) {
  .timetable {
    width: 88%;
    position: absolute;
    overflow: scroll;
    padding: 8vh 4% 4% 4%;
    display: flex;
    flex-direction: column;
  }

  .timetable > div {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
  }

  .timetable > div:not(:last-child) {
    margin-bottom: 4vh;
  }

  .timetable > div > p {
    text-align: center;
    font-weight: bold;
    background: var(--bg2);
    width: 30%;
    border-radius: 999px;
    padding: 1.5vh;
  }

  .day {
    width: 100%;
  }

  .day > div:not(:last-child) {
    margin-bottom: 2vh;
  }
}
</style>