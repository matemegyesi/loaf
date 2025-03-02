<template>
    <div class="basis-full md:basis-[49%] lg:basis-[32%] xl:basis-[23%] pb-4 mb-4 flex flex-col justify-between bg-white rounded-lg shadow-custom-card text-black">
        <div>
            <img class="rounded-t-lg object-cover" :src="`data:image/jpeg;base64,${image}`" alt="Myth">
            <h3 class="text-left m-3 mb-2 text-3xl">{{ myth.name }}</h3>
            <div class="elements">
                <Element v-for="element of myth.elements" :key="element.id" :element="element.element" class="ms-3"/>
            </div>
            <p class="mx-3 mt-2">{{ myth.desc }}</p>
        </div>
        <div class="mt-8 gap-4 flex flex-col justify-evenly">
            <div class="flex flex-row ml-3">
                <p class="mr-3 font-bold">Size:</p>
                <p id="size">{{ myth.size.name }}</p>
            </div>
            <div class="flex flex-row ml-3">
                <p class="mr-3 font-bold">Habitat:</p>
                <p id="habitat">{{ myth.habitat.name }}</p>
            </div>
        </div>
    </div>

</template>
<script>
import Element from '@components/Element.vue';

export default {
    props: {
        myth: Object,
        image: String
    },
    components:{
        Element
    }
}
</script>