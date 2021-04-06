<template>
    <div class="map">
        <!--<router-view/>-->
        <TheAuth v-if="$store.state.authShow"/>
        <RegForm v-if="$store.state.regShow"/>
        <l-map
                style="height: 100%; width: 100%; z-index:-1"
                :zoom="zoom"
                :center="center"
                @update:zoom="zoomUpdated"
                @update:center="centerUpdated">
            <!--
            <l-marker :lat-lng="markerLatLng" >
                <l-popup>Тут что-то происходит</l-popup>
            </l-marker>-->
            <l-marker :lat-lng="markerLatLng">
                <l-popup>
                    <mdb-card>
                        <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap"></mdb-card-image>
                        <mdb-card-body>
                            <mdb-card-title>Basic card</mdb-card-title>
                            <mdb-card-text>Some quick example text to build on the card title and make up the bulk of the card's content.</mdb-card-text>
                            <mdb-btn color="primary">Button</mdb-btn>
                        </mdb-card-body>
                    </mdb-card>
                </l-popup>
            </l-marker>
            <l-control-zoom position="bottomright"></l-control-zoom>
            <l-tile-layer :url="url"></l-tile-layer>
        </l-map>
    </div>
</template>

<script>
    import {LMap, LTileLayer, LMarker, LPopup, LControlZoom} from 'vue2-leaflet';
    import { mdbCard, mdbCardImage, mdbCardBody, mdbCardTitle, mdbCardText, mdbBtn } from 'mdbvue';
    export default
    {
        name: "mapContent",
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LControlZoom,
            mdbCard,
            mdbCardImage,
            mdbCardBody,
            mdbCardTitle,
            mdbCardText,
            mdbBtn
        },
        data () {
                return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                zoom: 14,
                center: [61.243782, 73.421757],
                markerLatLng: [61.243782, 73.421757],
                bounds: null
            };
        },
        methods: {
            zoomUpdated (zoom) {
            this.zoom = zoom;
            },
            centerUpdated (center) {
            this.center = center;
            },
            //boundsUpdated (bounds) {
            //this.bounds = bounds;
            //}
        }
    }
</script>

<style scoped>
    .map
    {
        position: fixed;
        width: 100%;
        height: 100%;
    }
</style>
