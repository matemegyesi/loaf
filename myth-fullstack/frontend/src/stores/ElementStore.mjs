import { defineStore } from 'pinia';
import { http } from '@utils/http';

export const useElementStore = defineStore('elements', {
    state()
    {
        return {
            elements: [],
        };
    },
    actions:
    {
        async fetchElements()
        {
            const response = await http.get('/elements');
            this.elements = response.data.data;
        },
    },
    getters:
    {
        elementOptions()
        {
            const options = [];
            for (const item of this.elements)
            {
                options.push({
                    value: item.id.toString(),
                    label: item.element,
                });
            }
            return options;
        },
        elementCreationOptions(){
            return {
                "Fire": {
                  style: "bg-red-500 hover:bg-red-400 hover:shadow-red-400/[33%] text-white",
                  combination: null
                },
                "Electric": {
                  style: "bg-yellow-500 hover:bg-yellow-400 hover:shadow-yellow-400/[33%] text-black",
                  combination: null
                },
                "Dragon": {
                  style: "bg-purple-500 hover:bg-purple-400 hover:shadow-purple-400/[33%] text-white",
                  combination: null
                },
                "Water": {
                  style: "bg-blue-500 hover:bg-blue-400 hover:shadow-blue-400/[33%] text-white",
                  combination: null
                },
                "Giant": {
                  style: "bg-gray-900 hover:bg-gray-800 hover:shadow-gray-800/[33%] text-white",
                  combination: null
                },
                "Flying": {
                  style: "bg-gray-500 hover:bg-gray-400 hover:shadow-gray-400/[33%] text-white",
                  combination: null
                },
                "Ground": {
                  style: "bg-yellow-800 hover:bg-yellow-700 hover:shadow-yellow-700/[33%] text-white",
                  combination: null
                },
                "Ghost": {
                  style: "bg-gray-300 hover:bg-gray-200 hover:shadow-gray-200/[33%] text-black",
                  combination: null
                },
                "Spirit": {
                  style: "bg-pink-500 hover:bg-pink-400 hover:shadow-pink-400/[33%] text-white",
                  combination: null
                },
                "Grass": {
                  style: "bg-green-500 hover:bg-green-400 hover:shadow-green-400/[33%] text-black",
                  combination: null
                },
                "Air": {
                  style: "bg-teal-400 hover:bg-teal-300 hover:shadow-teal-300/[33%] text-white",
                  combination: null
                },
                "Dark": {
                  style: "bg-gray-900 hover:bg-gray-800 hover:shadow-gray-800/[33%] text-white",
                  combination: null
                },
                "Ice": {
                  style: "bg-gradient-to-r from-blue-300 to-blue-500 hover:from-blue-400 hover:to-blue-600 hover:shadow-blue-400/[33%] text-white",
                  combination: ["Water", "Air"]
                },
                "Light": {
                  style: "bg-gradient-to-r from-yellow-200 to-yellow-400 hover:from-yellow-300 hover:to-yellow-500 hover:shadow-yellow-300/[33%] text-black",
                  combination: ["Fire", "Electric"]
                },
                "Metal": {
                  style: "bg-gradient-to-r from-gray-400 to-gray-600 hover:from-gray-500 hover:to-gray-700 hover:shadow-gray-500/[33%] text-white",
                  combination: ["Ground", "Fire"]
                },
                "Poison": {
                  style: "bg-gradient-to-r from-purple-600 to-green-500 hover:from-purple-700 hover:to-green-600 hover:shadow-green-500/[33%] text-white",
                  combination: ["Grass", "Dark"]
                },
                "Rock": {
                  style: "bg-gradient-to-r from-stone-600 to-stone-700 hover:from-stone-500 hover:to-stone-800 hover:shadow-stone-500/[33%] text-white",
                  combination: ["Ground", "Giant"]
                },
                "Time": {
                  style: "bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-800 hover:shadow-gray-800/[33%] text-white",
                  combination: ["Dark", "Ghost"]
                },
                "Sound": {
                  style: "bg-gradient-to-r from-indigo-400 to-indigo-600 hover:from-indigo-500 hover:to-indigo-700 hover:shadow-indigo-400/[33%] text-white",
                  combination: ["Air", "Electric"]
                },
                "Psychic": {
                  style: "bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 hover:shadow-pink-500/[33%] text-white",
                  combination: ["Spirit", "Ghost"]
                },
                "Nature": {
                  style: "bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 hover:shadow-green-600/[33%] text-white",
                  combination: ["Grass", "Water"]
                },
                "Chaos": {
                  style: "bg-gradient-to-r from-red-600 to-purple-700 hover:from-red-700 hover:to-purple-800 hover:shadow-purple-700/[33%] text-white",
                  combination: ["Fire", "Dragon"]
                }
              }
        }
    },
});