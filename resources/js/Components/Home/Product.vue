<template>
    <div>
        <h2 class="font-semibold mb-4 px-4 text-xl">
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
            <SplideSlide>
                <div class="h-full rounded-3xl overflow-hidden relative border">
                    <figure class="w-full h-full absolute">
                        <img
                            class="w-full h-full object-cover"
                            src="/image/slide1.png"
                            alt=""
                        />
                    </figure>

                    <div
                        class="absolute left-2 bottom-2 right-2 flex flex-col bg-base-content text-base-300 rounded-2xl p-3 border-2 border-amber-300"
                    >
                        <span class="font-bold">Tumpeng Special</span>

                        <span class="flex gap-x-1 items-center mt-1">
                            <span
                                class="text-xs badge badge-primary animate-pulse"
                                >Mulai</span
                            >
                            <span>Rp 200.000</span>
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
</script>

<style lang="scss" scoped></style>
