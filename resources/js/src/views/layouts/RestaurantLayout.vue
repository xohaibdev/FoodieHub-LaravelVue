<template>
    <div class="app-container">
        <Sidebar></Sidebar>
        <div class="app-content">
            <Header></Header>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Sidebar from "../../components/restaurants/sidebar.vue";
import Header from "../../components/restaurants/header.vue";

export default {
    components: {
        Sidebar,
        Header,
    },
};
</script>
