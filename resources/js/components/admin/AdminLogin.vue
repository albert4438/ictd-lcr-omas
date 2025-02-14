<template>
  <v-app>
    <v-container fluid class="fill-height">
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="4">
          <v-card class="elevation-12">
            <v-toolbar color="primary" dark flat>
              <v-toolbar-title class="text-h5">Administrator Login</v-toolbar-title>
            </v-toolbar>
            <v-card-text>
              <div class="text-subtitle-1 text-medium-emphasis mb-4">
                Please sign in to access the admin dashboard
              </div>
              <v-form ref="form" v-model="valid" @submit.prevent="login">
                <v-text-field
                  v-model="username"
                  :rules="usernameRules"
                  label="Username"
                  prepend-icon="mdi-account"
                  type="text"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="password"
                  :rules="passwordRules"
                  label="Password"
                  prepend-icon="mdi-lock"
                  :type="showPassword ? 'text' : 'password'"
                  :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                  @click:append="showPassword = !showPassword"
                  required
                ></v-text-field>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn 
                color="primary"
                @click="login"
                :disabled="!valid"
              >
                Login
              </v-btn>
            </v-card-actions>
            <v-card-text class="text-center">
              <router-link :to="{ name: 'admin.register' }" class="text-decoration-none">
                Don't have an account? Register
              </router-link>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AdminLogin',
  data: () => ({
    valid: false,
    username: '',
    usernameRules: [
      v => !!v || 'Username is required',
      v => v.length >= 3 || 'Username must be at least 3 characters',
    ],
    password: '',
    passwordRules: [
      v => !!v || 'Password is required',
      v => v.length >= 6 || 'Password must be at least 6 characters',
    ],
    showPassword: false
  }),
  methods: {
    async login() {
      if (this.$refs.form.validate()) {
        try {
          // Add CSRF token to axios headers
          const token = document.head.querySelector('meta[name="csrf-token"]');
          if (token) {
            axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
          }
          
          console.log('Attempting login with:', {
            username: this.username,
            password: '***'
          });

          const response = await axios.post('/admin/login', {
            username: this.username,
            password: this.password
          });
          
          console.log('Login response:', response.data);
          
          // Store user data in localStorage or Vuex if needed
          localStorage.setItem('user', JSON.stringify(response.data.user));
          
          // Navigate to dashboard
          this.$router.push({ name: 'admin.dashboard' });
        } catch (error) {
          // Handle login error
          console.error('Login error:', error.response || error);
          let errorMessage = 'Login failed. Please try again.';
          if (error.response && error.response.data && error.response.data.message) {
            errorMessage = error.response.data.message;
          }
          alert(errorMessage);
        }
      }
    }
  }
}
</script>