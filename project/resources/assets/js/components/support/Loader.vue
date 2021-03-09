<template>
  <div>
    <div v-if="showLoader" class="d-flex justify-content-center align-items-center container-loader">
      <div class="spinner-border text-primary"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "loader",

  props: {
    showLoader: {
      required: true
    }
  }
};
</script>

<style scoped>
.container-loader {
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #fcfcfc6b;
  z-index: 99999;
}
</style>
