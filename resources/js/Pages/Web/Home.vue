<template>
    <HomeLayout title="Katalog">
        <BannerSlider :banners="banners" />
        <Category :categories="categories" />
    </HomeLayout>
</template>

<script setup>
import BannerSlider from "@/Components/Home/BannerSlider.vue";
import Category from "@/Components/Home/Category.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";

const { categories, banners } = defineProps({
    categories: Object,
    banners: Object,
});
</script>

<style lang="scss" scoped></style>
