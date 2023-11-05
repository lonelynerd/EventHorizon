<script setup>
import HiddenMenu from "@/components/navbarComponements/HiddenMenu.vue";
import {ref} from "vue";
import {switchTheme} from "@/assets/js/darkMode";
import {calendars} from "@/assets/json/presets.js"
import CurrentDate from "@/components/CurrentDate.vue";
import {reload} from "@/assets/js/menuUtils";
import NavbarButton from "@/components/navbarComponements/NavbarButton.vue";

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
  <HiddenMenu v-if="isCalMenuShown" :menuOptions="calMenu"
              @update:menuHidden="isCalMenuShown = false"/>
  <HiddenMenu v-if="isThemeMenuShown"
              :menuOptions="themeMenu"
              @update:menuHidden="isThemeMenuShown = false"/>

  <div class="mobile-navbar-container">
    <CurrentDate />
    <div>
      <NavbarButton shown-title="Refresh" @update:buttonClicked="reload()" img-link="/icons/top/today.webp"/>
      <NavbarButton shown-title="Switch" @update:buttonClicked="isCalMenuShown = true" img-link="/icons/top/switch.webp"/>
      <NavbarButton shown-title="Theme" @update:buttonClicked="isThemeMenuShown = true;" img-link="/icons/top/theme.webp"
                    is-important="true"/>
    </div>
  </div>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  .mobile-navbar-container {
    display: none !important;
  }
}

.mobile-navbar-container {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 16vh;
  padding: 2vh 6vw;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: all 0.25s;
  z-index: 5;
  gap: 2vh;
}

.mobile-navbar-container > div {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  gap: 2vh;
}
</style>