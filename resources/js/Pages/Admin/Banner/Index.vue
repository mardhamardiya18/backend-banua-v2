<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { banners } = defineProps({
    banners: Array,
});

const destroy = (id) => {
    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/admin/banner/${id}`, {
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

<template>
    <AppLayout title="Manage Banner">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Banner
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <Link
                :href="route('banner.create')"
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

                                <th scope="col" class="px-6 py-3">Urutan</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="banners.length !== 0"
                                v-for="banner in banners"
                                :key="banner.id"
                                class="bg-white border-b border-gray-200 hover:bg-gray-50"
                            >
                                <td class="p-4">
                                    <img
                                        :src="`/storage/${banner.img_url}`"
                                        class="w-16 md:w-32 max-w-full max-h-full"
                                        alt="Apple Watch"
                                    />
                                </td>
                                <td class="px-6 py-4">{{ banner.order }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        :class="
                                            banner.active === 1
                                                ? 'bg-emerald-500 text-white text-xs font-medium px-2.5 py-0.5 rounded'
                                                : 'bg-red-500 text-white text-xs font-medium px-2.5 py-0.5 rounded'
                                        "
                                    >
                                        {{
                                            banner.active === 1
                                                ? "Terpublish"
                                                : "Pending"
                                        }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route('banner.edit', {
                                                banner: banner.id,
                                            })
                                        "
                                        class="font-medium text-blue-600 hover:underline"
                                        ><i class="bx bxs-edit bx-sm"></i
                                    ></Link>
                                    <button
                                        @click.prevent="destroy(banner.id)"
                                        class="font-medium text-red-600 hover:underline ms-4"
                                    >
                                        <i class="bx bx-trash bx-sm"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr v-else>
                                <td colspan="4" class="p-5 text-center">
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
