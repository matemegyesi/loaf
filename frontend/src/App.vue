<script setup></script>

<template>
  <RouterView />
</template>

<script>
import { useMythStore } from '@stores/MythStore'
import { useImageStore } from '@stores/ImageStore'
import { useHabitatStore } from '@stores/HabitatStore.mjs'
import { useSizeStore } from '@stores/SizeStore.mjs'
import { useElementStore } from '@stores/ElementStore.mjs'
import { useLegendStore } from '@stores/LegendStore.mjs'
import { mapState, mapActions } from 'pinia'

export default {
  computed: {
    ...mapState(useMythStore, ["myths"]),
    ...mapState(useImageStore, ["images"]),
    ...mapState(useLegendStore, ['legends'])
  },
  methods: {
    ...mapActions(useMythStore, ["fetchMyths"]),
    ...mapActions(useHabitatStore, ["fetchHabitats"]),
    ...mapActions(useSizeStore, ["fetchSizes"]),
    ...mapActions(useElementStore, ["fetchElements"]),
    ...mapActions(useLegendStore, ['fetchLegends'])
  },
  async mounted() {
    await this.fetchMyths()
    await this.fetchHabitats()
    await this.fetchSizes()
    await this.fetchElements()
    await this.fetchLegends()
  }
}

</script>
