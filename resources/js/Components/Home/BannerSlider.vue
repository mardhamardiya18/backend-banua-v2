<template>
    <section class="relative max-w-sm mt-5">
        <Splide
            :options="{
                type: 'loop',
                pagination: false,
                gap: 20,
                padding: { left: 20 },
                arrows: false,
                perPage: 1,
            }"
            aria-label="My Favorite Images"
        >
            <SplideSlide
                v-for="banner in banners"
                :key="banner.id"
                data-splide-interval="1500"
                class="max-w-xs h-[200px]"
            >
                <div class="skeleton w-full h-full" v-if="loading"></div>

                <div
                    v-else
                    class="h-full rounded-3xl overflow-hidden relative border"
                >
                    <figure class="w-full h-full absolute">
                        <img
                            class="w-full h-full object-cover object-center"
                            :src="`/storage/${banner.img_url}`"
                            alt=""
                        />
                    </figure>

                    <a :href="banner.url" class="absolute inset-0"></a>
                </div>
            </SplideSlide>
        </Splide>
    </section>
</template>

<script setup>
import { ref, watch } from "vue";

const { banners } = defineProps({
    banners: Object,
});

const loading = ref(true);

watch(
    () => banners,
    (newVal) => {
        if (newVal && newVal.length > 0) {
            setTimeout(() => (loading.value = false), 1300); // Tambah delay 500ms
        }
    },
    { immediate: true }
);
</script>

<style lang="scss" scoped></style>
