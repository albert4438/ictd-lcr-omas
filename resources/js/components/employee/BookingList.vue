<template>
  <v-card>
    <v-card-title>
      Manage Bookings
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>

    <v-data-table
      :headers="headers"
      :items="bookings"
      :search="search"
      :loading="loading"
    >
      <template v-slot:item.status="{ item }">
        <v-chip
          :color="getStatusColor(item.status)"
          small
        >
          {{ item.status }}
        </v-chip>
      </template>

      <template v-slot:item.actions="{ item }">
        <v-btn-group>
          <v-btn
            small
            color="success"
            @click="updateStatus(item.id, 'approved')"
            :disabled="item.status !== 'pending'"
          >
            Approve
          </v-btn>
          <v-btn
            small
            color="error"
            @click="updateStatus(item.id, 'cancelled')"
            :disabled="item.status === 'completed'"
          >
            Cancel
          </v-btn>
          <v-btn
            small
            color="info"
            @click="updateStatus(item.id, 'completed')"
            :disabled="item.status !== 'approved'"
          >
            Complete
          </v-btn>
        </v-btn-group>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      search: '',
      loading: false,
      headers: [
        { text: 'Client', value: 'client.name' },
        { text: 'Service', value: 'service_type' },
        { text: 'Date', value: 'scheduled_date' },
        { text: 'Time', value: 'scheduled_time' },
        { text: 'Status', value: 'status' },
        { text: 'Actions', value: 'actions', sortable: false }
      ],
      bookings: []
    }
  },
  methods: {
    getStatusColor(status) {
      const colors = {
        pending: 'warning',
        approved: 'primary',
        completed: 'success',
        cancelled: 'error'
      }
      return colors[status] || 'grey'
    },
    async updateStatus(bookingId, status) {
      try {
        await axios.patch(`/employee/bookings/${bookingId}/status`, { status })
        this.fetchBookings()
      } catch (error) {
        console.error('Error updating booking status:', error)
      }
    },
    async fetchBookings() {
      this.loading = true
      try {
        const response = await axios.get('/employee/bookings')
        this.bookings = response.data
      } catch (error) {
        console.error('Error fetching bookings:', error)
      } finally {
        this.loading = false
      }
    }
  },
  mounted() {
    this.fetchBookings()
  }
}
</script>
