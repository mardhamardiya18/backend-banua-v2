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
                                    <span class="sr-only">Image</span>
                                </th>
                                <th scope="col" class="px-6 py-3">Items</th>
                                <th scope="col" class="px-6 py-3">Slug</th>
                                <th scope="col" class="px-6 py-3">Harga</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b border-gray-200 hover:bg-gray-50"
                            >
                                <td class="p-4">
                                    <img
                                        src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        class="w-16 md:w-32 max-w-full max-h-full"
                                        alt="Apple Watch"
                                    />
                                </td>
                                <td class="px-6 py-4">Apple MacBook Pro 17"</td>

                                <td class="px-6 py-4">$2999</td>
                                <td class="px-6 py-4">$2999</td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="route('product.edit')"
                                        class="font-medium text-blue-600 hover:underline"
                                        ><i class="bx bxs-edit bx-sm"></i
                                    ></Link>
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
import { Link } from "@inertiajs/vue3";
</script>

<style lang="scss" scoped></style>
