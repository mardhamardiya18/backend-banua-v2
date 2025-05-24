<template>
    <AppLayout title="Manage product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage product
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <Link
                :href="route('product.create')"
                class="bg-amber-500 hover:bg-amber-700 focus:ring-4 focus:ring-yellow-300 px-5 py-2 rounded-full text-white mb-5 inline-flex items-center justify-center gap-2"
            >
                <i class="bx bx-plus"></i>
                Item Baru
            </Link>
            <div class="bg-white p-5">
                <div class="relative overflow-x-auto">
                    <div class="pb-4 bg-white">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none"
                            >
                                <svg
                                    class="w-4 h-4 text-gray-500"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                                    />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="table-search"
                                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari berdasarkan nama"
                            />
                        </div>
                    </div>
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50"
                        >
                            <tr>
                                <th scope="col" class="px-16 py-3">
                                    Thumbnail
                                </th>
                                <th scope="col" class="px-6 py-3">Items</th>
                                <th scope="col" class="px-6 py-3">Kategori</th>
                                <th scope="col" class="px-6 py-3">
                                    Sub produk
                                </th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="products.length !== 0"
                                v-for="product in products"
                                :key="product.id"
                                class="bg-white border-b border-gray-200 hover:bg-gray-50"
                            >
                                <td class="p-4">
                                    <img
                                        :src="`/storage/${product.thumbnail}`"
                                        class="w-16 md:w-32 max-w-full max-h-full"
                                        alt="Apple Watch"
                                    />
                                </td>
                                <td class="px-6 py-4">{{ product.name }}</td>

                                <td class="px-6 py-4">
                                    {{ product.category.name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="flex justify-center items-center gap-2 flex-col"
                                    >
                                        <span
                                            v-html="
                                                product.has_subproducts
                                                    ? `<i class='bx bx-check-circle text-green-500 bx-sm'></i>`
                                                    : `<i class='bx bx-x-circle text-red-500 bx-sm '></i>`
                                            "
                                        ></span>
                                        <div
                                            class="badge badge-warning animate-pulse"
                                            v-if="
                                                !product.subProducts?.length &&
                                                product.has_subproducts
                                            "
                                        >
                                            <svg
                                                class="size-[1em]"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 18 18"
                                            >
                                                <g fill="currentColor">
                                                    <path
                                                        d="M7.638,3.495L2.213,12.891c-.605,1.048,.151,2.359,1.362,2.359H14.425c1.211,0,1.967-1.31,1.362-2.359L10.362,3.495c-.605-1.048-2.119-1.048-2.724,0Z"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                    ></path>
                                                    <line
                                                        x1="9"
                                                        y1="6.5"
                                                        x2="9"
                                                        y2="10"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                    ></line>
                                                    <path
                                                        d="M9,13.569c-.552,0-1-.449-1-1s.448-1,1-1,1,.449,1,1-.448,1-1,1Z"
                                                        fill="currentColor"
                                                        data-stroke="none"
                                                        stroke="none"
                                                    ></path>
                                                </g>
                                            </svg>
                                            No Data
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route('product.edit', {
                                                product: product.id,
                                            })
                                        "
                                        class="font-medium text-blue-600 hover:underline"
                                        ><i class="bx bxs-edit bx-sm"></i
                                    ></Link>
                                    <button
                                        @click.prevent="
                                            destroy(product.id, product.name)
                                        "
                                        class="font-medium text-red-600 hover:underline ms-4"
                                    >
                                        <i class="bx bx-trash bx-sm"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr v-else>
                                <td class="px-6 py-4 text-center" colspan="4">
                                    No data available
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { products } = defineProps({
    products: Object,
});

const destroy = (id, name) => {
    Swal.fire({
        title: `Yakin mau hapus produk ${name}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/admin/product/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                    });
                },
            });
        }
    });
};
</script>

<style lang="scss" scoped></style>
