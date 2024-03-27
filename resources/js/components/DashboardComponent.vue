<template>
    <div class="h-screen flex flex-col" :style="changeOpacity">
        <div class="text-5xl text-white p-4 flex flex-row h-20">
            <div class="w-40">
            </div>
            <h1 class="flex justify-center items-center font-black flex-grow">My TODO Tasks</h1>
            <div class="w-40 flex justify-center items-center">
                <button class="bg-red-500 text-2xl p-2 rounded-lg w-36 text-bold" @click="logoutUser">Logout</button>
            </div>
        </div>
        <div class="p-5 flex flex-row h-full mb-3">
            <div class="h-full bg-white m-3 rounded-lg basis-4/12 flex flex-col">
                <h1 class="font-black text-xl text-red-500 text-center p-3">To Do</h1>
                <div class="bg-gray-300 w-5/6 h-0.5 self-center"></div>
                <div class="flex-grow p-2">
                    <ul>
                        <li>
                            <Task message = "The new props" :location="1" />
                        </li>
                    </ul>
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
                <div class="flex-grow p-2">
                    <ul>
                        <li>
                            <Task message="The props" :location="2"/>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="h-full bg-white m-3 rounded-lg basis-4/12 flex flex-col">
                <h1 class="font-black text-xl text-green-500 text-center p-3">Done</h1>
                <div class="bg-gray-300 w-5/6 h-0.5 self-center"></div>
                <div class="flex-grow p-2">
                    <ul>
                        <li>
                            <Task message = "the props " :location="3"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Store, mapActions, storeKey } from 'vuex';
import Task from './TaskComponent.vue'
import Popup from './PopupComponent.vue'

export default {
    data() {
        return {
            open: false,
            toDo:[],
            Doing:[],
            Done:[]
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
        ...mapActions(['logout']),
        closePopup() {
            this.open = false
        },
        openPopup() {
            this.open = true
        },
        logoutUser() {
            this.logout()
                .then(redirect => {
                    this.$router.push({ name: 'home' });
                });
        },
        async fetchTasks() {
            try {
                const response = await axios.get(`/api/getTasks/${this.$store.getters.currentUser}`).catch(error => {
                    console.log(error);
                });
                const data = response.data;
                console.log(data);

                for (const key in data) {
                    const item = data[key];

                    if (item.type === "ToDo") {
                        this.toDo.push(item);
                    } else if (item.type === "Doing") {
                        this.Doing.push(item);
                    } else if (item.type === "Done") {
                        this.Done.push(item);
                    } else {
                        console.log("Error Not the correct type of the task form server");
                    }
                }
            } catch (error) {
                console.error(error);
            }
        }
    },
    created() {
        this.fetchTasks();
    }
}
</script>
