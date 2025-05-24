<template>
    <div>
        <section class="relative">
            <div class="bg-slate-400 relative">
                <Link
                    :href="route('home')"
                    class="absolute top-5 left-5 z-50 btn btn-warning btn-circle"
                    ><i class="bx bx-left-arrow-alt bx-sm text-base-content"></i
                ></Link>
                <Splide
                    ref="splideRef"
                    :options="splideOptions"
                    aria-label="My Favorite Images"
                >
                    <SplideSlide
                        v-for="(slide, index) in galleries.product_galleries"
                        :key="index"
                    >
                        <figure class="w-full h-full">
                            <img
                                class="w-full h-full object-cover"
                                :src="`storage/${slide.image_url}`"
                                alt=""
                            />
                        </figure>
                    </SplideSlide>
                </Splide>

                <div
                    class="flex justify-center bg-white/30 backdrop-blur-sm px-2 rounded-full py-1 gap-2.5 mt-6 absolute bottom-[12%] left-1/2 -translate-x-1/2"
                >
                    <button
                        v-for="(slide, index) in galleries.product_galleries"
                        :key="index"
                        :class="[
                            'w-2.5 h-2.5 rounded-full',
                            currentIndex === index
                                ? 'bg-amber-400 scale-150 shadow-lg'
                                : 'bg-amber-100 hover:bg-amber-200',
                        ]"
                        @click="goToSlide(index)"
                    ></button>
                </div>

                <div
                    class="flex left-0 right-0 gap-x-4 mx-4 text-base-300 bg-base-content shadow-[0px_12px_30px_0px_#07041517] p-4 -translate-y-1/2 rounded-3xl justify-between absolute top-full z-20"
                >
                    <span class="flex flex-col gap-y-3">
                        <h1 class="text-xl font-bold">{{ galleries.name }}</h1>
                        <span class="flex gap-x-3">
                            <span class="flex gap-x-1">
                                <span
                                    class="text-xs badge badge-primary animate-pulse"
                                    >Mulai</span
                                >
                                <span>{{
                                    galleries.sub_products.length
                                        ? formatRupiah(
                                              Math.min(
                                                  ...galleries.sub_products.map(
                                                      (s) => s.price
                                                  )
                                              )
                                          )
                                        : "-"
                                }}</span>
                            </span>

                            <span class="flex gap-x-1">
                                <i class="bx bxs-user bx-sm text-primary"></i>
                                <span>{{
                                    galleries.sub_products.length
                                        ? Math.min(
                                              ...galleries.sub_products.map(
                                                  (s) => s.portion
                                              )
                                          )
                                        : "-"
                                }}</span>
                            </span>
                        </span></span
                    >
                    <span
                        class="bg-primary flex flex-col items-center justify-center px-2 gap-y-1 rounded-2xl text-white"
                    >
                        <i class="bx bxs-star bx-sm text-amber-200"></i>

                        <span class="">4.9/5</span>
                    </span>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted, reactive, ref } from "vue";

const { galleries } = defineProps({
    galleries: Object,
});

const formatRupiah = (value) => {
    if (!value) return "Rp 0";
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0, // Tanpa koma desimal
    }).format(value);
};

const splideRef = ref(null);

// Slider options
const splideOptions = reactive({
    type: "loop",
    pagination: false, // Disable default pagination
    arrows: false,
    fixedHeight: 530,
});

// Current index for custom pagination
const currentIndex = ref(0);

// Go to a specific slide
const goToSlide = (index) => {
    splideRef.value.go(index);
};

// Update current index when the slide changes
const handleMoved = (newIndex) => {
    currentIndex.value = newIndex;
};

// Initialize Splide events
onMounted(() => {
    const splide = splideRef.value?.splide;
    if (splide) {
        splide.on("moved", handleMoved);
    } else {
        console.error("Splide instance is not defined");
    }
});
</script>

<style lang="scss" scoped></style>
