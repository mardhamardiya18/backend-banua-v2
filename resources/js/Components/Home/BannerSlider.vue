<template>
    <section class="relative max-w-sm mt-4">
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
                class="max-w-xs h-[180px]"
            >
                <div class="h-full rounded-3xl overflow-hidden relative border">
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
const { banners } = defineProps({
    banners: Object,
});
</script>

<style lang="scss" scoped></style>
