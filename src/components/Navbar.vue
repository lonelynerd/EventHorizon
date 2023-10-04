<script setup>
import LinkButton from "@/components/LinkButton.vue"
import HiddenMenu from "@/components/HiddenMenu.vue"
import MenuButton from "@/components/MenuButton.vue";
import {ref} from "vue";
import {switchTheme} from "@/assets/js/darkMode"
import CurrentDate from "@/components/CurrentDate.vue";
import calendarPresets from "@/assets/json/presets.json"

defineProps([
  "alignRight"
])

const themeMenu = ref({
  menuButtons:
      [
        {
          click: function () {
            switchTheme('light')
          },
          img: "/edt/images/icons/light.png",
          name: "Light",
        },
        {
          click: function () {
            switchTheme('dark')
          },
          img: "/edt/images/icons/dark.png",
          name: "Dark"
        },
        {
          click: function () {
            switchTheme('system')
          },
          img: "/edt/images/icons/system.png",
          name: "System"
        }
      ]
})

function reloadPage() {
  location.reload();
}

/*{
  "name": "",
    "img": "",
    "url": ""
}*/

</script>

<template>
  <div class="navbar-container" :class="{ 'align-right' : alignRight }">
    <CurrentDate/>
    <div class="navbar">
      <LinkButton @click="reloadPage" shownTitle="Reload"
                  imgLink="/edt/images/icons/top/today.png"
                  :isImportant="false"/>
      <MenuButton buttonId="calendar" imgLink="/edt/images/icons/top/switch.png" shown-title="Switch"/>
      <MenuButton buttonId="theme" imgLink="/edt/images/icons/top/theme.png" shownTitle="Theme" :isImportant="true"/>
    </div>
  </div>
  <HiddenMenu :menuOptions="themeMenu" menuId="theme" id="theme"/>
  <HiddenMenu :menuOptions="calendarPresets" menuId="calendar" id="calendar" add-custom="true"/>
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