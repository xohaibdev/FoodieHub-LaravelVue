<template>
    <div>
        <form @submit.prevent="addItem" class="restaurant-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input
                    type="text"
                    id="name"
                    v-model="item.name"
                    required
                    class="form-input"
                />
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input
                    type="number"
                    id="price"
                    v-model="item.price"
                    required
                    class="form-input"
                />
            </div>
            <div class="form-group">
                <label for="restaurant">Restaurant:</label>
                <select
                    v-model="item.restaurant_id"
                    required
                    class="form-input"
                >
                    <option
                        v-for="restaurant in restaurants"
                        :key="restaurant.hashed_id"
                        :value="restaurant.hashed_id"
                    >
                        {{ restaurant.name }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="addons">Add ons (Comma separated):</label>
                <input
                    type="text"
                    id="addons"
                    v-model="item.addons"
                    class="form-input"
                />
            </div>
            <button type="submit" class="submit-btn">Add Item</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            item: {
                name: "",
                price: "",
                restaurant_id: "",
                addons: "",
            },
            restaurants: [],
        };
    },
    computed: {
        restaurants() {
            return this.$store.getters.getRestaurants;
        },
    },
    methods: {
        async addItem() {
            try {
                console.log(this.item);
                const authToken = this.$store.getters.getAuthToken;
                const apiUrl = "/api/items";
                const response = await axios.post(apiUrl, this.item, {
                    headers: {
                        Authorization: `Bearer ${authToken}`,
                    },
                });
                console.log("Item added successfully:", response.data);
                this.$router.push("/restaurants/items");
            } catch (error) {
                console.error("Error adding item:", error);
            }
        },
        async fetchRestaurants() {
            try {
                await this.$store.dispatch("fetchAndSaveRestaurants");
            } catch (error) {
                console.error("Error fetching restaurants:", error);
            }
        },
    },
    mounted() {
        this.fetchRestaurants();
    },
};
</script>

<style scoped>
@import url("https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css");
@import url("../../assets/css/dashboard/style.css");
.restaurant-form {
    max-width: 400px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}
.form-group > label {
    color: white;
}
.label {
    font-weight: bold;
}

.form-input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: white;
}

.submit-btn {
    background-color: #2869ff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.submit-btn:hover {
    background-color: #2869ff;
}
</style>
