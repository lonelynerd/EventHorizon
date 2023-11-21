<script setup>
import MenuOption from "@/components/navbarComponements/MenuOption.vue";

const props = defineProps(
    ['menuOptions', "menuId"]
)

defineEmits([
  'update:menuHidden'
])

const options = props.menuOptions.menuButtons;

</script>

<template>
  <div class="menu-container" @click="$emit('update:menuHidden')">
    <div @click="$emit('update:menuHidden')">
      <MenuOption
          v-for="elem in options"
          v-bind="elem"
      />
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
    background: color-mix(in srgb, var(--bg), transparent 25%);
    z-index: 10;
    animation: blurbg ease-out 0.25s;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .menu-container > div {
    position: fixed;
    right: 0;
    top: 0;
    bottom: 0;
    background: var(--widget);
    width: 256px;
    padding: 16px;
    animation: slidein ease-out 0.25s;
    gap: 8px;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: stretch;
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
    background: color-mix(in srgb, var(--bg), transparent 25%);
    padding: 2vw;
    z-index: 10;
    animation: blurbg ease-out 0.25s;
  }

  .menu-container > div {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 4vw;
    background: var(--widget);
    border-radius: 6vw 6vw 0 0;
    height: fit-content;
    animation: mslidein ease-out 0.25s;

    gap: 4vw;
  }
}
</style>