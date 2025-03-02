<template>
    <table class="w-full md:table-fixed">
    <thead>
        <tr>
            <th class="md:w-1/5">Name</th>
            <th>Size</th>
            <th>Habitat</th>
            <th class="md:w-44">Elements</th>
            <th>Options</th>
        </tr>
    </thead>
        <tbody>
            <tr v-for="myth in myths" :key="myth.id" class="border-t odd:bg-slate-500/[10%]">
                <!-- Name & Image -->
                <td class="md:w-1/5 myth-name md:text-lg lg:text-xl p-0 bg-cover bg-center relative" :style="`background-image: url(data:image/jpeg;base64,${myth.image.image});`">
                    <div class="hidden sm:block">
                        <div class="absolute inset-0 start-2 bg-cover bg-center blur-lg saturate-200 brightness-125 sm:opacity-50 lg:opacity-75 -z-10" :style="`background-image: url(data:image/jpeg;base64,${myth.image.image});`"></div>
                    </div>
                    <h2 class="font-bold bg-black/50 text-white py-1" style="text-shadow: 0.1rem 0.2rem 0.3rem black;">{{ myth.name }}</h2>
                </td>
                <!-- Size -->
                <td>
                    <span class="text-sm sm:italic" :class="{ 'sm:text-lg': myth.size.name == 'Large', 'sm:text-base': myth.size.name == 'Medium', 'sm:text-sm': myth.size.name == 'Small' }">
                        {{ myth.size.name }}
                    </span>
                </td>
                <!-- Habitat -->
                <td>
                    <div class="text-sm sm:text-base sm:italic">{{ myth.habitat.name }}</div>
                </td>
                <!-- Elements -->
                <td class="md:w-44 overflow-auto">
                    <div class="grid sm:grid-rows-4 sm:grid-flow-col w-fit gap-1 max-h-32">
                        <Element v-for="element in myth.elements" :key="element.id" :element="element.element" class="w-fit" />
                    </div>
                </td>
                <!-- Edit / Delete -->
                <td>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <button class="border border-sky-800 rounded px-4 py-2 sm:py-1 hover:border-sky-600 text-black bg-white hover:bg-sky-50 disabled:opacity-50 text-sm sm:text-base transition duration-75" @click="$emit('startEditing', myth.id)" :disabled="isEditing">
                            Edit
                        </button>
                        <button class="border border-rose-600 p-1 rounded-lg bg-white disabled:opacity-50 hover:border-rose-400 hover:text-rose-800 hover:bg-rose-50 transition duration-75" @click="$emit('deleteMythByID', myth.id)" :disabled="isEditing">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="fill-rose-400 hover:border-sky-600 m-auto" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import Element from '@components/Element.vue';

export default
{
    components:
    {
        Element,
    },
    props:
    {
        myths: Array,
        isEditing: Boolean,
    },
    emits: ['startEditing', 'deleteMythByID'],
}
</script>