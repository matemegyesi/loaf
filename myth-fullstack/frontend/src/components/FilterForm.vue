    <template>
        <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md text-black my-4 border border-1">
            <h2 class="text-2xl text-center mb-4">Filter Myths</h2>

            <button @click="toggleDropdown" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mb-4 w-full">
                Toggle Options
            </button>

            <div v-show="dropdownVisible">
                <FormKit type="form" @submit="filter" wrapper-class="flex flex-row gap-4 items-center" :actions="false" id="filterForm">
                    <FormKit type="text" name="name" label="Name" placeholder="Enter name" input-class="w-full p-2 border rounded-lg"/>
                    <FormKit type="select" name="size_id" label="Size" placeholder="Select size" :options="sizeOptions" input-class="w-full p-2 border rounded-lg" />
                    <FormKit type="select" name="habitat_id" label="Habitat" placeholder="Select habitat" :options="habitatOptions" input-class="w-full p-2 border rounded-lg" />
                    <FormKit type="select" name="elements" label="Elements" placeholder="Select elements" :options="elementOptions" multiple input-class="w-full p-2 border rounded-lg"/>
                    <div class="flex justify-center mt-2">
                        <FormKit type="submit" label="Filter" input-class="w-full p-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600" />
                        <button type="button" @click="reset" class="px-4 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 ml-4"> Reset </button>
                    </div>
                </FormKit>
            </div>
        </div>
    </template>
<script>
import { useHabitatStore } from '@stores/HabitatStore.mjs';
import { useSizeStore } from '@stores/SizeStore.mjs';
import { useElementStore } from '@stores/ElementStore.mjs';
import { mapState } from 'pinia';

export default {
    data() {
        return {
            dropdownVisible: false
        }
    },
    computed:
    {
        ...mapState(useHabitatStore, ["habitatOptions"]),
        ...mapState(useSizeStore, ["sizeOptions"]),
        ...mapState(useElementStore, ["elementOptions"]),
    },
    methods: {
        filter(formData) {
            this.$emit('submit', formData);
        },
        reset() {
            this.$emit('reset')
            this.$formkit.reset('filterForm')
        },
        toggleDropdown() {
            this.dropdownVisible = !this.dropdownVisible
        }
    },
    emits: ['submit', 'reset']
}
</script>

<style scoped>
.transition-all {
    transition: all 0.3s ease-in-out;
}
</style>