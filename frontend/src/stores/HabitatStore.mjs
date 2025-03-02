import { defineStore } from 'pinia';
import { http } from '@utils/http';

export const useHabitatStore = defineStore('habitats', {
    state()
    {
        return {
            habitats: [],
        };
    },
    actions:
    {
        async fetchHabitats()
        {
            const response = await http.get('/habitats');
            this.habitats = response.data.data;
        },
    },
    getters:
    {
        habitatOptions()
        {
            const options = {};
            for (const item of this.habitats)
            {
                options[item.id] = item.name;
            }
            return options;
        },
    },
});