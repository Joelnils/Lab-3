import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// Import bootstraps css and js
import 'bootstrap/dist/css/bootstrap.css'
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.js'

import "./assets/main.css";

const app = createApp(App);

app.use(router);
app.use(bootstrap)
app.mount("#app");
