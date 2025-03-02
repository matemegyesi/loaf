<template>
  <Menu />
  <main class="container mx-auto p-4">
    <slot />
  </main>
</template>
<script>
import Menu from '@components/layout/Menu.vue'
export default {
  components: {
    Menu
  }
}
</script>
