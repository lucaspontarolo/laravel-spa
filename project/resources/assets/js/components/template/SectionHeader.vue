<template>
  <div class="section-header">
    <h1>
      <i v-if="icon" :class="icon" class="fa-fw mr-2 text-muted"></i>
      {{ title }}
    </h1>
  </div>
</template>

<script>
export default {
  name: 'section-header',

  props: {
    title: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: false,
    },
  },
};
</script>
