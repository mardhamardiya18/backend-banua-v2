<template>
    <AppLayout title="Edit Sub-product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Sub-product
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
                        for="product_id"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Turunan Produk</label
                    >
                    <select
                        v-model="form.product_id"
                        id="product_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option
                            v-for="product in products"
                            :key="product.id"
                            :selected="product.id === subproduct.product_id"
                            :disabled="product.id === subproduct.product_id"
                            :value="product.id"
                        >
                            {{
                                product.id === subproduct.product_id
                                    ? product.name + " -- Terpilih"
                                    : product.name
                            }}
                        </option>
                    </select>
                </div>

                <div class="mb-5">
                    <label
                        for="porsion"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Porsi/tipe</label
                    >
                    <input
                        v-model="form.portion"
                        type="text"
                        id="porsion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <div class="mb-5">
                    <label
                        for="discount"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Buat Diskon</label
                    >
                    <input
                        v-model="form.discount"
                        type="number"
                        id="discount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <div class="mb-5">
                    <label
                        for="extra"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Extra harga</label
                    >
                    <input
                        v-model="form.extra"
                        type="number"
                        id="extra"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <div class="mb-5">
                    <label
                        for="size"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Ukuran</label
                    >
                    <input
                        v-model="form.size"
                        type="number"
                        id="size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <div class="mb-5">
                    <label
                        for="price"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Harga satuan</label
                    >
                    <input
                        v-model="form.price"
                        type="text"
                        id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <div class="mb-5">
                    <label
                        for="note"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Note/caption</label
                    >
                    <textarea
                        v-model="form.note"
                        type="text"
                        id="note"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <button
                    type="submit"
                    class="text-white bg-amber-500 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                >
                    Update
                </button>
                <Link
                    :href="route('subproduct.index')"
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

const { products, subproduct } = defineProps({
    products: Object,
    subproduct: Object,
});

const form = reactive({
    product_id: subproduct.product_id,
    portion: subproduct.portion,
    discount: subproduct.discount,
    extra: subproduct.extra,
    size: subproduct.size,
    price: subproduct.price,
    note: subproduct.note,
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
        if (result.dismiss === Swal.DismissReason.timer) {
            const formData = new FormData();
            formData.append("product_id", form.product_id);
            formData.append("portion", form.portion);
            formData.append("discount", form.discount);
            formData.append("extra", form.extra);
            formData.append("size", form.size);
            formData.append("price", form.price);
            formData.append("note", form.note);
            formData.append("_method", "put");

            router.post(`/admin/subproduct/${subproduct.id}`, formData, {
                forceFormData: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "A update one!",
                        text: "The product has been updated!",
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
