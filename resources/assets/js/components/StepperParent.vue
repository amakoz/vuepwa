<template>
    <div class="w-full">
        <div class="border border-grey p-4 text-right mb-8 lg:mb-0">
            <transition name="fade" mode="in-out">
                <button v-show="actualStep !== 1" class="btn btn--black mr-4 w-24" @click="backStep">Powrót</button>
            </transition>
            <button :class="{'btn--green': actualStep < totalSteps, 'btn--red': actualStep === totalSteps,}"
                    class="btn w-24" @click="nextButtonAction">{{ actualStep < totalSteps ? 'Dalej' : 'Wyślij' }}
            </button>
        </div>
        <div class="flex flex-col lg:flex-row items-center w-full justify-between lg:py-8">
            <ul class="steps flex items-center justify-center mb-8 lg:mb-0">
                <li v-for="step in totalSteps" :key="step" class="step" @click="goToStep(step)"
                    :class="{ active: step === actualStep, line: step < totalSteps, 'done cursor-pointer': step < actualStep || step <= validated, 'pointer-events-none': step > validated }">
                    <span>{{ step }}</span>
                </li>
            </ul>
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                totalSteps: 0,
                actualStep: 1,
                validated: 1,
            }
        },
        methods: {
            nextStep() {
                this.goToStep(this.actualStep + 1);
                if (this.actualStep > this.validated) {
                    this.validated++;
                }
            },
            backStep() {
                this.goToStep(this.actualStep - 1);
            },
            goToStep(step) {
                this.$children[this.actualStep - 1].close();
                this.actualStep = step;
                let $this = this;
                setTimeout(function () {
                    $this.$children[$this.actualStep - 1].open();
                }, 500);
            },
            nextButtonAction() {
                this.$parent.$validator.validate().then(result => {
                    if (!result) {
                        // brak walidacji
                        return null;
                    }
                    else {
                        // walidacja przeszla
                        if (this.actualStep < this.totalSteps) {
                            return this.nextStep();
                        }
                        else {
                            return this.submit();
                        }
                    }
                });
            },
            submit() {
                alert(JSON.stringify(this.$parent.form, null, 4));
            },
        },
        mounted() {
            this.totalSteps = this.$children.length;
        }
    }
</script>

<style>
    .slide-enter-active, .slide-leave-active {
        transition: all .5s;
    }

    .slide-enter, .slide-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
        height: 0;
        transform: translateX(100px) scale(0.1) rotate(-15deg);
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
</style>