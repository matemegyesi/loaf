import { defineStore } from "pinia"
import { http } from "@utils/http"

export const useImageStore = defineStore('images',{
    state(){
        return {
            images: []
        }
    },
    actions:{
        async getImages(data = null){
            const params = data.category || data.order ? data : null
            return (await http.get('/images', { params })).data.data
        },
        async getImage(id){
            return (await http.get(`/images/${id}`)).data.data
        },
        async storeImage(image){
            const response = await http.post('/images', image, {
                transformRequest: [function (data, headers) {
                    return data;
                  }],
            })
            this.images.push(response.data.data)
        }
    }
})