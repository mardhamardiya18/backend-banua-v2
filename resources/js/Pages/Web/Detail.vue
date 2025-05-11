<template>
    <DetailLayout title="Detail">
        <Gallery />
        <Description />

        <div class="sticky bottom-4 px-4 z-50 mt-8">
            <div
                class="border-2 border-amber-300 rounded-xl flex items-center justify-between gap-x-3 bg-base-content shadow-[0px_12px_30px_0px_#07041517] p-3 pl-6"
            >
                <span class="flex flex-col text-base-300">
                    <span class="font-bold text-lg">Paket Reguler</span>
                    <span class="flex gap-x-1">
                        <span class="text-xs badge badge-primary animate-pulse"
                            >Mulai</span
                        >
                        <span>Rp 200.000</span>
                    </span>
                </span>
                <RouterLink
                    :to="{ name: 'order' }"
                    class="btn btn-warning flex items-center justify-center text-base-content"
                    >Buat Pesanan</RouterLink
                >
            </div>
        </div>
    </DetailLayout>
</template>

<script setup>
import Description from "@/Components/Detail/Description.vue";
import Gallery from "@/Components/Detail/Gallery.vue";
import DetailLayout from "@/Layouts/DetailLayout.vue";
</script>

<style lang="scss" scoped></style>
