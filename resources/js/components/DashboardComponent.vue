<template>
    <div class="h-screen flex flex-col" :style="changeOpacity">
        <div class="text-5xl text-white p-4">
            <h1 class="flex justify-center font-black">My TODO Tasks</h1>
        </div>
        <div class="p-5 flex flex-row h-full mb-3">
            <div class="h-full bg-white m-3 rounded-lg basis-4/12 flex flex-col">
                <h1 class="font-black text-xl text-red-500 text-center p-3">To Do</h1>
                <div class="bg-gray-300 w-5/6 h-0.5 self-center"></div>
                <div class="flex-grow p-2">
                    <Task />
                </div>
                <button @click="openPopup" class="w-full bg-green-600 rounded-b-lg p-3 text-white font-bold">Add new task</button>
                <teleport to="#popup">
                    <div v-if="open">
                        <Popup @close="closePopup" />
                    </div>
                </teleport>
            </div>
            <div class="h-full bg-white m-3 rounded-lg basis-4/12 flex flex-col">
                <h1 class="font-black text-xl text-yellow-500 text-center p-3">Doing</h1>
                <div class="bg-gray-300 w-5/6 h-0.5 self-center"></div>
            </div>
            <div class="h-full bg-white m-3 rounded-lg basis-4/12 flex flex-col">
                <h1 class="font-black text-xl text-green-500 text-center p-3">Done</h1>
                <div class="bg-gray-300 w-5/6 h-0.5 self-center"></div>
            </div>
        </div>
    </div>
</template>

<script>
import Task from './TaskComponent.vue'
import Popup from './PopupComponent.vue'

export default {
    data() {
        return {
            open: false,
        }
    },
    components: { Task, Popup, },
    computed: {
        changeOpacity() {
            return {
                opacity: this.open ? 0.5 : 1,
            }
        },
    },
    methods: {
        closePopup() {
            this.open = false
        },
        openPopup() {
            this.open = true
        }
    }
}
</script>
