<template>
    <section class="relative z-10 mt-20 px-4">
        <div class="breadcrumbs text-sm text-warning">
            <ul>
                <li><a>Home</a></li>
                <li><a>Documents</a></li>
                <li class="text-neutral-content">Add Document</li>
            </ul>
        </div>
        <div>
            <h2 class="font-bold my-3">Deskripsi paket</h2>
            <p
                v-html="product.description"
                class="font-light text-neutral-content"
            ></p>
        </div>

        <div>
            <h2 class="font-semibold my-3">Detail paket</h2>
            <div class="grid grid-cols-2 gap-3">
                <div class="flex items-center gap-2">
                    <span
                        class="flex items-center justify-center rounded-full p-3 bg-primary"
                        ><i class="text-white bx bxs-truck bx-sm"></i
                    ></span>
                    <p>Bisa diantar</p>
                </div>
                <div class="flex items-center gap-2">
                    <span
                        class="flex items-center justify-center rounded-full p-3 bg-primary"
                    >
                        <i class="bx bx-package text-white bx-sm"></i>
                    </span>
                    <p>
                        Tampah/mika D{{
                            product.sub_products.length
                                ? Math.min(
                                      ...product.sub_products.map((s) => s.size)
                                  )
                                : "-"
                        }}cm
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span
                        class="flex items-center justify-center rounded-full p-3 bg-primary"
                        ><i class="text-white bx bx-bowl-rice bx-sm"></i
                    ></span>
                    <p>tambahan +25rb/porsi</p>
                </div>
                <div class="flex items-center gap-2">
                    <span
                        class="flex items-center justify-center rounded-full p-3 bg-primary"
                        ><i class="text-white bx bx-image bx-sm"></i
                    ></span>
                    <p>Free ucapan+foto</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class="font-semibold my-8 bg-info text-base-300 px-4 py-2">
                Ada harga khusus juga loh kalau pian ambil porsi besar :)
            </h2>
            <ul class="font-light flex flex-col gap-2">
                <li class="flex items-start gap-2">
                    <i class="bx bxs-circle text-primary"></i>
                    <div>
                        Porsi 8 harga <del>Rp 275rb</del> hanya
                        <span class="font-bold text-warning">Rp 255rb</span>
                        <p>(Uk 35cm tampah plastik)</p>
                    </div>
                </li>
                <li class="flex items-center gap-2">
                    <i class="bx bxs-circle text-primary"></i> Porsi 8 harga
                    <del>Rp 275rb</del> hanya
                    <span class="font-bold text-warning">Rp 255rb</span>
                </li>
            </ul>
        </div>
    </section>
</template>

<script setup>
const { product } = defineProps({
    product: Object,
});
</script>

<style lang="scss" scoped></style>
