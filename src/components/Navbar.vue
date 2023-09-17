<script setup>
import LinkButton from "@/components/LinkButton.vue"
import HiddenMenu from "@/components/HiddenMenu.vue"
import MenuButton from "@/components/MenuButton.vue";
import {ref} from "vue";
import {switchTheme} from "@/assets/js/darkMode"
import {chooseCalendar} from "@/assets/js/calUtils";
import CurrentDate from "@/components/CurrentDate.vue";

defineProps([
  "alignRight"
])

const themeMenu = ref({
  menuButtons:
      [
        {
          onClick: function () {
            switchTheme('light')
          },
          imgLink: "/images/icons/light.png",
          shownTitle: "Light",
        },
        {
          onClick: function () {
            switchTheme('dark')
          },
          imgLink: "/images/icons/dark.png",
          shownTitle: "Dark"
        },
        {
          onClick: function () {
            switchTheme('system')
          },
          imgLink: "/images/icons/system.png",
          shownTitle: "System"
        }
      ]
})

function reloadPage() {
  location.reload();
}

const calendars = ref({
  menuButtons:
      [
        {
          hrefLink: "https://imalonelynerd.fr/edt?url=https%3A%2F%2Fadecampus.univ-rouen.fr%2Fjsp%2Fcustom%2Fmodules%2Fplannings%2Fanonymous_cal.jsp%3Fresources%3D31782%26projectId%3D0%26calType%3Dical%26nbWeeks%3D1%26displayConfigId%3D8",
          imgLink: "/images/icons/calendar.png",
          shownTitle: "L3 TD1 TP1",
        },
        {
          hrefLink: "https://imalonelynerd.fr/edt?url=http%3A%2F%2Fadecampus.univ-rouen.fr%2Fjsp%2Fcustom%2Fmodules%2Fplannings%2Fanonymous_cal.jsp%3Fresources%3D48262%26projectId%3D0%26calType%3Dical%26nbWeeks%3D4%26displayConfigId%3D8",
          imgLink: "/images/icons/calendar.png",
          shownTitle: "L3 TD1 TP2",
        },
        {
          onClick: function () {
            chooseCalendar()
          },
          imgLink: "/images/icons/misc.png",
          shownTitle: "Custom..."
        }
      ]
})


</script>

<template>
  <div class="navbar-container" :class="{ 'align-right' : alignRight }">
    <CurrentDate/>
    <div class="navbar">
      <LinkButton @click="reloadPage" shownTitle="Reload"
                  imgLink="/images/icons/top/today.png"
                  :isImportant="false"/>
      <MenuButton buttonId="calendar" imgLink="/images/icons/top/switch.png" shown-title="Switch"/>
      <MenuButton buttonId="theme" imgLink="/images/icons/top/theme.png" shownTitle="Theme" :isImportant="true"/>
    </div>
  </div>
  <HiddenMenu :menuOptions="themeMenu" menuId="theme" id="theme"/>
  <HiddenMenu :menuOptions="calendars" menuId="calendar" id="calendar"/>
</template>

<style scoped>
@media only screen and (orientation: portrait) {
  .navbar-container {
    display: none !important;
  }
}

.navbar-container {
  z-index: 5;
  background: var(--bg1);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  padding: 16px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.navbar {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.align-right {
  justify-content: end !important;
}

.navbar > *:not(:last-child) {
  margin-right: 8px;
}
</style>