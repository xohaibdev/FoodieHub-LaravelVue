import { createApp } from "vue";
import App from "./src/components/App.vue";
import router from "./src/routes/index";

createApp(App).use(router).mount("#app");
