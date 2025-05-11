<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen max-w-sm mx-auto shadow-lg relative">
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    title: {
        type: String,
        default: "Produk",
    },
});
</script>

<style lang="scss" scoped></style>
