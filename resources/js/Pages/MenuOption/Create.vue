<template>
    <AppLayout title="Buat Menu Baru">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Buat Menu baru
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <form
                @submit.prevent="submit"
                class="max-w-md mx-auto"
                enctype="multipart/form-data"
            >
                <div class="mb-5">
                    <label
                        for="menu_type"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Pilih tipe menu</label
                    >
                    <select
                        v-model="form.menu_type"
                        id="menu_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option value="rice">Pilihan Nasi</option>
                        <option value="utama">Pilihan Utama</option>
                        <option value="pelengkap">Pilihan Pelengkap</option>
                        <option value="pendamping">Pilihan Pendamping</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Nama menu</label
                    >
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
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
                    :href="route('gallery.index')"
                    class="text-white bg-rose-500 inline-block ms-2 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                    >Kembali</Link
                >
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import { reactive } from "vue";
import Swal from "sweetalert2";
import AppLayout from "@/Layouts/AppLayout.vue";

const form = reactive({
    name: "",
    menu_type: "",
});

const submit = () => {
    Swal.fire({
        title: "Creating...",
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            const formData = new FormData();
            formData.append("name", form.name);
            formData.append("menu_type", form.menu_type);

            router.post("/admin/menu-option", formData, {
                forceFormData: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "A new one!",
                        text: "Your item has been added",
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
