<template>
  <div class="invalid-feedback" v-if="hasErrors()">
    <strong>{{ getError() }}</strong>
  </div>
</template>
<script>
export default {
  name: 'has-error',

  props: {
    errors: {},
    field: '',
  },

  methods: {
    hasErrors: function () {
      return !!this.errors && this.errors[this.field] !== undefined;
    },

    getError: function () {
      return this.errors[this.field][0];
    },
  },
};
</script>
