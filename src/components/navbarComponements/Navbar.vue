<script setup>
import NavbarButton from "@/components/navbarComponements/NavbarButton.vue"
import HiddenMenu from "@/components/navbarComponements/HiddenMenu.vue"
import {ref} from "vue";
import {switchTheme} from "@/assets/js/darkMode"
import {calendars} from "@/assets/json/presets.js"
import CurrentDate from "@/components/CurrentDate.vue";
import {reload} from "@/assets/js/menuUtils";

const isThemeMenuShown = ref(false);
const isCalMenuShown = ref(false);

const calMenu = ref(calendars());
const themeMenu = ref({
  menuButtons:
      [
        {
          onClick: function () {
            switchTheme('sage')
          },
          imgLink: `/icons/theme/sage.webp`,
          shownTitle: "Sage",
        },
        {
          onClick: function () {
            switchTheme('stars')
          },
          imgLink: `/icons/theme/stars.webp`,
          shownTitle: "Stars"
        }
      ]
});

</script>

<template>
  <div class="navbar-container">
    <CurrentDate />
    <div class="navbar">
      <NavbarButton shown-title="Refresh" @update:buttonClicked="reload()" img-link="/icons/top/today.webp"/>
      <NavbarButton shown-title="Switch" @update:buttonClicked="isCalMenuShown = true" img-link="/icons/top/switch.webp"/>
      <NavbarButton shown-title="Theme" @update:buttonClicked="isThemeMenuShown = true;" img-link="/icons/top/theme.webp"
                    is-important="true"/>

    </div>
  </div>
  <HiddenMenu v-if="isThemeMenuShown === true" :menuOptions="themeMenu"
              @update:menuHidden="isThemeMenuShown = false"/>
  <HiddenMenu v-if="isCalMenuShown === true" :menuOptions="calMenu"
              @update:menuHidden="isCalMenuShown = false"/>

</template>

<style scoped>
@media only screen and (orientation: portrait) {
  div {
    display: none !important;
  }
}

.navbar-container {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 128px;
  padding: 0 32px;
  display: flex;
  z-index: 5;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  transition: all 0.25s;
}

.navbar {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 12px;
}
</style>