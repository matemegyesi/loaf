import { defineStore } from 'pinia';
import { http } from '@utils/http';

export const useSizeStore = defineStore('sizes', {
    state()
    {
        return {
            sizes: [],
        };
    },
    actions:
    {
        async fetchSizes()
        {
            const response = await http.get('/sizes');
            this.sizes = response.data.data;
        },
    },
    getters:
    {
        sizeOptions()
        {
            const options = {};
            for (const item of this.sizes)
            {
                options[item.id] = item.name;
            }
            return options;
        },
    },
});