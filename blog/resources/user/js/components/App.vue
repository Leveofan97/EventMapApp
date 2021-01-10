<template>
    <div>
        <map-content/>
        <navbar/>
        <sidebar/>
    </div>
</template>

<script>
    import navbar from "./navbar";
    import Sidebar from "./sidebar";
    import mapContent from "./map-content"
    import TheAuth from "./auth/TheAuth";
    export default {
        name: "App",
        components: {
            TheAuth,
            Sidebar,
            navbar,
            mapContent,
        },
    }
</script>

<style scoped>

</style>
