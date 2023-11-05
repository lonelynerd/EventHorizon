<script setup>

import {convertDate} from "@/assets/js/calUtils";
import Event from "@/components/Event.vue";
import {ref} from "vue";
import ErrorMessage from "@/components/ErrorMessage.vue";
import WelcomeMessage from "@/components/WelcomeMessage.vue";

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

const noLink = ref(false);
const fetchedCal = ref(false);

if (callink === undefined || callink === "null") {
  noLink.value = true;
} else {
  fetchedCal.value = await fetchCal();
}

async function fetchCal() {
  const response = await fetch("https://horizon.imalonelynerd.fr/api/?url=" + encodeURIComponent(callink));
  let jsoned = await response.json();
  if (jsoned === undefined || jsoned.hasOwnProperty("error")) {
    return false;
  }
  return jsoned;
}

function isDay(date){
  let d = new Date();
  let dt = `${d.getFullYear()}_${d.getMonth() + 1}_${d.getDate() < 10 ? '0' + d.getDate() : d.getDate()}`;
  return date.startsWith(dt);
}

</script>

<template>
  <div class="ttcontainer">
    <WelcomeMessage v-if="noLink === true"/>
    <ErrorMessage v-if="!fetchedCal && !noLink"/>
    <div class="timetable" v-if="fetchedCal !== false">
      <div v-for='key in Object.keys(fetchedCal)'>
        <p :class="{ 'isday' : isDay(key)}">{{ convertDate(key, false) }}</p>
        <div class="day">
          <Event v-for="elem in fetchedCal[key]"
                 :mainTitle="elem['SUMMARY']"
                 :startTime="elem['DTSTART'][1]"
                 :endTime="elem['DTEND'][1]"
                 :teacher="elem['DESCRIPTION']"
                 :location="elem['LOCATION']"
          />
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped>

@media only screen and (orientation: landscape) {
  .ttcontainer {
    position: absolute;
    top: 128px;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: scroll;
    padding: 32px;
    border-radius: 16px 16px 0 0;
    display: flex;
    flex-direction: row;
    align-items: start;
    justify-content: start;
    background: var(--bg);
    animation: Hewwo ease-out 0.75s;
  }

  .timetable {
    display: flex;
    flex-direction: row;
    align-items: start;
    justify-content: start;
    gap: 16px;
  }

  .timetable > div {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
    gap: 24px;
  }

  .timetable > div > p {
    text-align: center;
    font-weight: bold;
    background: var(--widget);
    width: 60%;
    border-radius: 999px;
    padding: 8px;
    margin: 0;
  }

  .day {
    width: 400px;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: center;
    gap: 16px;
  }

  .isday {
    background: var(--widget-imp) !important;
  }
}

@media only screen and (orientation: portrait) {
  .ttcontainer {
    position: absolute;
    top: 20vh;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: scroll;
    padding: 3vh;
    border-radius: 2vh 2vh 0 0;
    display: flex;
    flex-direction: row;
    align-items: start;
    justify-content: start;
    background: var(--bg);
    animation: Hewwo ease-out 0.75s;
  }

  .timetable {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: start;
    gap: 6vh;
  }

  .timetable > div {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
    gap: 2vh;
  }

  .timetable > div > p {
    text-align: center;
    font-weight: bold;
    background: var(--widget);
    width: 60%;
    border-radius: 20vh;
    padding: 1vh;
    margin: 0;
  }

  .day {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: center;
    gap: 2vh;
  }

  .isday {
    background: var(--widget-imp) !important;
  }
}
</style>