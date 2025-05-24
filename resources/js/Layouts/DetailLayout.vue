<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen max-w-sm mx-auto shadow-lg relative">
            <main>
                <slot />
            </main>

            <footer class="mt-12">
                <div>
                    <div class="flex items-center gap-2">
                        <img
                            src="/image/logo.svg"
                            class="h-[65px] rounded-full"
                            alt="Banua Tumpeng"
                        />
                        <div>
                            <h1 class="text-xl font-bold mt-2">
                                Banua Tumpeng
                            </h1>
                            <p class="text-sm text-gray-500">
                                Tumpeng & Catering Services
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h1 class="text-lg font-bold mt-2">Tentang Kami</h1>
                        <p class="text-sm text-gray-400 mt-3">
                            Banua Tumpeng adalah penyedia layanan tumpeng dan
                            catering yang sudah dipercaya 1000++ customer
                            banjarmasin, banjarbaru, dan martapura dalam
                            menyukseskan konsumsi acara mereka
                        </p>
                    </div>

                    <div class="mt-6">
                        <h1 class="text-lg font-bold mt-2">Kontak Kami</h1>
                        <ul class="mt-3">
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center gap-x-1 group"
                                >
                                    <i
                                        class="bx bxl-whatsapp bx-sm text-gray-400 group-hover:text-green-500 transition"
                                    />
                                    <span
                                        class="text-sm text-gray-400 group-hover:text-green-500 transition"
                                    >
                                        0851-5625-3408
                                    </span>
                                </a>
                            </li>

                            <li class="mt-2">
                                <a
                                    href="#"
                                    class="flex items-center gap-x-1 group"
                                >
                                    <i
                                        class="bx bxl-instagram bx-sm text-gray-400 group-hover:text-blue-500 transition"
                                    />
                                    <span
                                        class="text-sm text-gray-400 group-hover:text-blue-500 transition"
                                    >
                                        @banuatumpeng
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-6">
                        <h1 class="text-lg font-bold mt-2">Alamat Kami</h1>
                        <p class="text-sm text-gray-400 mt-3">
                            Komp Putra Tunggal Mendiri Blok D No.6, Kel Landasan
                            Ulin Tengah, Kec Lianganggang, Kota Banjarbaru,
                            Kalimantan Selatan
                        </p>

                        <a
                            href="#"
                            class="flex items-center gap-x-1 group mt-2"
                        >
                            <i
                                class="bx bxs-map bx-sm text-gray-400 group-hover:text-green-500 transition"
                            />
                            <span
                                class="text-sm text-gray-400 group-hover:text-green-500 transition"
                            >
                                Google Maps
                            </span>
                        </a>
                    </div>

                    <p
                        class="text-center text-sm text-gray-500 mt-10 flex items-center justify-center gap-2"
                    >
                        <span
                            >&copy; 2025 Banua Tumpeng. All rights
                            reserved.</span
                        >
                    </p>
                </div>
            </footer>

            <div class="sticky bottom-4 px-4 z-50 mt-8">
                <div
                    class="border-2 border-amber-300 rounded-xl flex items-center justify-between gap-x-3 bg-base-content shadow-[0px_12px_30px_0px_#07041517] p-3 pl-6"
                >
                    <span class="flex flex-col text-base-300">
                        <span class="font-bold text-lg">{{
                            product.name
                        }}</span>
                        <span class="flex gap-x-1">
                            <span
                                class="text-xs badge badge-primary animate-pulse"
                                >Mulai</span
                            >
                            <span>{{
                                product.sub_products.length
                                    ? formatRupiah(
                                          Math.min(
                                              ...product.sub_products.map(
                                                  (s) => s.price
                                              )
                                          )
                                      )
                                    : "-"
                            }}</span>
                        </span>
                    </span>
                    <a
                        href="#"
                        class="btn btn-warning flex items-center justify-center text-base-content"
                        >Buat Pesanan</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    title: {
        type: String,
        default: "Produk",
    },
    product: Object,
});

const formatRupiah = (value) => {
    if (!value) return "Rp 0";
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0, // Tanpa koma desimal
    }).format(value);
};
</script>

<style lang="scss" scoped></style>
