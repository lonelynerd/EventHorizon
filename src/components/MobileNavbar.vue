<script setup>
import MenuButton from "@/components/MenuButton.vue";
import HiddenMenu from "@/components/HiddenMenu.vue";
import CurrentDate from "@/components/CurrentDate.vue";
import {ref} from "vue";
import {switchTheme} from "@/assets/js/darkMode";
import {showMenuUnusual, chooseCalendar} from "@/assets/js/calUtils"
import calendarPresets from "@/assets/json/presets.json"

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

const linksMenu = ref({
  menuButtons:
      [
        {
          click: function () {
            location.reload();
          },
          img: "/edt/images/icons/top/today.png",
          name: "Reload",
        },
        {
          click: function () {
            showMenuUnusual("mcals");
          },
          img: "/edt/images/icons/top/switch.png",
          name: "Switch between calendars",
        }
      ]
})

</script>

<template>
  <div class="mobile-navbar-container">
    <HiddenMenu :menuOptions="linksMenu" menuId="links" id="links"/>
    <HiddenMenu :menuOptions="themeMenu" menuId="mtheme" id="mtheme"/>
    <HiddenMenu :menuOptions="calendarPresets" menuId="mcals" id="mcals" add-custom="true"/>
    <MenuButton buttonId="links" imgLink="/edt/images/icons/top/list.png" shownTitle=""/>
    <CurrentDate/>
    <MenuButton buttonId="mtheme" imgLink="/edt/images/icons/top/theme.png" shownTitle="" :isImportant="true"/>
  </div>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  .mobile-navbar-container {
    display: none !important;
  }
}

.mobile-navbar-container {
  background: var(--bg1);
  z-index: 5;
  padding: 2vh;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
}
</style>