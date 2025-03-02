import { defineStore } from 'pinia'
import { http } from '@utils/http'


export const useLegendStore = defineStore('legends',{
    state(){
        return {
            legends: []
        }
    },
    actions:{
        async fetchLegends(){
            const response = await http.get('legends')
            this.legends = response.data.data
        },
        async getLegendById(id){
            const response = await http.get(`legends/${id}`)
            return response.data.data
        }
    }
})