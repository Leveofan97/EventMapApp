<template>
    <mdb-card class="mycard">
        <mdb-card-body>
            <mdb-card-title class="title-card"><b>Благотворительная акция</b></mdb-card-title>
            <mdb-card-text class="text-card">
                <p class="mdb-card-text-item"><b>Категория:</b> Животные</p>
                <p class="mdb-card-text-item item-date"><b>Дата:</b> дд.мм.гг</p>
                <p class="mdb-card-text-item item-date"><b>Время:</b> чч:мм</p>
                <p class="mdb-card-text-item"><b>Адрес:</b> г.Сургут, ул.Пушкина д.1</p>
            </mdb-card-text>

            <mdb-btn class="btn-lmap main"><p class="text-btn">Показать на карте</p></mdb-btn>
            <mdb-btn class="btn-lmap moreinfo">
                <img class="image-card" src="https://www.flaticon.com/svg/static/icons/svg/3601/3601163.svg">
            </mdb-btn>
        </mdb-card-body>
    </mdb-card>
</template>

<style>
.mycard {
    font-family: Trebuchet MS;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.25), 0 10px 15px rgba(0, 0, 0, 0.22);
    margin-bottom: 1.2em;
    width: 15em;
}
.mycard:hover {
    transform: translateX(15px);
    -webkit-transition: all 1s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.title-card {
    font-size: 0.89em;
    text-align: center;
    color: #000000;
}
.text-card {
    font-size: 0.75em !important;
    text-indent: 1em;
    margin-bottom: 5px;
}
.text-card card-text {
    margin-bottom: 10em !important;
}
.mdb-card-text-item {
    margin-bottom: 1px;
}
.item-date {
    display: inline-block;
}
.mdb-card-text-item, .item-date {
    margin-bottom: 0.1em;
}
.btn {
    border-radius: .4rem;
    padding: .5rem;
}
.btn-lmap { /*кнопка*/
    background-color: #9CA376 !important;
    height: 2.5em;
    margin-top: 0;
    margin-bottom: 0;
    font-size: 0.7em;
    padding-top: 0.5em;
    text-transform: none;
    float: right;
}
.main {
    margin-left: 2px;
}
.moreinfo {
    padding-left: 2px;
    padding-right: 2px;
    margin-right: 2px;
}

.image-card {
    width: 23px;
    height: 15px;
}
.card {
    border-radius: 0.4rem;
}
.card-body {
    padding-top: 13px;
    padding-left: 5px;
    padding-bottom: 10px;
    padding-right: 5px;
}
.card .card-body .card-text {
    color: black;
}
</style>

<script>
import {mdbCard, mdbCardImage, mdbCardBody, mdbCardTitle, mdbCardText, mdbBtn, mdbView, mdbMask} from 'mdbvue';
export default {
    name: 'CardPage',
    components: {
        mdbCard,
        mdbCardImage,
        mdbCardBody,
        mdbCardTitle,
        mdbCardText,
        mdbBtn,
        mdbView,
        mdbMask
    }
}
</script>

