<template>
  <v-app>
    <!-- Navigation Bar -->
    <v-app-bar app color="white" elevation="1">
      <v-container class="d-flex align-center">
        <v-toolbar-title class="text-h6 font-weight-bold">
          LCR Gen Santos
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn text class="text-none mx-2" to="/">Home</v-btn>
        <v-btn text class="text-none mx-2" href="#services">Services</v-btn>
        <v-btn text class="text-none mx-2" href="#portfolio">Portfolio</v-btn>
        <v-btn text class="text-none mx-2" href="#contact">Contact</v-btn>
        <v-btn color="primary" class="text-none ml-4">Book Now</v-btn>
      </v-container>
    </v-app-bar>

    <v-main>
      <!-- Hero Section -->
      <v-container fluid class="pa-0">
        <v-parallax
          src="/images/wedding-banner.jpg"
          height="600"
        >
          <div class="hero-overlay"></div>
          <v-row
            align="center"
            justify="center"
            style="height: 100%;"
          >
            <v-col cols="12" sm="10" md="8" class="text-center">
              <h1 class="text-h2 font-weight-bold white--text mb-4">
                Capturing Life's Beautiful Moments
              </h1>
              <!-- <h2 class="text-h5 white--text mb-8">
                Professional Photography Services in General Santos City
              </h2> -->
              <v-btn
                x-large
                color="primary"
                class="text-uppercase mr-4"
                href="#contact"
              >
                Book a Session
              </v-btn>
              <!-- <v-btn
                x-large
                outlined
                color="white"
                class="text-uppercase"
                href="#portfolio"
              >
                View Portfolio
              </v-btn> -->
            </v-col>
          </v-row>
        </v-parallax>
      </v-container>

      <!-- Services Section -->
      <v-container id="services" class="py-16">
        <v-row>
          <v-col cols="12" class="text-center mb-12">
            <h2 class="text-h3 font-weight-bold mb-3">Our Services</h2>
            <!-- <p class="text-subtitle-1 grey--text">
              Professional photography services tailored to your special moments
            </p> -->
          </v-col>
          <v-col cols="12" md="4">
            <v-hover v-slot="{ hover }">
              <v-card
                class="mx-auto transition-swing"
                :elevation="hover ? 12 : 2"
                height="100%"
              >
                <v-img
                  height="250"
                  src="/images/wedding.jpg"
                  class="align-end"
                >
                  <v-overlay
                    absolute
                    :value="hover"
                    opacity="0.7"
                  >
                    <v-btn
                      color="white"
                      outlined
                    >
                      Learn More
                    </v-btn>
                  </v-overlay>
                </v-img>
                <v-card-title class="text-h5">Wedding Photography</v-card-title>
                <v-card-text>
                  <!-- <p class="mb-4">Professional wedding photography services to capture your special day with style and elegance.</p> -->
                  <v-chip-group>
                    <!-- <v-chip small>Ceremony</v-chip> -->
                    <v-chip small>Reception</v-chip>
                    <v-chip small>Full Day</v-chip>
                  </v-chip-group>
                </v-card-text>
              </v-card>
            </v-hover>
          </v-col>
          <v-col cols="12" md="4">
            <v-hover v-slot="{ hover }">
              <v-card
                class="mx-auto transition-swing"
                :elevation="hover ? 12 : 2"
                height="100%"
              >
                <v-img
                  height="250"
                  src="/images/prenup.jpg"
                  class="align-end"
                >
                  <v-overlay
                    absolute
                    :value="hover"
                    opacity="0.7"
                  >
                    <v-btn
                      color="white"
                      outlined
                    >
                      Learn More
                    </v-btn>
                  </v-overlay>
                </v-img>
                <v-card-title class="text-h5">Pre-nuptial Sessions</v-card-title>
                <v-card-text>
                  <p class="mb-4">Beautiful pre-wedding photo sessions to document your love story in stunning locations.</p>
                  <v-chip-group>
                    <v-chip small>Indoor</v-chip>
                    <v-chip small>Outdoor</v-chip>
                    <v-chip small>Multiple Locations</v-chip>
                  </v-chip-group>
                </v-card-text>
              </v-card>
            </v-hover>
          </v-col>
          <v-col cols="12" md="4">
            <v-hover v-slot="{ hover }">
              <v-card
                class="mx-auto transition-swing"
                :elevation="hover ? 12 : 2"
                height="100%"
              >
                <v-img
                  height="250"
                  src="/images/events.jpg"
                  class="align-end"
                >
                  <v-overlay
                    absolute
                    :value="hover"
                    opacity="0.7"
                  >
                    <v-btn
                      color="white"
                      outlined
                    >
                      Learn More
                    </v-btn>
                  </v-overlay>
                </v-img>
                <v-card-title class="text-h5">Special Events</v-card-title>
                <v-card-text>
                  <p class="mb-4">Professional coverage for engagement parties, anniversaries, and other special occasions.</p>
                  <v-chip-group>
                    <v-chip small>Birthdays</v-chip>
                    <v-chip small>Corporate</v-chip>
                    <v-chip small>Celebrations</v-chip>
                  </v-chip-group>
                </v-card-text>
              </v-card>
            </v-hover>
          </v-col>
        </v-row>
      </v-container>

      <!-- Portfolio Section -->
      <v-container fluid id="portfolio" class="grey lighten-4 py-16">
        <v-container>
          <v-row>
            <v-col cols="12" class="text-center mb-12">
              <h2 class="text-h3 font-weight-bold mb-3">Our Portfolio</h2>
              <p class="text-subtitle-1 grey--text">
                A glimpse of our best work and happy clients
              </p>
            </v-col>
          </v-row>
          <v-row>
            <v-col
              v-for="(image, index) in portfolioImages"
              :key="index"
              cols="12"
              sm="6"
              md="4"
            >
              <v-hover v-slot="{ hover }">
                <v-card
                  flat
                  :class="{ 'on-hover': hover }"
                  @click="openGallery(index)"
                >
                  <v-img
                    :src="image.src"
                    aspect-ratio="1"
                    class="grey lighten-2"
                  >
                    <v-overlay
                      absolute
                      :value="hover"
                      opacity="0.7"
                    >
                      <v-btn
                        color="white"
                        icon
                      >
                        <v-icon>mdi-magnify-plus</v-icon>
                      </v-btn>
                    </v-overlay>
                  </v-img>
                </v-card>
              </v-hover>
            </v-col>
          </v-row>
        </v-container>
      </v-container>

      <!-- Contact Section -->
      <v-container id="contact" class="py-16">
        <v-row>
          <v-col cols="12" class="text-center mb-12">
            <h2 class="text-h3 font-weight-bold mb-3">Contact Us</h2>
            <p class="text-subtitle-1 grey--text">
              Get in touch to book your session or inquire about our services
            </p>
          </v-col>
          <v-col cols="12" md="6" offset-md="3">
            <v-card class="pa-6" elevation="4">
              <v-form ref="form" v-model="valid">
                <v-text-field
                  v-model="contact.name"
                  :rules="nameRules"
                  label="Your Name"
                  required
                  outlined
                  dense
                ></v-text-field>
                <v-text-field
                  v-model="contact.email"
                  :rules="emailRules"
                  label="Email"
                  required
                  type="email"
                  outlined
                  dense
                ></v-text-field>
                <v-text-field
                  v-model="contact.phone"
                  :rules="phoneRules"
                  label="Phone Number"
                  required
                  outlined
                  dense
                ></v-text-field>
                <v-select
                  v-model="contact.service"
                  :items="services"
                  label="Service Type"
                  required
                  outlined
                  dense
                ></v-select>
                <v-textarea
                  v-model="contact.message"
                  label="Message"
                  required
                  outlined
                  dense
                ></v-textarea>
                <v-btn
                  color="primary"
                  block
                  large
                  :loading="loading"
                  :disabled="!valid"
                  @click="submitForm"
                >
                  Send Message
                </v-btn>
              </v-form>
            </v-card>
          </v-col>
        </v-row>
      </v-container>

      <!-- Footer -->
      <v-footer
        padless
        class="mt-16"
      >
        <v-card
          flat
          tile
          width="100%"
          class="primary white--text text-center"
        >
          <v-card-text>
            <v-btn
              v-for="icon in icons"
              :key="icon"
              class="mx-4 white--text"
              icon
              :href="getSocialLink(icon)"
              target="_blank"
            >
              <v-icon size="24px">{{ icon }}</v-icon>
            </v-btn>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-text class="white--text">
            {{ new Date().getFullYear() }} — <strong>LCR Gen Santos</strong>
          </v-card-text>
        </v-card>
      </v-footer>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: 'WelcomePage',
  data() {
    return {
      valid: true,
      loading: false,
      contact: {
        name: '',
        email: '',
        phone: '',
        service: '',
        message: ''
      },
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 50 || 'Name must be less than 50 characters'
      ],
      emailRules: [
        v => !!v || 'Email is required',
        v => /.+@.+\..+/.test(v) || 'Email must be valid'
      ],
      phoneRules: [
        v => !!v || 'Phone number is required',
        v => /^[0-9+\-\s()]*$/.test(v) || 'Phone number must be valid'
      ],
      services: [
        'Wedding Photography',
        'Pre-nuptial Session',
        'Special Events',
        'Other'
      ],
      portfolioImages: [
        { src: '/images/portfolio1.jpg' },
        { src: '/images/portfolio2.jpg' },
        { src: '/images/portfolio3.jpg' },
        { src: '/images/portfolio4.jpg' },
        { src: '/images/portfolio5.jpg' },
        { src: '/images/portfolio6.jpg' }
      ],
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-instagram',
        'mdi-youtube'
      ]
    }
  },

  methods: {
    async submitForm() {
      if (this.$refs.form.validate()) {
        this.loading = true
        try {
          // TODO: Implement form submission logic
          await new Promise(resolve => setTimeout(resolve, 1000))
          this.$refs.form.reset()
          // Show success message
          // You can implement a proper notification system here
          alert('Thank you for your message. We will get back to you soon!')
        } catch (error) {
          // Handle error
          console.error('Error submitting form:', error)
          alert('There was an error submitting your message. Please try again.')
        } finally {
          this.loading = false
        }
      }
    },
    openGallery(index) {
      // TODO: Implement gallery view logic
      console.log('Opening gallery at index:', index)
    },
    getSocialLink(icon) {
      const links = {
        'mdi-facebook': 'https://facebook.com/lcrgensantos',
        'mdi-twitter': 'https://twitter.com/lcrgensantos',
        'mdi-instagram': 'https://instagram.com/lcrgensantos',
        'mdi-youtube': 'https://youtube.com/lcrgensantos'
      };
      return links[icon] || '#';
    }
  }
}
</script>

<style scoped>
  .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
  }
  .v-card.on-hover {
    transform: translateY(-4px);
    transition: all 0.3s ease;
  }
</style>