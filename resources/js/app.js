import { createApp } from "vue";
import App from "./src/App.vue";
import router from "./src/routes/index";
import store from './store';

createApp(App).use(router).use(store).mount("#app");
