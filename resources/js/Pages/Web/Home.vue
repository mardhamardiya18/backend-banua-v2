<template>
    <HomeLayout title="Katalog">
        <BannerSlider :banners="banners" />
        <Category :categories="categories" />
        <Product :randoms="randoms" />
        <Testimoni />
        <Recommend :recommends="is_recommends" />
    </HomeLayout>
</template>

<script setup>
import BannerSlider from "@/Components/Home/BannerSlider.vue";
import Category from "@/Components/Home/Category.vue";
import Product from "@/Components/Home/Product.vue";
import Recommend from "@/Components/Home/Recommend.vue";
import Testimoni from "@/Components/Home/Testimoni.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";

const { categories, banners, randoms, is_recommends } = defineProps({
    categories: Array,
    banners: Array,
    is_recommends: Array,
    randoms: Array,
});
</script>

<style lang="scss" scoped></style>
