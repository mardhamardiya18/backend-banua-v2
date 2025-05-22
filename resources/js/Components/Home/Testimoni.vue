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
                fixedWidth: 300,
                autoHeight: true,
            }"
            aria-label="My Favorite Images"
        >
            <SplideSlide>
                <div
                    class="h-full rounded-3xl overflow-hidden relative border flex flex-col gap-y-3"
                >
                    <figure class="w-full h-full">
                        <img
                            class="w-full h-full object-cover object-center"
                            src="/image/slide1.png"
                            alt=""
                        />
                    </figure>
                </div>
            </SplideSlide>
        </Splide>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
