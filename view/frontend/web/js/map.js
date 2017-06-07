/** 
 * Magento2 plugin for Google Map load
 * Author: Silpion Tomasz Gregorczyk
 * Version: 1.0.0 (2017/05/14)
 * Released under the OSL
 */

define([
    'LCB_GoogleMap/js/async!https://maps.googleapis.com/maps/api/js?key=' + apiKey + '&callback=initMap'
], function ($) {

    var Map = {
        render: function (element, x, y, zoom, image) {
            map = new google.maps.Map(element, {
                zoom: zoom,
                center: {lat: x, lng: y}
            });
            if (image) {
                new google.maps.Marker({
                    position: {lat: x, lng: y},
                    map: map,
                    icon: image
                });
            }
        }
    };

    return Map;

});