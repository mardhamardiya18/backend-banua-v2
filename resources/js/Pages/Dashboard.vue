<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"
                >
                    <div
                        class="block max-w-sm p-6 bg-white border border-rose-400 rounded-xl shadow-sm"
                    >
                        <h5 class="mb-2 tracking-tight text-gray-400">
                            Total Paket
                        </h5>
                        <p class="text-2xl font-bold">10 Items</p>

                        <Link
                            :href="route('product.index')"
                            class="py-2 px-4 bg-rose-500 text-white rounded-lg mt-4 inline-block hover:bg-rose-800 transition duration-200"
                            >Kelola</Link
                        >
                    </div>

                    <div
                        class="block max-w-sm p-6 bg-white border border-amber-400 rounded-xl shadow-sm"
                    >
                        <h5 class="mb-2 tracking-tight text-gray-400">
                            Total Kategori
                        </h5>
                        <p class="text-2xl font-bold">10 Items</p>

                        <Link
                            :href="route('category.index')"
                            class="py-2 px-4 bg-amber-500 text-white rounded-lg mt-4 inline-block hover:bg-amber-800 transition duration-200"
                            >Kelola</Link
                        >
                    </div>

                    <div
                        class="block max-w-sm p-6 bg-white border border-sky-400 rounded-xl shadow-sm"
                    >
                        <h5 class="mb-2 tracking-tight text-gray-400">
                            Total Pengunjung
                        </h5>
                        <p class="text-2xl font-bold">10 Items</p>

                        <a
                            href="#"
                            class="py-2 px-4 bg-sky-500 text-white rounded-lg mt-4 inline-block hover:bg-sky-800 transition duration-200"
                            >Kelola</a
                        >
                    </div>

                    <div
                        class="block max-w-sm p-6 bg-white border border-teal-400 rounded-xl shadow-sm"
                    >
                        <h5 class="mb-2 tracking-tight text-gray-400">
                            Total Banner
                        </h5>
                        <p class="text-2xl font-bold">10 Items</p>

                        <a
                            href="#"
                            class="py-2 px-4 bg-teal-500 text-white rounded-lg mt-4 inline-block hover:bg-teal-800 transition duration-200"
                            >Kelola</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
