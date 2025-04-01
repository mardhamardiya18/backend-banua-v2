<template>
    <AppLayout title="Update Extra Menu">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Extra Menu
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <form
                @submit.prevent="update"
                class="max-w-md mx-auto"
                enctype="multipart/form-data"
            >
                <div class="mb-5">
                    <label
                        for="subproduct"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Pilih Sub produk</label
                    >
                    <select
                        v-model="form.subproduct_id"
                        id="subproduct"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option
                            v-for="subproduct in subproducts"
                            :key="subproduct.id"
                            :value="subproduct.id"
                            :selected="
                                subproduct.id === extraMenu.subproduct_id
                            "
                            :disabled="
                                subproduct.id === extraMenu.subproduct_id
                            "
                        >
                            {{
                                subproduct.id === extraMenu.subproduct_id
                                    ? subproduct.portion +
                                      `(${subproduct.product.name})` +
                                      " -- Terpilih"
                                    : subproduct.portion +
                                      `(${subproduct.product.name})`
                            }}
                        </option>
                    </select>
                </div>

                <div class="mb-5">
                    <label
                        for="menuoption"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Pilih menu yang ditambahkan</label
                    >
                    <select
                        v-model="form.menuoption_id"
                        id="menuoption"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option
                            v-for="menu in menuoptions"
                            :key="menu.id"
                            :value="menu.id"
                            :selected="menu.id === extraMenu.menuoption_id"
                            :disabled="menu.id === extraMenu.menuoption_id"
                        >
                            {{
                                menu.id === extraMenu.menuoption_id
                                    ? menu.name + " -- Terpilih"
                                    : menu.name
                            }}
                        </option>
                    </select>
                </div>

                <div class="mb-5">
                    <label
                        for="extra_price"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Tambahkan extra harga
                    </label>
                    <input
                        v-model="form.extra_price"
                        type="number"
                        id="extra_price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <button
                    type="submit"
                    class="text-white bg-amber-500 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                >
                    Submit
                </button>
                <Link
                    :href="route('extra-menu.index')"
                    class="text-white bg-rose-500 inline-block ms-2 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                    >Kembali</Link
                >
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { reactive } from "vue";
import Swal from "sweetalert2";

const { extraMenu, subproducts, menuoptions } = defineProps({
    subproducts: Object,
    menuoptions: Object,
    extraMenu: Object,
});

const form = reactive({
    subproduct_id: extraMenu.subproduct_id,
    menuoption_id: extraMenu.menuoption_id,
    extra_price: extraMenu.extra_price,
});

const update = () => {
    Swal.fire({
        title: "Updating...",
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            const formData = new FormData();
            formData.append("subproduct_id", form.subproduct_id);
            formData.append("menuoption_id", form.menuoption_id);
            formData.append("extra_price", form.extra_price);
            formData.append("_method", "put");

            router.post(`/admin/extra-menu/${extraMenu.id}`, formData, {
                forceFormData: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "A new one!",
                        text: "Your item has been updated",
                        icon: "success",
                        timer: 1000,
                    });
                },
            });
        }
    });
};
</script>

<style lang="scss" scoped></style>
