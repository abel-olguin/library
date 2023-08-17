<template>
    <div class="flex space-x-4 relative">
        <button class="rounded-full p-2 px-3
                        border border-gray-400 text-gray-600
                        hover:bg-gray-600 hover:text-white"
                @click="toggleMenu">
            <i class="fa fa-gear "></i>
        </button>

        <div class="absolute top-full bg-white shadow-sm border
                    border-gray-100 rounded-md w-40 text-center
                    grid grid-cols-2 gap-2 p-2 z-10" v-if="open">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "TableAction",
    data(){
        return {
            open: false
        }
    },
    methods: {
        toggleMenu(){
            this.open = !this.open;
        }
    }
}
</script>

<style scoped>

</style>
