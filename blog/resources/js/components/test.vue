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

            <mdb-navbar-nav right>
                <mdb-nav-item href="#">Регистрация</mdb-nav-item>
                <mdb-nav-item href="#">Вход</mdb-nav-item>
            </mdb-navbar-nav>
        </mdb-navbar-toggler>
    </mdb-navbar>

</template>
<style>
/** {box-sizing: border-box;}

body {
    margin: 0;
}*/
.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 2rem;
    padding-left: 2rem;

}
.indigo{
background-color: #343A48 !important;
}
.navbar{
    padding-left: 2.5em;
}
mdb-navbar{
    overflow: hidden;
    color: #343A48 !important;
}
/*
.topnav a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 13px 40px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #414757;

}

.topnav a.active {
    background-color:#343A48;
    font-size: 24px;
    padding-bottom: 0px;
    padding-top: 7px;
    font-family: 'Reem Kufi', sans-serif;
}

.topnav .search-container {
    float: right;
}
*/

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
    }
}
</script>