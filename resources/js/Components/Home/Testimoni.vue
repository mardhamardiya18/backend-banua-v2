<template>
    <div>
        <h2 class="font-semibold mb-5 px-4 text-xl">
            Dan mereka puas dengan pesanannya!
        </h2>
        <Splide
            :options="{
                type: 'loop',
                pagination: false,
                gap: 20,
                padding: { left: 20 },
                arrows: false,
                fixedWidth: 280,
                fixedHeight: 400,
            }"
            aria-label="My Favorite Images"
        >
            <SplideSlide v-for="item in testimonials" :key="item.id">
                <div class="skeleton w-full h-full" v-if="loading"></div>

                <div
                    v-else
                    class="h-full rounded-3xl overflow-hidden relative border flex flex-col gap-y-3"
                >
                    <figure class="w-full h-full">
                        <img
                            class="w-full h-full object-cover object-center"
                            :src="`/storage/${item.img_url}`"
                            alt=""
                        />
                    </figure>
                </div>
            </SplideSlide>
        </Splide>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";

const { testimonials } = defineProps({
    testimonials: Object,
});

const loading = ref(true);

watch(
    () => testimonials,
    (newVal) => {
        if (newVal && newVal.length > 0) {
            setTimeout(() => (loading.value = false), 1300); // Tambah delay 500ms
        }
    },
    { immediate: true }
);
</script>

<style lang="scss" scoped></style>
