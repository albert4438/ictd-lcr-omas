<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Register as Administrator
                </h2>
            </div>
            <form class="mt-8 space-y-6" @submit.prevent="handleRegister">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="mb-4">
                        <label for="username" class="sr-only">Username</label>
                        <input id="username" name="username" type="text" v-model="form.username" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Username">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" v-model="form.password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="sr-only">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" 
                            v-model="form.password_confirmation" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirm Password">
                    </div>
                    <div class="mb-4">
                        <label for="first_name" class="sr-only">First Name</label>
                        <input id="first_name" name="first_name" type="text" v-model="form.first_name" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="First Name">
                    </div>
                    <div class="mb-4">
                        <label for="middle_name" class="sr-only">Middle Name</label>
                        <input id="middle_name" name="middle_name" type="text" v-model="form.middle_name"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Middle Name">
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="sr-only">Last Name</label>
                        <input id="last_name" name="last_name" type="text" v-model="form.last_name" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Last Name">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>

                <div class="text-center">
                    <router-link :to="{ name: 'admin.login' }" class="text-sm text-indigo-600 hover:text-indigo-500">
                        Already have an account? Login
                    </router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
    name: 'AdminRegister',
    setup() {
        const router = useRouter();
        const form = ref({
            username: '',
            password: '',
            password_confirmation: '',
            first_name: '',
            middle_name: '',
            last_name: ''
        });

        const handleRegister = async () => {
            try {
                const response = await axios.post('/admin/register', form.value);
                alert('Registration successful! Please login.');
                router.push({ name: 'admin.login' });
            } catch (error) {
                if (error.response && error.response.data) {
                    alert(error.response.data.message || 'Registration failed. Please try again.');
                } else {
                    alert('An error occurred during registration.');
                }
            }
        };

        return {
            form,
            handleRegister
        };
    }
};
</script>
