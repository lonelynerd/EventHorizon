<script setup>
import MenuOption from "@/components/MenuOption.vue";

const props = defineProps(
    ['menuOptions',"menuId"]
)

const options = props.menuOptions.menuButtons;

function hideMenu() {
  document.getElementById(props.menuId).style.display = 'none';
}

</script>

<template>
  <div class="menu-container" @click="hideMenu">
    <div>
      <MenuOption
          v-for="elem in options"
          v-bind="elem"/>
    </div>
  </div>
</template>

<style scoped>

@media only screen and (orientation: landscape) {
  .menu-container {
    margin: 0;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #00000080;
    padding: 48px;
    display: none;
    z-index: 10;
  }

  .menu-container > div {
    background: var(--bg1);
    border-radius: 32px;
    width: fit-content;
    height: fit-content;
    padding: 24px;
    float: right;
    animation: slidein ease-out 0.25s;
  }
}

@media only screen and (orientation: portrait) {
  .menu-container {
    margin: 0;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #00000080;
    padding: 1vh;
    display: none;
    z-index: 10;
  }

  .menu-container > div {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2vh;
    background: var(--bg1);
    border-radius: 2vh 2vh 0 0;
    height: fit-content;
    animation: mslidein ease-out 0.25s;
  }
}
</style>