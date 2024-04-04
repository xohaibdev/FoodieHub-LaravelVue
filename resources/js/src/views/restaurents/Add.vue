<template>
    <div>
        <form @submit.prevent="addRestaurant" class="restaurant-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input
                    type="text"
                    id="name"
                    v-model="restaurant.name"
                    required
                    class="form-input"
                />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input
                    type="email"
                    id="email"
                    v-model="restaurant.email"
                    required
                    class="form-input"
                />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input
                    type="text"
                    id="address"
                    v-model="restaurant.address"
                    required
                    class="form-input"
                />
            </div>
            <div class="form-group">
                <label for="webhook">Webhook:</label>
                <input
                    type="text"
                    id="webhook"
                    v-model="restaurant.webhook_endpoint"
                    required
                    class="form-input"
                />
            </div>
            <button type="submit" class="submit-btn">Add Restaurant</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            restaurant: {
                name: "",
                email: "",
                address: "",
                webhook_endpoint: "",
            },
        };
    },
    methods: {
        async addRestaurant() {
            try {
                const authToken = this.$store.getters.getAuthToken;
                const apiUrl = "/api/restaurants";
                const response = await axios.post(apiUrl, this.restaurant, {
                    headers: {
                        Authorization: `Bearer ${authToken}`,
                    },
                });
                console.log("Restaurant added successfully:", response.data);
                this.$router.push("/");
            } catch (error) {
                console.error("Error adding restaurant:", error);
            }
        },
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
