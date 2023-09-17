<script setup>
import {ref} from "vue";

Date.prototype.dayToString = function () {
  let days = {
    "0": "Monday",
    "1": "Tuesday",
    "2": "Wednesday",
    "3": "Thursday",
    "4": "Friday",
    "5": "Saturday",
    "6": "Sunday"
  }
  return days[this.getDay()];
};

Date.prototype.monthToString = function () {
  let months = {
    "0": "January",
    "1": "February",
    "2": "Marth",
    "3": "April",
    "4": "May",
    "5": "June",
    "6": "July",
    "7": "August",
    "8": "September",
    "9": "October",
    "10": "November",
    "11": "December"
  }
  return months[this.getMonth()];
}

const currentDate = ref(new Date());

</script>

<template>
  <div class="date">
    <h1>{{ currentDate.getDate() }}</h1>
    <div>
      <h2>{{ currentDate.dayToString() }}</h2>
      <h2>{{ currentDate.monthToString() }} {{ currentDate.getFullYear() }}</h2>
    </div>
  </div>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  .date {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 0 !important;
  }

  .date > h1 {
    font-size: 3em;
    margin: 0 24px 0 0;
  }

  .date > div {
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: start;
  }

  .date > div > * {
    margin: 0;
    font-size: 1em;
    font-weight: lighter;
  }
}

@media only screen and (orientation: portrait) {
  .date {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 0 !important;
  }

  .date > h1 {
    font-size: 1.5em;
    margin: 0 1vh 0 0;
  }

  .date > div {
    display: flex;
    flex-direction: row;
    align-items: start;
    justify-content: start;
  }

  .date > div > * {
    margin: 0;
    font-size: 1.5em;
    font-weight: lighter;
  }

  .date > div > *:first-child {
    display: none;
  }

  .date > div > *:not(:last-child) {
    margin-right: 1vh;
  }
}
</style>