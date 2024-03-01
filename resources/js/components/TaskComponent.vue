<template>
    <div class="w-full rounded-lg flex flex-col border-2">
        <div class="p-4 flex-grow">{{ message }}</div>
        <div class="flex flex-row divide-x divide-black mt-1 rounded-b-lg opacity-0 transition-opacity hover:opacity-100">
            <button class="bg-purple-300 basis-2/6 rounded-bl-lg opacity-50 transition-opacity hover:opacity-100">&#9668;</button>
            <button class="bg-purple-300 basis-2/6 opacity-50 transition-opacity hover:opacity-100">&#9658;</button>
            <button class="bg-red-300 basis-2/6 rounded-br-lg opacity-50 transition-opacity hover:opacity-100">&#128941;</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Some message",
        }
    }
}
</script>
