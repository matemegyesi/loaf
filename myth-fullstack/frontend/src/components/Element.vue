<template>

    <div class="inline-block text-xs font-semibold px-2 py-1 rounded-full text-center" :class="element_classes[element]">
        {{ element }}
    </div>

</template>

<script>

const element_classes = {
    "Fire":     "bg-red-500 hover:bg-red-400 hover:shadow-red-400/[33%] text-white",
    "Electric": "bg-yellow-500 hover:bg-yellow-400 hover:shadow-yellow-400/[33%] text-black",
    "Dragon":   "bg-purple-500 hover:bg-purple-400 hover:shadow-purple-400/[33%] text-white",
    "Water":    "bg-blue-500 hover:bg-blue-400 hover:shadow-blue-400/[33%] text-white",
    "Giant":    "bg-gray-900 hover:bg-gray-800 hover:shadow-gray-800/[33%] text-white",
    "Flying":   "bg-gray-500 hover:bg-gray-400 hover:shadow-gray-400/[33%] text-white",
    "Ground":   "bg-yellow-800 hover:bg-yellow-700 hover:shadow-yellow-700/[33%] text-white",
    "Ghost":    "bg-gray-300 hover:bg-gray-200 hover:shadow-gray-200/[33%] text-black",
    "Spirit":   "bg-pink-500 hover:bg-pink-400 hover:shadow-pink-400/[33%] text-white",
    "Grass":    "bg-green-500 hover:bg-green-400 hover:shadow-green-400/[33%] text-black",
    "Air":      "bg-teal-400 hover:bg-teal-300 hover:shadow-teal-300/[33%] text-white",
    "Dark":     "bg-gray-900 hover:bg-gray-800 hover:shadow-gray-800/[33%] text-white",
    "Ice":      "bg-gradient-to-r from-blue-300 to-blue-500 hover:from-blue-400 hover:to-blue-600 hover:shadow-blue-400/[33%] text-white",
    "Light":    "bg-gradient-to-r from-yellow-200 to-yellow-400 hover:from-yellow-300 hover:to-yellow-500 hover:shadow-yellow-300/[33%] text-black",
    "Metal":    "bg-gradient-to-r from-gray-400 to-gray-600 hover:from-gray-500 hover:to-gray-700 hover:shadow-gray-500/[33%] text-white",
    "Poison":   "bg-gradient-to-r from-purple-600 to-green-500 hover:from-purple-700 hover:to-green-600 hover:shadow-green-500/[33%] text-white",
    "Rock":     "bg-gradient-to-r from-stone-600 to-stone-700 hover:from-stone-500 hover:to-stone-800 hover:shadow-stone-500/[33%] text-white",
    "Time":     "bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-800 hover:shadow-gray-800/[33%] text-white",
    "Sound":    "bg-gradient-to-r from-indigo-400 to-indigo-600 hover:from-indigo-500 hover:to-indigo-700 hover:shadow-indigo-400/[33%] text-white",
    "Psychic":  "bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 hover:shadow-pink-500/[33%] text-white",
    "Nature":   "bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 hover:shadow-green-600/[33%] text-white",
    "Chaos":    "bg-gradient-to-r from-red-600 to-purple-700 hover:from-red-700 hover:to-purple-800 hover:shadow-purple-700/[33%] text-white"
}


export default {
    data(){
        return {
            element_classes
        }
    },  
    props:{
        element: String
    }
}
</script>