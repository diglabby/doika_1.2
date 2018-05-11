<template>
  <div class="slackWidget-header">
    <div class="slackWidget-header__title">{{ title }}</div>
    <div class="slackWidget-header__logo">
      <img class="slackWidget-logo" src="../assets/logo.png">
    </div>
    <div class="slackWidget-header__subtitle">{{ subtitle }}</div>
  </div>
</template>

<script>

import {settingsManager} from '../helpers/settingsManager.js'

/** @module chatHeader - chat header component */
export default {

  name: 'chatHeader',

  data () {
    return {
      title: settingsManager.getProperty('title'),
      subtitle: settingsManager.getProperty('subtitle')
      // logo: this.loadLogo(settingsManager.getProperty('logo'))
    }
  },

  methods: {

  /**
    * Check if logo image exists
    * @method loadLogo
    * @param {string} src - logo path
    * @return {string} image path, or 0 if path doesn't exist
    */
    loadLogo: function (src) {
      var image = new Image(src)

      image.onload = function () {
        return src
      }

      image.onerror = function () {
        return 0
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  @import "../scss/global.scss";

  .slackWidget-header-container{
    width: 100%;
    height: 25%;
    position: relative;
    padding: 15px 0;
  }

  .slackWidget-logo {
    width: 100%;
    height: auto;
  }

  .slackWidget-header {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row-reverse;
    flex-wrap: nowrap;

    height: 70px;
    min-height: 70px;
    width: 100%;

    background-color: $mainColor;

    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.5);
    z-index: 2;
    padding: 5px 20px;

    &__logo {
      width: $elementsWidth;
      min-width: $elementsWidth;
      height: $elementsHeight;
      padding: $elementsPadding;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      border-radius: 50%;
      box-sizing: border-box;
      //border: 3px solid $thirdColor;
      //background-color: $thirdColor;
    }

    &__title {
      font-family: $secondaryFont;
      color: $secondaryColor;
      font-weight: 500;
      font-size: 20px;
      margin-right: auto;
      margin-left: 5%;
    }

    &__subtitle {
      font-size: 16px;
      font-family: $mainFont;
      font-size: 20px;
      font-weight: 500;
      display: none;
    }
  }
</style>
