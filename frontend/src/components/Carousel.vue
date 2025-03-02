<template>
  <div class="relative w-full max-w-5xl mx-auto overflow-hidden rounded-lg mt-8" v-if="!loading">
    <img :src="`data:image/jpeg;base64,${carousels[currentSlide].image}`" class="w-full rounded-lg transition-all duration-500" />

    <button @click="changeSlide(-1)"
      class="absolute left-2 top-1/2 -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">
      ◀
    </button>
    <button @click="changeSlide(1)"
      class="absolute right-2 top-1/2 -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">
      ▶
    </button>
  </div>
</template>

<script>

import { useImageStore } from '@stores/ImageStore.mjs'
import { mapActions } from 'pinia'

export default {
  data() {
    return {
      currentSlide: 0,
      loading: true,
      carousels: []
    }
  },
  methods: {
    ...mapActions(useImageStore, ["getImages"]),
    changeSlide(step) {
      this.currentSlide = (this.currentSlide + step + this.carousels.length) % this.carousels.length;
    },
  },
  async mounted() {
    this.carousels = await this.getImages({category: "carousel"});
    this.loading = false
  }
};
</script>