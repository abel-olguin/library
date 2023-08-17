<script src="../app.js"></script>
<template>
    <div class="modal-background">
        <div class="flex items-center justify-center h-full mx-4">
            <div class="bg-white w-full lg:w-1/4 rounded overflow-hidden">
               <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
}
</script>

<style scoped>

</style>
