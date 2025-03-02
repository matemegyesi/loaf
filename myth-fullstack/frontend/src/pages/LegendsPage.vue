<template>
  <BaseLayout>
    <h1 class="font-bold italic text-[4rem] text-center">"Legends live forever in the whispers of history"</h1>
    <div class="grid grid-cols-1 gap-8 m-8">
      <LegendCard v-for="legend in legends" :key="legend.id" :legend/>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import { useLegendStore } from '@stores/LegendStore';
import { mapState } from 'pinia'
import LegendCard from '@components/LegendCard.vue';

export default {
  components: {
    BaseLayout,
    LegendCard
  },
  computed: {
    ...mapState(useLegendStore, ['legends'])
  },
}
</script>
