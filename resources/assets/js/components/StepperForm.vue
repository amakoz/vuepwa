<template>
    <transition name="slide" mode="in-out">
        <div v-if="isActive">
            <slot></slot>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            active: {
                default: false,
                type: Boolean,
            }
        },
        data() {
            return {
                isActive: false,
            }
        },
        methods: {
            open(e) {
                this.isActive = true;
            },

            close(e) {
                this.isActive = false;
            },

            toggle(e) {
                return this.isActive ? this.close(e) : this.open(e);
            }
        },
        mounted() {
            if (this.active) {
                this.open();
            }
        }
    }
</script>