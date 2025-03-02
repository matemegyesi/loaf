import { defineStore } from 'pinia'
import { http } from '@utils/http'


export const useMythStore = defineStore('myths', {
    state() {
        return {
            myths: []
        }
    },
    actions: {
        async fetchMyths(data = null) {
            const params = {};

            if(data !== null){
                if(data.habitat_id != undefined) params.habitat_id = data.habitat_id;
                if(data.size_id != undefined) params.size_id = data.size_id;
                if(data.name != undefined) params.name = data.name;
                if(data.elements != undefined) params.elements = data.elements;
            }

            const response = await http.get('/myths', { params });
            this.myths = response.data.data;
        },
        async updateMyth(id, data)
        {
            const response = await http.put(`/myths/${id}`, data);
            return response.data.data;
        },
        async fetchMythsByHabitat(habitatId){
            const response = await http.get(`/myths?habitat=${habitatId}`)
            return response.data.data
        },
        async storeMyth(data)
        {
            const response = await http.post('/myths/', data);
            return response.data.data;
        },
        async deleteMyth(id)
        {
            await http.delete(`/myths/${id}`);
        },
    }
})