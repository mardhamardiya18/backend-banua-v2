<template>
    <DetailLayout :product="product" title="Detail">
        <Gallery :galleries="product" />
        <Description :product="product" />
    </DetailLayout>
</template>

<script setup>
import Description from "@/Components/Detail/Description.vue";
import Gallery from "@/Components/Detail/Gallery.vue";
import DetailLayout from "@/Layouts/DetailLayout.vue";

const { product } = defineProps({
    product: Object,
});
</script>

<style lang="scss" scoped></style>
