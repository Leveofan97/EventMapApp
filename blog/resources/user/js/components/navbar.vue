<template>
    <mdb-navbar color="indigo" dark>
        <mdb-navbar-brand href="https://mdbootstrap.com/">
            EventMap
        </mdb-navbar-brand>
        <mdb-navbar-toggler>
            <mdb-navbar-nav>
                <mdb-nav-item href="#">Мои мероприятия</mdb-nav-item>
                <mdb-nav-item href="#">Мои встречи</mdb-nav-item>
                <mdb-nav-item href="#">Список встреч</mdb-nav-item>
            </mdb-navbar-nav>

            <mdb-navbar-nav right v-if="$store.state.auth.id != null">
                <mdb-nav-item>{{$store.state.auth.firstName}} {{$store.state.auth.lastName}}</mdb-nav-item>
            </mdb-navbar-nav>
            <mdb-navbar-nav right v-else>
                <mdb-nav-item @click="regReq">Регистрация</mdb-nav-item>
                <mdb-nav-item @click="authReq">Вход</mdb-nav-item>
            </mdb-navbar-nav>
        </mdb-navbar-toggler>
    </mdb-navbar>
</template>
<style>

.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 3rem;
    padding-left: 3rem;

}
.indigo{
    background-color: #343A48 !important;
}
.navbar{
    font-family: Trebuchet MS;
    padding-left: 2.5em;
    padding: .2rem 1rem;
    font-size: 1em !important;
    padding-left: 2.5em;
}
</style>

<script>

import { mdbNavbar, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem, mdbDropdown, mdbDropdownMenu, mdbDropdownToggle, mdbInput, mdbDropdownItem } from 'mdbvue';
export default {
    name: 'NavbarPage',
    components: {
        mdbNavbar,
        mdbNavbarBrand,
        mdbNavbarToggler,
        mdbNavbarNav,
        mdbNavItem,
        mdbDropdown,
        mdbDropdownMenu,
        mdbDropdownToggle,
        mdbDropdownItem,
        mdbInput
    },
    methods: {
        authReq () {
            this.$store.commit('authReq')
            //this.$router.push({name: "/login"});
        },
        regReq () {
            this.$store.commit('regReq')
        }
    },
}
</script>



