<template>
    <BaseModal @hideModal="$emit('hideModal')" v-if="isLoaded">
        <h2 class="text-center text-2xl underline mb-2">Edit Myth</h2>
        <FormKit type="form" :actions="false" @submit="submitForm" message-class="text-red-400">
            <div class="flex flex-col sm:flex-row gap-4 my-2">
                <div class="basis-1/2 flex flex-col gap-2">
                    <!-- Name -->
                    <FormKit type="text" label="Name"
                        name="name" v-model="nameValue"
                        input-class="border rounded py-1 px-2 focus:outline-none focus:border-blue-500 transition duration-75 w-full"
                        outer-class="row-span-2 sm:row-span-1"
                        message-class="text-red-400"
                        validation="required|length:1,100" />
                    <!-- Habitat -->
                    <FormKit type="select" label="Habitat"
                        name="habitat_id" v-model="habitatValue"
                        :options="habitatOptions"
                        input-class="border rounded p-1 focus:outline-none focus:border-blue-500 transition duration-75 w-full"
                        outer-class="row-span-2 sm:row-span-1"
                        message-class="text-red-400"
                        validation="required" />
                    <!-- Size -->
                    <FormKit type="select" label="Size"
                        name="size_id" v-model="sizeValue"
                        :options="sizeOptions"
                        input-class="border rounded p-1 focus:outline-none focus:border-blue-500 transition duration-75 w-full"
                        outer-class="row-span-2 sm:row-span-1"
                        message-class="text-red-400"
                        validation="required" />
                </div>
                <div class="basis-1/2">
                    <!-- Description -->
                    <FormKit type="textarea" label="Description"
                        name="desc" v-model="descriptionValue"
                        input-class="border rounded py-1 px-2 focus:outline-none focus:border-blue-500 transition duration-75 w-full h-40 resize-none"
                        outer-class="row-span-3"
                        message-class="text-red-400"
                        inner-class="p-0"
                        validation="required" />
                </div>
            </div>

            <!-- Elements -->
            <FormKit type="select" multiple label="Elements"
                name="elements" v-model="elementValues"
                :options="elementOptions"
                help="Select multiple elements by holding CTRL or CMD"
                input-class="border rounded p-1 focus:outline-none focus:border-blue-500 transition duration-75 w-full h-36"
                help-class="text-sm opacity-50"
                option-class="rounded mb-1 ps-2"
                message-class="text-red-400" />
            
            <hr class="my-2 border-slate-600">
            <div class="bg-[#F5F5F5] rounded p-2">

                <!-- Current Image -->
                <div v-if="!isImageListShown">
                    <FormKit type="number" name="image_id" v-model="imageValue" label="Current Image" disabled
                        input-class="hidden"
                        validation="required|min:1"
                        messages-class="text-red-400"
                        :validation-messages="{
                            min: 'An image is required.',
                            }" />
                    <div class="h-32 w-full sm:w-2/3 md:w-1/2 overflow-hidden relative bg-cover bg-center rounded" :style="`background-image: url(${getImageDataByID(imageValue)});`">
                        <FormKit type="button" label="Change Image"
                            input-class="border-2 hover:border-sky-400 hover:bg-white/75 text-black/0 hover:text-black/100 font-bold transition absolute inset-0"
                            :disabled="isSendingRequest"
                            @click="toggleImageList" />
                    </div>
                </div>
                <!-- Select Image from List -->
                <div v-else>
                    <div class="flex gap-2">
                        <FormKit type="button" label="Close Image List"
                            input-class="border-2 border-amber-500 hover:border-yellow-400 disabled:opacity-50 text-black px-2 rounded transition duration-75" :disabled="isSendingRequest"
                            @click="toggleImageList" />
                        <FormKit type="button" label="Upload Image"
                            input-class="border-2 border-blue-500 hover:border-sky-400 disabled:opacity-50 text-black px-2 rounded transition duration-75" :disabled="isSendingRequest"
                            @click="$emit('showUploadImage')" />
                    </div>
                    <div class="mt-2 grid grid-cols-2 sm:grid-cols-4 gap-2 bg-slate-200 p-1 rounded">
                        <img v-for="image in imageList" :key="image.id" :src="`data:${image.type};base64,${image.image}`" :alt="image.name"
                            class="rounded m-auto border-2 w-full hover:border-sky-400 hover:opacity-75 cursor-pointer transition duration-75"
                            @click="imageSelected(image.id)">
                    </div>
                </div>

            </div>
            <hr class="my-2 border-slate-600">

            <!-- Buttons -->
            <div class="flex justify-center gap-5 mt-5">
                <FormKit v-if="inEditingMode" type="submit" label="Save"
                    input-class="hover:bg-sky-400 disabled:opacity-50 px-10 transition duration-75" :disabled="isSendingRequest" />

                <FormKit v-else type="submit" label="Create"
                    input-class="bg-teal-500 hover:bg-emerald-400 disabled:opacity-50 text-black px-10 transition duration-75" :disabled="isSendingRequest" />

                <FormKit type="button" label="Cancel"
                    input-class="bg-amber-500 hover:bg-yellow-400 disabled:opacity-50 text-black py-2 px-10 rounded transition duration-75" :disabled="isSendingRequest"
                    @click="$emit('hideModal')" />
            </div>
        </FormKit>
    </BaseModal>
</template>

<script>
import BaseModal from '@components/layout/BaseModal.vue';
import { useMythStore } from '@stores/MythStore.mjs';
import { useHabitatStore } from '@stores/HabitatStore.mjs';
import { useSizeStore } from '@stores/SizeStore.mjs';
import { useElementStore } from '@stores/ElementStore.mjs';
import { useImageStore } from '@stores/ImageStore.mjs';
import { mapState, mapActions } from 'pinia';

export default
{
    components:
    {
        BaseModal,
    },
    props:
    {
        myth:
        {
            type: Object,
            default: null,
        },
        imageList: Array,
    },
    data()
    {
        return {
            elementValues: [],
            habitatValue: 1,
            sizeValue: 1,
            imageValue: 0,
            descriptionValue: '',
            nameValue: '',
            isImageListShown: false,
            isLoaded: false,
            isSendingRequest: false,
        };
    },
    methods:
    {
        ...mapActions(useMythStore, ['updateMyth', 'storeMyth']),
        ...mapActions(useImageStore, ["getImages"]),
        async submitForm(data)
        {
            this.isSendingRequest = true;
            if (this.inEditingMode)
            {
                const result = await this.updateMyth(this.myth.id, data);
                this.$emit("updateMyth", result);
            }
            else
            {
                const result = await this.storeMyth(data);
                this.$emit("storeMyth", result);
            }
            this.isSendingRequest = false;
            this.$emit("hideModal");
        },
        toggleImageList()
        {
            this.isImageListShown = !this.isImageListShown;
        },
        imageSelected(id)
        {
            this.imageValue = id;
            this.isImageListShown = false;
        },
        getImageDataByID(id)
        {
            const image = this.imageList[this.imageList.findIndex((item) => item.id == id)];
            if (image == null)
            {
                return '';
            }
            return `data:${image.type};base64,${image.image}`;
        },
    },
    emits: ['hideModal', 'updateMyth', 'storeMyth', 'showUploadImage'],
    computed:
    {
        ...mapState(useHabitatStore, ["habitatOptions"]),
        ...mapState(useSizeStore, ["sizeOptions"]),
        ...mapState(useElementStore, ["elementOptions"]),
        inEditingMode()
        {
            return this.myth != null;
        },
    },
    async mounted()
    {
        if (this.inEditingMode)
        {
            this.habitatValue = this.myth.habitat.id;
            this.sizeValue = this.myth.size.id;
            this.nameValue = this.myth.name;
            this.descriptionValue = this.myth.desc;
            for (const element of this.myth.elements)
            {
                this.elementValues.push(element.id);
            }
            this.imageValue = this.myth.image.id;
        }
        this.isLoaded = true;
    },
}
</script>