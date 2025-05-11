<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen max-w-sm mx-auto py-10 shadow-lg relative">
            <nav>
                <header class="flex items-center justify-between px-4">
                    <img
                        src="/image/logo.svg"
                        class="h-[65px] rounded-full"
                        alt="Banua Tumpeng"
                    />
                    <a href="#" class="btn btn-warning text-base-content"
                        >Order Sekarang</a
                    >
                </header>
            </nav>

            <main class="flex flex-col gap-y-8">
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
        default: "Homepage",
    },
});
</script>

<style lang="scss" scoped></style>
