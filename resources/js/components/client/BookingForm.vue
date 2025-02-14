<template>
  <v-card class="pa-4">
    <v-form @submit.prevent="submitForm">
      <v-card-title>Book a Schedule</v-card-title>
      
      <v-select
        v-model="form.service_type"
        :items="serviceTypes"
        label="Service Type"
        required
      ></v-select>

      <v-date-picker
        v-model="form.scheduled_date"
        label="Select Date"
        required
      ></v-date-picker>

      <v-time-picker
        v-model="form.scheduled_time"
        format="24hr"
        label="Select Time"
        required
      ></v-time-picker>

      <v-textarea
        v-model="form.notes"
        label="Additional Notes"
        rows="3"
      ></v-textarea>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          color="primary"
          type="submit"
          :loading="loading"
        >
          Submit Booking
        </v-btn>
      </v-card-actions>
    </v-form>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      form: {
        service_type: '',
        scheduled_date: '',
        scheduled_time: '',
        notes: ''
      },
      loading: false,
      serviceTypes: [
        'Consultation',
        'Document Processing',
        'General Inquiry'
      ]
    }
  },
  methods: {
    async submitForm() {
      this.loading = true
      try {
        await axios.post('/client/bookings', this.form)
        this.$emit('booking-created')
        this.$router.push({ name: 'client.bookings.index' })
      } catch (error) {
        console.error('Error creating booking:', error)
      } finally {
        this.loading = false
      }
    }
  }
}
</script>
