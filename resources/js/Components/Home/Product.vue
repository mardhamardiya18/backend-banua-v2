<template>
    <div>
        <h2 class="font-semibold mb-5 px-4 text-xl">
            Kebanyakan orang pesan paket ini!
        </h2>
        <Splide
            :options="{
                type: 'loop',
                pagination: false,
                gap: 20,
                padding: { left: 20 },
                arrows: false,
                perPage: 1,
                fixedWidth: 240,
                fixedHeight: 280,
            }"
            aria-label="My Favorite Images"
        >
            <SplideSlide v-for="random in randoms" :key="random.id">
                <div class="h-full rounded-3xl overflow-hidden relative border">
                    <figure class="w-full h-full absolute">
                        <img
                            class="w-full h-full object-cover"
                            :src="`/storage/${random.thumbnail}`"
                            :alt="random.name"
                        />
                    </figure>

                    <div
                        class="absolute left-2 bottom-2 right-2 flex flex-col bg-base-content text-base-300 rounded-2xl p-3 border-2 border-amber-300"
                    >
                        <span class="font-bold">{{ random.name }}</span>

                        <span class="flex gap-x-1 items-center mt-1">
                            <span
                                class="text-xs badge badge-primary animate-pulse"
                                >Mulai</span
                            >
                            <span>{{
                                formatRupiah(random.sub_products[0]?.price)
                            }}</span>
                        </span>
                    </div>
                    <Link
                        :href="route('product')"
                        class="absolute inset-0"
                    ></Link>
                </div>
            </SplideSlide>
        </Splide>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const formatRupiah = (value) => {
    if (!value) return "Rp 0";
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0, // Tanpa koma desimal
    }).format(value);
};

const { randoms } = defineProps({
    randoms: Object,
});
</script>

<style lang="scss" scoped></style>
