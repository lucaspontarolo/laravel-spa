export default {
  install(Vue, options) {
    Vue.prototype.$toast = ({ icon, title }) => {
      return Vue.swal({
        icon,
        title,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
      });
    };
  }
};
