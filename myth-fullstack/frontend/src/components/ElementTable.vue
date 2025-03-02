<template>
    <div class="p-6 max-w-3xl mx-auto">
      <h1 class="text-2xl font-bold mb-4">Elemental Powers Visualization</h1>
      
      <div class="mb-6">
        <label for="element-selector" class="block text-sm font-medium mb-2">Select Element:</label>
        <select 
          id="element-selector" 
          v-model="selectedElement" 
          class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        >
          <option value="">-- Select an Element --</option>
          <option v-for="(element, name) in elementData" :key="name" :value="name">
            {{ name }}
          </option>
        </select>
      </div>
      
      <div v-if="selectedElement" class="space-y-6">
        <div :class="`p-4 rounded-lg shadow-md ${elementData[selectedElement].style}`">
          <h2 class="text-xl font-bold">{{ selectedElement }}</h2>
          <p class="mt-2" v-if="elementData[selectedElement].combination">
            Created from: {{ elementData[selectedElement].combination.join(' + ') }}
          </p>
          <p class="mt-2" v-else>Base Element</p>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-2">Can be combined to create:</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div 
              v-for="(creates, index) in getCreations()" 
              :key="index"
              :class="`p-3 rounded-lg shadow-md cursor-pointer transition duration-200 ${elementData[creates.element].style}`"
              @click="selectedElement = creates.element"
            >
              <p class="font-bold">{{ creates.element }}</p>
              <p class="text-sm">From: {{ creates.combination.join(' + ') }}</p>
            </div>
          </div>
        </div>
      </div>
      
      <div v-else class="mt-6">
        <h2 class="text-lg font-semibold mb-4">All Elements</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <div 
            v-for="(element, name) in elementData" 
            :key="name"
            :class="`p-3 rounded-lg shadow-md cursor-pointer transition duration-200 ${element.style}`"
            @click="selectedElement = name"
          >
            <p class="font-bold">{{ name }}</p>
            <p class="text-sm" v-if="element.combination">
              Created from: {{ element.combination.join(' + ') }}
            </p>
            <p class="text-sm" v-else>Base Element</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { useElementStore } from '@stores/ElementStore.mjs';
  import { mapState } from 'pinia';

  export default {
    data() {
      return {
        selectedElement: '',
        elementData: {}
      };
    },
    methods: {
      getCreations() {
        const creations = [];
        
        if (!this.selectedElement) return creations;
        
        for (const [element, data] of Object.entries(this.elementData)) {
          if (data.combination && data.combination.includes(this.selectedElement)) {
            creations.push({
              element,
              combination: data.combination
            });
          }
        }
        
        return creations;
      }
    },
    computed: {
      ...mapState(useElementStore, ['elementCreationOptions'])
    },
    mounted(){
      this.elementData = this.elementCreationOptions;
    }
  };
  </script>