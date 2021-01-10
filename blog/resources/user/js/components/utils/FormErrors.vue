<template>
    <div class="error">
        <div class="error__title">{{error.data.message}}</div>
        <ul class="error__list"
            v-for="(errors, key) in c_errors">
            <li v-for="error in errors">{{error}}</li>
        </ul>
    </div>
</template>

<script>

    export default {
        name: "FormErrors",
        components: {},
        props: ['error'],
        computed: {
            c_errors() {
                return this.error.data.errors;
            }
        }
    }
</script>

<style scoped lang="scss">
    .error {
        background: #fefefe;
        border-radius: 5px;
        color: black;
    }

    .error__title {
        color: red;
        font-weight: 600;
    }

    .error__list {
        margin-bottom: 0;

        li {
            margin-bottom: 0;
        }
    }
</style>
