<template>
    <div class="app-content-header">
        <h1 class="app-content-headerText">{{ pageTitle }}</h1>
        <button class="mode-switch" title="Switch Theme">
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
            v-if="showAddRestaurantButton"
            class="app-content-headerButton"
            @click="redirectToAddRestaurant"
        >
            Add Restaurant
        </button>
        <button
            v-if="showAddMenuItemButton"
            class="app-content-headerButton"
            @click="redirectToAddRestaurantItem"
        >
            Add Menu Item
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
        showAddRestaurantButton() {
            return (
                this.$route.name === "restaurants-list" ||
                this.$route.name === "restaurant-details"
            );
        },
        showAddMenuItemButton() {
            return this.$route.name === "restaurant-items-list";
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

        redirectToAddRestaurantItem() {
            this.$router.push({ name: "add-restaurant-items" });
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
                case "restaurant-items-list":
                    this.pageTitle = "Restaurant Items List";
                    break;
                case "restaurant-items-addons-list":
                    this.pageTitle = "Restaurant Items Addons List";
                    break;
                case "add-restaurant-items":
                    this.pageTitle = "Add Menu Item";
                    break;
                default:
                    this.pageTitle = "";
            }
        },
    },
};
</script>
