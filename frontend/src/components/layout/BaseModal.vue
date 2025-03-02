<template>
    <div class="relative z-10">
        <div class="backdrop-blur-sm backdrop-saturate-[75%] fixed inset-0" @click="$emit('hideModal')">
        </div>
        <div class="fixed bg-white border border-2 inset-0 p-5 h-fit max-h-screen overflow-auto m-auto rounded shadow-xl"
            :class="{ 'w-full sm:w-4/5 md:w-3/4 lg:w-2/3 xl:w-1/2': !autoWidth, 'w-fit': autoWidth }">
            <slot />
        </div>
    </div>
</template>

<script>
export default
{
    props:
    {
        autoWidth:
        {
            type: Boolean,
            default: false,
        },
    },
    emits: ['hideModal'],
}
</script>