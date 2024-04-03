import { createApp } from "vue";
import App from "./src/App.vue";
import router from "./src/routes/index";

createApp(App).use(router).mount("#app");
