<template>
    <AppLayout title="Edit produk">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit produk
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <form
                @submit.prevent="update"
                enctype="multipart/form-data"
                class="max-w-md mx-auto"
            >
                <div class="mb-5">
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Nama produk</label
                    >
                    <input
                        v-model="data.name"
                        type="text"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        required
                    />
                </div>

                <div class="mb-5">
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Pilih kategori</label
                    >

                    <select
                        v-model="data.category_id"
                        id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option
                            v-if="categories.length !== 0"
                            :selected="category.id === data.category_id"
                            :disabled="category.id === data.category_id"
                            v-for="category in categories"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.name }}
                            {{
                                category.id === data.category_id
                                    ? "-- Terpilih"
                                    : ""
                            }}
                        </option>
                        <option v-else>--Data kategori tidak tersedia--</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label
                        for="thumbnail"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Upload thumbnail (Kosongkan jika tidak diganti)</label
                    >
                    <label
                        for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
                    >
                        <div
                            class="flex flex-col items-center justify-center pt-5 pb-6"
                        >
                            <svg
                                class="w-8 h-8 mb-4 text-gray-500"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 20 16"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                                />
                            </svg>
                            <p
                                class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                            >
                                <span class="font-semibold"
                                    >Click to upload</span
                                >
                                or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input
                            @change="handleFileUpload"
                            id="dropzone-file"
                            type="file"
                            class="hidden"
                        />
                    </label>
                </div>

                <label class="block mb-2 text-sm font-medium text-gray-900"
                    >Buat deskripsi produk</label
                >
                <div v-html="product.description" ref="editor"></div>

                <div class="mt-5">
                    <button
                        type="submit"
                        class="text-white bg-amber-500 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                    >
                        Submit
                    </button>
                    <Link
                        :href="route('product.index')"
                        class="text-white bg-rose-500 inline-block ms-2 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >Kembali</Link
                    >
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { onMounted, reactive, ref } from "vue";
import Quill from "quill";
import Swal from "sweetalert2";

const editor = ref(null);
let quill = null;

onMounted(() => {
    quill = new Quill(editor.value, {
        theme: "snow",
    });
});

const handleFileUpload = (e) => {
    data.thumbnail = e.target.files[0];
};

const { categories, product } = defineProps({
    categories: {
        type: Object,
        required: true,
    },
    product: {
        type: Object,
        required: true,
    },
});

const data = reactive({
    name: product.name,
    category_id: product.category.id,
    thumbnail: null,
});

const update = () => {
    Swal.fire({
        title: `Update produk ${product.name}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData();
            formData.append("name", data.name);
            formData.append("category_id", data.category_id);
            if (data.thumbnail instanceof File) {
                formData.append("thumbnail", data.thumbnail);
            }
            formData.append("description", quill.root.innerHTML);
            formData.append("_method", "put");

            router.post(`/admin/product/${product.id}`, formData, {
                forceFormData: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "Success!",
                        text: "Product updated successfully",
                        icon: "success",
                    });
                },
            });
        }
    });
};
</script>

<style lang="css" scoped>
.ql-container {
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    background-color: #fff;
}
</style>
