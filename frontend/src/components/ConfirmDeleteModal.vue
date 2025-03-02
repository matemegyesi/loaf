<template>
    <BaseModal :autoWidth="true" @hideModal="$emit('hideModal')">
        <h2 class="text-center text-2xl underline mb-2">Confirm Deletion</h2>
        <div class="flex justify-center gap-3">
            <button class="bg-rose-400 hover:bg-orange-400 disabled:opacity-50 py-2 px-5 rounded transition duration-75"
                @click="deleteByID"
                :disabled="isSendingRequest">
                Delete
            </button>
            <button class="bg-amber-500 hover:bg-yellow-400 disabled:opacity-50 py-2 px-5 rounded transition duration-75"
                @click="$emit('hideModal')"
                :disabled="isSendingRequest">
                Cancel
            </button>
        </div>
    </BaseModal>
</template>

<script>
import BaseModal from '@components/layout/BaseModal.vue';
import { useMythStore } from '@stores/MythStore';
import { mapActions } from 'pinia';

export default
{
    components:
    {
        BaseModal,
    },
    props:
    {
        mythID: Number,
    },
    data()
    {
        return {
            isSendingRequest: false,
        };
    },
    emits: ['hideModal', 'deletionConfirmed'],
    methods:
    {
        ...mapActions(useMythStore, ["deleteMyth"]),
        async deleteByID()
        {
            this.isSendingRequest = true;
            await this.deleteMyth(this.mythID);
            this.isSendingRequest = false;
            this.$emit('deletionConfirmed', this.mythID);
        },
    },
}
</script>