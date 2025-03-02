<template>
    <BaseModal :autoWidth="true" @hideModal="$emit('hideModal')">
        <h2 class="text-center text-2xl underline mb-2">Upload Image</h2>
        <FormKit type="form" :actions="false" @submit="submitForm" message-class="mt-2 text-red-400" incomplete-message="Sorry, no image has been uploaded.">
            <FormKit type="file" name="original" label="Choose Image" accept=".png,.jpeg,.jpg,.gif"
                fileName-class="text-sky-800 italic"
                fileItem-class="flex flex-cols bg-[#F5F5F5] p-2 rounded mt-3"
                fileRemove-class="hidden"
                noFiles-class="hidden"
                input-class="hidden"
                outer-class="mt-4 mb-3 text-center"
                label-class="p-2 border-2 hover:border-sky-400 rounded transition duration-75 cursor-pointer"
                message-class="hidden"
                validation="required" />
            <div class="flex gap-1 justify-center">
                <FormKit type="submit" label="Upload"
                    input-class="hover:bg-sky-400 disabled:opacity-50 px-10 transition duration-75"
                    :disabled="isSendingRequest" />
                <FormKit type="button" label="Cancel"
                    input-class="bg-amber-500 hover:bg-yellow-400 disabled:opacity-50 text-black py-2 px-5 rounded transition duration-75"
                    :disabled="isSendingRequest"
                    @click="$emit('hideModal')" />
            </div>
        </FormKit>
    </BaseModal>
</template>

<script>
import BaseModal from '@components/layout/BaseModal.vue';
import { useImageStore } from '@stores/ImageStore.mjs';
import { mapActions } from 'pinia';

export default
{
    components:
    {
        BaseModal,
    },
    data()
    {
        return {
            isSendingRequest: false,
        };
    },
    emits: ['hideModal', 'imageGotUploaded'],
    methods:
    {
        ...mapActions(useImageStore, ["storeImage", "getImages"]),
        async submitForm(data)
        {
            const formData = new FormData();
            formData.append("original", data.original[0].file);
            formData.append("name", data.name);
            formData.append("type", data.original[0].file.type);
            formData.append("category", "myth");
            
            this.isSendingRequest = true;
            await this.storeImage(formData);
            this.$emit('imageGotUploaded');
            this.isSendingRequest = false;
            this.$emit('hideModal');
        },
    },
}
</script>