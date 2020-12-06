<template>
    
                    <div class="map">
                        <l-map
                            style="height: 100%; width: 100%"
                            :zoom="zoom"
                            :center="center"
                            @update:zoom="zoomUpdated"
                            @update:center="centerUpdated"
                        >
                        <l-marker :lat-lng="markerLatLng" > <l-popup>Тут что-то происходит</l-popup> </l-marker>
                        
                        <l-tile-layer :url="url"></l-tile-layer>
                        </l-map>
                    </div>
                
</template>

<script>
    import {LMap, LTileLayer, LMarker, LPopup} from 'vue2-leaflet';
    export default
    {
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
        },
        data () {
                return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                zoom: 15,
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
        /* top: 5%; */
        /* bottom: 0; */
        width: 100%;
        height: 89.6%;
    }
</style>