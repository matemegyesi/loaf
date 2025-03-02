<template>
  <BaseLayout>

    <header class="my-4 text-center">
      <h1 class="text-4xl font-bold">Management</h1>
      <p class="text-lg">The place where you can find and commit Myths to paper.</p>
      <button class="mt-2 bg-sky-500 hover:bg-sky-400 py-2 px-8 text-white transition duration-75 rounded" @click="startCreating">New Myth</button>
    </header>

    <!-- Table of Myths -->
    <ManagementTable :myths="myths" @startEditing="startEditing" @deleteMythByID="startDeletion" />

    <!-- Modals -->
    <EditMythModal v-if="isEditing"
      :myth="selectedMyth"
      @hideModal="endEditing" @updateMyth="updateMyth" @storeMyth="storeMyth" @showUploadImage="changeIsUploading(true)"
      :imageList="mythImages" />
    <UploadImageModal v-if="isUploading"
      @hideModal="changeIsUploading(false)" @imageGotUploaded="getMythImages" />
    <ConfirmDeleteModal v-if="isDeleting"
      :mythID="selectedID"
      @hideModal="endDeletion" @deletionConfirmed="deletionConfirmed" />

  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue';
import EditMythModal from '@components/EditMythModal.vue';
import Element from '@components/Element.vue';
import UploadImageModal from '@components/UploadImageModal.vue';
import ManagementTable from '@components/ManagementTable.vue';
import ConfirmDeleteModal from '@components/ConfirmDeleteModal.vue';
import { useMythStore } from '@stores/MythStore';
import { useImageStore } from '@stores/ImageStore.mjs';
import { mapState, mapActions } from 'pinia';

export default {
  data()
  {
    return {
      isEditing: false,
      isUploading: false,
      isDeleting: false,
      selectedID: null,
      selectedMyth: null,
      mythImages: [],
    };
  },
  components:
  {
    BaseLayout,
    EditMythModal,
    Element,
    UploadImageModal,
    ManagementTable,
    ConfirmDeleteModal,
  },
  computed:
  {
      ...mapState(useMythStore, ["myths"]),
  },
  methods:
  {
    ...mapActions(useImageStore, ["getImages"]),
    startEditing(id)
    {
      this.selectedMyth = this.myths[this.myths.findIndex(item => item.id == id)];
      this.isEditing = true;
      this.selectedID = id;
    },
    endEditing()
    {
      this.isEditing = false;
      this.selectedID = null;
    },
    startCreating()
    {
      this.selectedMyth = null;
      this.selectedID = null;
      this.isEditing = true;
    },
    changeIsUploading(value)
    {
      this.isUploading = value;
    },
    updateMyth(myth)
    {
      this.myths.splice(this.myths.findIndex(item => item.id === myth.id), 1, myth);
    },
    storeMyth(myth)
    {
      this.myths.push(myth);
    },
    async getMythImages()
    {
      this.mythImages = await this.getImages({ category: "myth", order: true });
    },
    startDeletion(id)
    {
      this.selectedID = id;
      this.isDeleting = true;
    },
    endDeletion()
    {
      this.isDeleting = false;
      this.selectedID = null;
    },
    deletionConfirmed(id)
    {
      this.myths.splice(this.myths.findIndex(item => item.id === id), 1);
      this.isDeleting = false;
    },
  },
  async mounted()
  {
    await this.getMythImages();
  },
}
</script>

<style>
td
{
  @apply p-2 text-center
}
tbody tr
{
  @apply hover:even:bg-slate-600/[15%] hover:odd:bg-slate-600/[15%] transition duration-75
}
.myth-name
{
  font-variant: small-caps;
}
</style>