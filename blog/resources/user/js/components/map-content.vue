<template>
    <div class="map">
        <TheAuth v-if="$store.state.authShow"/>
        <l-map
                style="height: 100%; width: 100%; z-index:-1"
                :zoom="zoom"
                :center="center"
                @update:zoom="zoomUpdated"
                @update:center="centerUpdated">
            <l-marker :lat-lng="markerLatLng" > <l-popup>Тут что-то происходит</l-popup> </l-marker>
            <l-control-zoom position="bottomright"  ></l-control-zoom>
            <l-tile-layer :url="url"></l-tile-layer>
        </l-map>
    </div>
</template>

<script>
    import {LMap, LTileLayer, LMarker, LPopup, LControlZoom} from 'vue2-leaflet';
    export default
    {
        name: "mapContent",
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LControlZoom
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
