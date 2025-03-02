<template>
    <BaseLayout>
        <Carousel/>
        <hr class="my-8">
        <IconBox/>
        <hr class="my-8">
        <ElementTable/>
        <hr class="my-8">
        <FilterForm @submit="filter" @reset="reset"/>
        <div class="flex flex-wrap justify-center gap-3">
            <MythCard v-for="myth in myths" :key="myth.id" :myth="myth" :image="myth.image.image"/>
        </div>
    </BaseLayout>
</template>
<script>

import { mapActions, mapState } from 'pinia';
import { useMythStore } from '@stores/MythStore';
import BaseLayout from '@layouts/BaseLayout.vue';
import MythCard from '@components/MythCard.vue';
import FilterForm from '@components/FilterForm.vue';
import Carousel from '@components/Carousel.vue';
import IconBox from '@components/IconBox.vue';
import ElementTable from '@components/ElementTable.vue';

export default {
    data() {
        return {
            loading: true
        }
    },
    components: {
        BaseLayout,
        MythCard,
        FilterForm,
        Carousel,
        IconBox,
        ElementTable
    },
    computed: {
        ...mapState(useMythStore, ["myths"])
    },
    methods: {
        ...mapActions(useMythStore, ["fetchMyths"]),
        async filter(formData){
            await this.fetchMyths(formData)
        },
        async reset(){
            await this.fetchMyths()
        }
    },
    async mounted(){
        await this.fetchMyths(this.$route.query)
    } 
}
</script>