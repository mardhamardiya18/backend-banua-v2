<template>
    <div>
        <h2 class="font-semibold mb-4 px-4 text-xl">
            Recommend paket untukmu :)
        </h2>
        <div class="flex flex-col gap-y-4 px-4">
            <div class="flex gap-x-3">
                <figure
                    class="w-[160px] h-[200px] flex-none rounded-2xl overflow-hidden relative"
                >
                    <img
                        class="w-full h-full object-cover object-center"
                        src="/image/slide1.png"
                        alt=""
                    />
                </figure>
                <span class="flex flex-col gap-y-3 pt-4">
                    <span class="font-semibold">Tumpeng Reguler</span>
                    <span class="flex gap-x-1">
                        <i class="bx bxs-purchase-tag bx-sm text-primary"></i>
                        <span class="text-gray2">Rp 200.000</span>
                    </span>

                    <span class="flex gap-x-1">
                        <i class="bx bxs-dish bx-sm text-primary"></i>
                        <span class="text-gray2">Untuk 5 porsi</span>
                    </span>

                    <a href="#" class="btn btn-warning text-base-content"
                        >Pesan Sekarang</a
                    >
                </span>
            </div>
        </div>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
