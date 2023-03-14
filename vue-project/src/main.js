import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import VueCookies from "vue-cookies";

// Import bootstrap css and js
import "bootstrap/dist/css/bootstrap.css";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.js";
import "bootstrap-icons/font/bootstrap-icons.css";
import "./assets/main.css";

const app = createApp(App);

router.beforeEach((to, from, next) => {
  window.scrollTo(0, 0);
  next();
});
app.use(VueCookies);
app.use(router);
app.use(bootstrap);
app.mount("#app");
