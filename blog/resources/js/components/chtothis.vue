<template>
    <mdb-container>
        <div class="sidebar_map">
            <headside></headside>
            <sidesearch></sidesearch>

            <div class="container-ul-class">
                <ul class="cards-event">
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                    <li><ithem-list></ithem-list></li>
                </ul>
            </div>

        </div>
        <v-footer></v-footer>
    </mdb-container>
</template>

<style>

.sidebar_map{
    position: fixed;
    background: #F7ECE8;
    height: calc(100% - 45px);
    width: 18.2em;
    overflow: auto;
}
.cards-event{
    list-style-type: none;
    padding: 0;
    margin-left: 1em;
}
</style>

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
