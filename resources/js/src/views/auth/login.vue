<template>
    <div class="login-dark">
        <form @submit.prevent="handleLogin">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            <h3 style="text-align: center; padding: 15px">Admin Login</h3>
            <div class="form-group">
                <input
                    v-model="email"
                    class="form-control"
                    type="email"
                    name="email"
                    placeholder="Email"
                />
            </div>
            <div class="form-group">
                <input
                    v-model="password"
                    class="form-control"
                    type="password"
                    name="password"
                    placeholder="Password"
                />
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Log In
                </button>
            </div>
            <!-- Display error message if login fails -->
            <div v-if="errorMessage" class="alert alert-danger">
                {{ errorMessage }}
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import { mapActions } from "vuex";

export default {
    data() {
        return {
            email: "",
            password: "",
            errorMessage: "",
            baseUrl: window.baseUrl,
        };
    },
    methods: {
        ...mapActions("auth", ["login"]),
        async handleLogin() {
            try {
                const { success, error } = await this.login({
                    email: this.email,
                    password: this.password,
                });
                if (success) {
                    this.email = "";
                    this.password = "";
                } else {
                    console.error("Login failed:", error);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },
    },
};
</script>

<style lang="css">
@import url("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css");
@import url("https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css");
@import url("../../assets/css/auth/style.css");
</style>
