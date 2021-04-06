<template>
    <mdb-form-inline class="md-form">
        <mdb-input type="text" placeholder="Поиск" aria-label="Search">
            <a href="">
                <img src="https://www.flaticon.com/svg/static/icons/svg/54/54481.svg"
                     style="width: 20px;height: 20px;margin-left: 0.5em">
            </a>
        </mdb-input>
    </mdb-form-inline>
</template>

<script>
import { mdbIcon, mdbFormInline, mdbInput } from 'mdbvue';
import Headside from "./headside";
export default {
    components: {
        Headside,
        mdbIcon,
        mdbFormInline,
        mdbInput
    }
}
</script>

<style>
.md-form{
    margin-top: 0;
    margin-left:1em;
    margin-bottom: 0.3em;
}
input{
    background: red;
}
</style>
