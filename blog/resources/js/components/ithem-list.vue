<template>
	<mdb-card class="mycard">
		<mdb-view hover>
			<a href="#!">
				<mdb-card-image
					src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%282%29.jpg"
					alt="Card image cap"/>
				<mdb-mask flex-center waves overlay="white-slight"></mdb-mask>
			</a>
		</mdb-view>
		<mdb-card-body>
			<mdb-card-title>Карточка мероприятия</mdb-card-title>
			<mdb-card-text>Приглашаем всех желающих провести время на свежем воздухе и поиграть в шахматы.</mdb-card-text>
			<mdb-btn color="primary">Показать на карте</mdb-btn>
		</mdb-card-body>
	</mdb-card>
</template>

<script>
	import { mdbCard, mdbCardImage, mdbCardBody, mdbCardTitle, mdbCardText, mdbBtn, mdbView, mdbMask } from 'mdbvue';
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

<style>
.mycard{
    margin-bottom: 15px;
}
</style>