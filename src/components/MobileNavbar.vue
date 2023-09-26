<script setup>
import MenuButton from "@/components/MenuButton.vue";
import HiddenMenu from "@/components/HiddenMenu.vue";
import CurrentDate from "@/components/CurrentDate.vue";
import {ref} from "vue";
import {switchTheme} from "@/assets/js/darkMode";
import {showMenuUnusual, chooseCalendar} from "@/assets/js/calUtils"

const themeMenu = ref({
  menuButtons:
      [
        {
          onClick: function () {
            switchTheme('light')
          },
          imgLink: "/edt/images/icons/light.png",
          shownTitle: "Light",
        },
        {
          onClick: function () {
            switchTheme('dark')
          },
          imgLink: "/edt/images/icons/dark.png",
          shownTitle: "Dark"
        },
        {
          onClick: function () {
            switchTheme('system')
          },
          imgLink: "/edt/images/icons/system.png",
          shownTitle: "System"
        }
      ]
})

const linksMenu = ref({
  menuButtons:
      [
        {
          onClick: function () {
            location.reload();
          },
          imgLink: "/edt/images/icons/top/today.png",
          shownTitle: "Reload",
        },
        {
          onClick: function () {
            showMenuUnusual("mcals");
          },
          imgLink: "/edt/images/icons/top/switch.png",
          shownTitle: "Switch between calendars",
        }
      ]
})

const calendars = ref({
  menuButtons:
      [
        {
          hrefLink: "https://imalonelynerd.fr/edt?url=https%3A%2F%2Fadecampus.univ-rouen.fr%2Fjsp%2Fcustom%2Fmodules%2Fplannings%2Fanonymous_cal.jsp%3Fresources%3D31782%26projectId%3D0%26calType%3Dical%26nbWeeks%3D1%26displayConfigId%3D8",
          imgLink: "/edt/images/icons/calendar.png",
          shownTitle: "L3 TD1 TP1",
        },
        {
          hrefLink: "https://imalonelynerd.fr/edt?url=http%3A%2F%2Fadecampus.univ-rouen.fr%2Fjsp%2Fcustom%2Fmodules%2Fplannings%2Fanonymous_cal.jsp%3Fresources%3D48262%26projectId%3D0%26calType%3Dical%26nbWeeks%3D4%26displayConfigId%3D8",
          imgLink: "/edt/images/icons/calendar.png",
          shownTitle: "L3 TD1 TP2",
        },
        {
          onClick: function () {
            chooseCalendar()
          },
          imgLink: "/edt/images/icons/misc.png",
          shownTitle: "Custom..."
        }
      ]
})

</script>

<template>
  <div class="mobile-navbar-container">
    <HiddenMenu :menuOptions="linksMenu" menuId="links" id="links"/>
    <HiddenMenu :menuOptions="themeMenu" menuId="mtheme" id="mtheme"/>
    <HiddenMenu :menuOptions="calendars" menuId="mcals" id="mcals"/>
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