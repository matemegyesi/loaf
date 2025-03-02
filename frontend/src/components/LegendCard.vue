<template>
    <div class="p-0 rounded-lg bg-slate-100 text-black grid grid-cols-1 lg:grid-cols-2 border border-gray-400 shadow-lg">
        <img :src="`data:image/jpeg;base64,${legend.image.image}`" class="rounded-tl-lg rounded-tr-lg lg:rounded-tr-none lg:rounded-s-lg object-cover h-full" :alt="legend.name">
        <div class="px-8 py-3 my-auto">
            <h3 class="text-4xl mb-5">{{ legend.name }}</h3>
            <p class="text-2xl tracking-wider mb-5 leading-[30px]">{{ legend.description }}</p>
            <p class="mb-2"><small class="text-gray-700">{{ legend.caption }}</small></p>
            <span class="bg-gray-400 w-auto font-bold rounded-full p-2 hover:bg-slate-400">{{ legend.habitat.name }}</span>
            <div class="font-bold my-5">Bloodlust: <span v-for="i in legend.strength" :key="i">⭐</span></div> 
            <RouterLink :to="{name: 'home', query: {habitat_id: legend.habitat.id}}" class="mt-4 font-bold shadow-lg rounded bg-gray-400 p-2 hover:bg-slate-400 block mx-auto w-fit">Discover its habitat!</RouterLink>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        legend: Object
    }
}
</script>
