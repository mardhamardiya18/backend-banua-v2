<template>
    <div>
        <h2 class="font-semibold mb-5 px-4 text-xl">
            Recommend paket untukmu :)
        </h2>
        <div class="flex flex-col gap-y-4 px-4">
            <div
                v-for="recommend in recommends"
                :key="recommend.id"
                class="flex gap-x-3"
            >
                <figure
                    class="w-[160px] h-[200px] flex-none rounded-2xl overflow-hidden relative"
                >
                    <img
                        class="w-full h-full object-cover object-center"
                        :src="`/storage/${recommend.product.thumbnail}`"
                        alt=""
                    />
                </figure>
                <span class="flex flex-col gap-y-3 pt-4">
                    <span class="font-semibold">{{
                        recommend.product.name
                    }}</span>
                    <span class="flex gap-x-1">
                        <i class="bx bxs-purchase-tag bx-sm text-primary"></i>
                        <span class="text-gray2">{{
                            formatRupiah(recommend.price)
                        }}</span>
                    </span>

                    <span class="flex gap-x-1">
                        <i class="bx bxs-dish bx-sm text-primary"></i>
                        <span class="text-gray2"
                            >Untuk {{ recommend.portion }}</span
                        >
                    </span>

                    <a href="#" class="btn btn-warning text-base-content"
                        >Pesan Sekarang</a
                    >
                </span>
            </div>
        </div>
    </div>
</template>

<script setup>
const formatRupiah = (value) => {
    if (!value) return "Rp 0";
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0, // Tanpa koma desimal
    }).format(value);
};

const { recommends } = defineProps({
    recommends: Object,
});
</script>

<style lang="scss" scoped></style>
