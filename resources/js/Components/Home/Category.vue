<template>
    <div class="px-4">
        <h2 class="font-semibold mb-5 text-lg">Kategori Paket</h2>
        <div class="grid grid-cols-4 place-items-center gap-4">
            <div
                v-for="category in categories"
                :key="category.id"
                class="flex flex-col items-center gap-y-2 relative"
            >
                <figure
                    class="w-16 aspect-square relative rounded-full overflow-hidden border"
                >
                    <img
                        class="w-full h-full object-cover object-center"
                        :src="`/storage/${category.img_url}`"
                        :alt="category.name"
                        alt="icon 1"
                    />
                </figure>
                <span class="text-sm">{{ category.name }}</span>
                <a href="#" class="absolute inset-0">
                    <!-- link -->
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
const { categories } = defineProps({
    categories: Object,
});
</script>

<style lang="scss" scoped></style>
