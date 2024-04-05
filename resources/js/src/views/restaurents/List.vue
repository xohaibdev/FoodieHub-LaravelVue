<template>
    <div class="app-content-actions">
        <input class="search-bar" placeholder="Search..." type="text" />
        <div class="app-content-actions-wrapper">
            <button class="action-button list active" title="List View">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-list"
                >
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01" y2="12" />
                    <line x1="3" y1="18" x2="3.01" y2="18" />
                </svg>
            </button>
            <button class="action-button grid" title="Grid View">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-grid"
                >
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                Name
                <button class="sort-button">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                    >
                        <path
                            fill="currentColor"
                            d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                    </svg>
                </button>
            </div>
            <div class="product-cell category">
                Email<button class="sort-button">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                    >
                        <path
                            fill="currentColor"
                            d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                    </svg>
                </button>
            </div>
            <div class="product-cell status-cell">
                Address<button class="sort-button">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                    >
                        <path
                            fill="currentColor"
                            d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                    </svg>
                </button>
            </div>
            <div class="product-cell sales">
                Webhook<button class="sort-button">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 512 512"
                    >
                        <path
                            fill="currentColor"
                            d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                        />
                    </svg>
                </button>
            </div>
            <div class="product-cell actions">Actions</div>
        </div>
        <div
            v-for="restaurant in restaurants"
            :key="restaurant.id"
            class="products-row"
        >
            <div class="product-cell image">
                <img :src="getRandomImage()" :alt="restaurant.name" />
                <span>{{ restaurant.name }}</span>
            </div>
            <div class="product-cell category">
                <span class="cell-label">Email:</span>{{ restaurant.email }}
            </div>
            <div class="product-cell status-cell">
                <span class="cell-label">Address:</span>{{ restaurant.address }}
            </div>
            <div class="product-cell sales">
                <span class="cell-label">Webhook:</span
                >{{ restaurant.webhook_endpoint }}
            </div>
            <div class="product-cell actions">
                <button
                    @click="deleteRestaurant(restaurant.hashed_id)"
                    style="cursor: pointer"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import image1 from "../../assets/images/533-5339470_restaurant-traditionnel-restaurant-clipart-png-transparent-png.png";
import image2 from "../../assets/images/OIP.jpeg";
import image3 from "../../assets/images/OIP (1).jpeg";
import image4 from "../../assets/images/OIP (2).jpeg";
import image5 from "../../assets/images/restaurant-6281067_960_720.webp";
import image6 from "../../assets/images/restaurant-clip-art-6.png";
import image7 from "../../assets/images/Restaurant-PNG-File-Download-Free.png";
import image8 from "../../assets/images/star-sky.jpg";

export default {
    data() {
        return {
            // restaurants: [],
            images: [
                image1,
                image2,
                image3,
                image4,
                image5,
                image6,
                image7,
                image8,
            ],
        };
    },
    computed: {
        restaurants() {
            return this.$store.getters.getRestaurants;
        },
    },
    mounted() {
        this.fetchRestaurants();
        // Grid View
        document.querySelector(".grid").addEventListener("click", function () {
            document.querySelector(".list").classList.remove("active");
            document.querySelector(".grid").classList.add("active");
            document
                .querySelector(".products-area-wrapper")
                .classList.add("gridView");
            document
                .querySelector(".products-area-wrapper")
                .classList.remove("tableView");
        });

        // List View
        document.querySelector(".list").addEventListener("click", function () {
            document.querySelector(".list").classList.add("active");
            document.querySelector(".grid").classList.remove("active");
            document
                .querySelector(".products-area-wrapper")
                .classList.remove("gridView");
            document
                .querySelector(".products-area-wrapper")
                .classList.add("tableView");
        });

        // Theme Change
        var modeSwitch = document.querySelector(".mode-switch");
        modeSwitch.addEventListener("click", function () {
            document.documentElement.classList.toggle("light");
            modeSwitch.classList.toggle("active");
        });
    },
    methods: {
        getRandomImage() {
            const randomIndex = Math.floor(Math.random() * this.images.length);
            return this.images[randomIndex];
        },
        async fetchRestaurants() {
            try {
                await this.$store.dispatch("fetchAndSaveRestaurants");
            } catch (error) {
                console.error("Error fetching restaurants:", error);
            }
        },
        async deleteRestaurant(restaurantId) {
            try {
                const authToken = this.$store.getters.getAuthToken;
                const apiUrl = `/api/restaurants/${restaurantId}`;
                await axios.delete(apiUrl, {
                    headers: {
                        Authorization: `Bearer ${authToken}`,
                    },
                });
                this.fetchRestaurants();
            } catch (error) {
                console.error("Error deleting restaurant:", error);
            }
        },
    },
};
</script>
<style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css");
@import url("../../assets/css/dashboard/style.css");
</style>
