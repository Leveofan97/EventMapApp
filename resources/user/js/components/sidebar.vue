<template>
    <div>
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
    </div>
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
import { mdbIcon, mdbFormInline, mdbInput, mdbContainer, mdbRow, mdbCol } from 'mdbvue';
import Headside from "./headside";
import sidesearch from "./sidesearch";
export default {
    name: "Sidebar",
    components: {
        Headside,
        sidesearch,
        mdbIcon,
        mdbFormInline,
        mdbInput,
        mdbContainer,
        mdbRow,
        mdbCol
    }
}
</script>
