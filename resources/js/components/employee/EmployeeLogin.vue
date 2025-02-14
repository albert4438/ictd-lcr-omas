<template>
  <v-app>
    <v-container fluid class="fill-height">
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="4">
          <v-card class="elevation-12">
            <v-toolbar color="primary" dark flat>
              <v-toolbar-title class="text-h5">Employee Login</v-toolbar-title>
            </v-toolbar>
            <v-card-text>
              <div class="text-subtitle-1 text-medium-emphasis mb-4">
                Please sign in with your employee credentials
              </div>
              <v-form ref="form" v-model="valid" @submit.prevent="login">
                <v-text-field
                  v-model="employeeId"
                  :rules="employeeIdRules"
                  label="Employee ID"
                  prepend-icon="mdi-account"
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
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: 'EmployeeLogin',
  data: () => ({
    valid: false,
    employeeId: '',
    employeeIdRules: [
      v => !!v || 'Employee ID is required',
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
          // Here you would typically make an API call to your backend
          const response = await this.axios.post('/api/employee/login', {
            employee_id: this.employeeId,
            password: this.password
          });
          
          // Handle successful login
          this.$router.push('/employee/dashboard');
        } catch (error) {
          // Handle login error
          console.error('Login failed:', error);
        }
      }
    }
  }
}
</script>