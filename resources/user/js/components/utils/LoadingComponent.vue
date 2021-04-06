<template>
    <div class="loading-component" :style="c_colorCss">
        <div class="lds-ring" :style="c_sizeCss">
            <div :style="{borderWidth: size/4 + 'px'}"></div>
            <div :style="{borderWidth: size/4 + 'px'}"></div>
            <div :style="{borderWidth: size/4 + 'px'}"></div>
            <div :style="{borderWidth: size/4 + 'px'}"></div>
        </div>
        <span class="loading-component__label"><slot class="asd"></slot></span>
    </div>
</template>

<script>
export default {
    name: "LoadingComponent",
    props: {
        size: {default: 32},
        color: null,
    },
    computed: {
        c_sizeCss() {
            return {
                width: this.size + 'px',
                height: this.size + 'px',
                borderWidth: this.size / 4 + 'px'
            }
        },
        c_colorCss() {
            let color = '#6580E2';
            switch (this.color) {
                case 'light':
                    color = '#ffffff';
                    break;
                case 'secondary':
                    color = '#50D5B7';
                    break;
            }

            return {color: color};
        }
    }
}
</script>

<style scoped lang="scss">
.loading-component {
    display: inline-flex;
    align-self: center;
}

.lds-ring {
    position: relative;
    width: 32px;
    height: 32px;
    vertical-align: top;
}

.lds-ring div {
    box-sizing: border-box;
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    border: 8px solid;
    border-radius: 50%;
    animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    border-color: currentColor transparent transparent transparent;
}

.lds-ring div:nth-child(1) {
    animation-delay: -0.45s;
}

.lds-ring div:nth-child(2) {
    animation-delay: -0.3s;
}

.lds-ring div:nth-child(3) {
    animation-delay: -0.15s;
}

@keyframes lds-ring {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.loading-component__label:not(:empty) {
    padding-left: 10px;
}
</style>
