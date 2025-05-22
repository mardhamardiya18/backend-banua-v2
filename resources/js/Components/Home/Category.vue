<template>
    <div class="px-4">
        <h2 class="font-semibold mb-5 text-lg">Kategori Paket</h2>
        <div class="grid grid-cols-4 place-items-center gap-4">
            <div v-for="category in categories" :key="category.id">
                <template v-if="loading">
                    <div class="flex flex-col items-center gap-y-2 w-full">
                        <div class="skeleton h-16 w-16 rounded-full"></div>
                        <div class="flex flex-col gap-2 w-16">
                            <div class="skeleton h-4 w-full"></div>
                            <div class="skeleton h-4 w-full"></div>
                        </div>
                    </div>
                </template>

                <template v-else>
                    <div class="flex flex-col items-center gap-y-2 w-full">
                        <figure
                            class="w-16 aspect-square rounded-full overflow-hidden border"
                        >
                            <img
                                class="w-full h-full object-cover"
                                :src="`/storage/${category.img_url}`"
                                :alt="category.name"
                            />
                        </figure>
                        <span class="text-sm">{{ category.name }}</span>
                        <a href="#" class="absolute inset-0"></a>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, Transition, watch } from "vue";

const { categories } = defineProps({
    categories: Object,
});

const loading = ref(true);

watch(
    () => categories,
    (newVal) => {
        if (newVal && newVal.length > 0) {
            setTimeout(() => (loading.value = false), 1300); // Tambah delay 500ms
        }
    },
    { immediate: true }
);
</script>

<style lang="css" scoped></style>
