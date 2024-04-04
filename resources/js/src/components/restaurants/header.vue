<template>
    <div class="app-content-header">
        <h1 class="app-content-headerText">{{ pageTitle }}</h1>
        <button class="mode-switch" title="Switch Theme" v-if="showAddButton">
            <svg
                class="moon"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                width="24"
                height="24"
                viewBox="0 0 24 24"
            >
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
        <button
            v-if="showAddButton"
            class="app-content-headerButton"
            @click="redirectToAddRestaurant"
        >
            Add Restaurant
        </button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            pageTitle: "",
        };
    },
    computed: {
        showAddButton() {
            return this.$route.name === "restaurants-list";
        },
    },
    watch: {
        $route(to) {
            this.updatePageTitle(to);
        },
    },
    created() {
        this.updatePageTitle(this.$route);
    },
    methods: {
        redirectToAddRestaurant() {
            this.$router.push({ name: "add-restaurant" });
        },

        updatePageTitle(route) {
            switch (route.name) {
                case "restaurants-list":
                    this.pageTitle = "Restaurants List";
                    break;
                case "restaurant-details":
                    this.pageTitle = "Restaurant Details";
                    break;
                case "add-restaurant":
                    this.pageTitle = "Add Restaurant";
                    break;
                default:
                    this.pageTitle = "";
            }
        },
    },
};
</script>
