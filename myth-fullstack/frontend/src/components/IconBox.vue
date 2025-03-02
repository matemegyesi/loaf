<template>
    <div v-if="!loading" class="flex flex-row justify-evenly text-center my-8">
        <div>
            <img :src="`data:image/png;base64,${icons[0].image}`" alt="Dream" class="w-24">
            <p class="font-light text-xl">Dream.</p>
        </div>
        <div>
            <img :src="`data:image/png;base64,${icons[1].image}`" alt="Discover" class="w-24">
            <p class="font-light text-xl">Discover.</p>
        </div>
        <div>
            <img :src="`data:image/png;base64,${icons[2].image}`" alt="Explore" class="w-24">
            <p class="font-light text-xl">Explore.</p>
        </div>
    </div>
</template>
<script>

import { useImageStore } from '@stores/ImageStore.mjs'
import { mapActions } from 'pinia'

export default {
    data() {
        return {
            loading: true,
            icons: []
        }
    },
    methods: {
        ...mapActions(useImageStore, ["getImages"]),
    },
    async mounted() {
        this.icons = await this.getImages({ category: "icon" });
        this.loading = false
    }
}
</script>