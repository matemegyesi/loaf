<template>
<div class="flex sm:gap-8 lg:gap-16 bg-white p-2 justify-center">
    <RouterLink :to="{ name: 'home' }" class="flex items-center space-x-3 py-2 px-3 rounded-md">
        <span id="home-link" class="self-center sm:text-lg lg:text-xl text-gray-700"
            :class="{ 'underline': $route.name == 'home' }">Mythorium</span>
    </RouterLink>
    <RouterLink :to="{ name: 'legends' }" class="flex items-center space-x-3 py-2 px-3 rounded-md">
        <span id="legends-link" class="self-center sm:text-lg lg:text-xl text-gray-700"
            :class="{ 'underline': $route.name == 'legends' }">Legends</span>
    </RouterLink>
    <RouterLink :to="{ name: 'management' }" class="flex items-center space-x-3 py-2 px-3 rounded-md">
        <span id="management-link" class="self-center sm:text-lg lg:text-xl text-gray-700"
            :class="{ 'underline': $route.name == 'management' }">Management</span>
    </RouterLink>
</div>
</template>
<script>

</script>