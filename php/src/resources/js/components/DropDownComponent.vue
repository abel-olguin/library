<template>
    <div class="flex space-x-4 relative">
        <a href="#" @click="toggleMenu" class="menu-link">
            {{ title }}
        </a>

        <div class="absolute top-full bg-white shadow-sm border border-gray-100 rounded-md w-40 text-center" v-if="open">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "AuthComponent",
    props: ['title'],
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
