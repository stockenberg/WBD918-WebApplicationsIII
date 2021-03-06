import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import Axios from "axios";

Vue.config.productionTip = false;
let instance = Axios.create({ baseURL: "http://localhost:8000/api/" });
window.axios = instance;

window.EventHub = new Vue();
// EMIT EVENT
// EventHub.$emit('test');
// LISTEN ON EVENT - in Mounted functions maybe
// EventHub.$on('test');

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
