/**
 * Minified by jsDelivr using Terser v5.3.5.
 * Original file: /npm/leaflet.locatecontrol@0.73.0/src/L.Control.Locate.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
/*!
Copyright (c) 2016 Dominik Moritz

This file is part of the leaflet locate control. It is licensed under the MIT license.
You can find the project at: https://github.com/domoritz/leaflet-locatecontrol
*/
! function (t, i) {
    "function" == typeof define && define.amd ? define(["leaflet"], t) : "object" == typeof exports && (void 0 !== i && i.L ? module.exports = t(L) : module.exports = t(require("leaflet"))), void 0 !== i && i.L && (i.L.Control.Locate = t(L))
}((function (t) {
    var i = function (i, o, s) {
            (s = s.split(" ")).forEach((function (s) {
                t.DomUtil[i].call(this, o, s)
            }))
        },
        o = function (t, o) {
            i("addClass", t, o)
        },
        s = function (t, o) {
            i("removeClass", t, o)
        },
        e = t.Marker.extend({
            initialize: function (i, o) {
                t.Util.setOptions(this, o), this._latlng = i, this.createIcon()
            },
            createIcon: function () {
                var i = this.options,
                    o = "";
                void 0 !== i.color && (o += "stroke:" + i.color + ";"), void 0 !== i.weight && (o += "stroke-width:" + i.weight + ";"), void 0 !== i.fillColor && (o += "fill:" + i.fillColor + ";"), void 0 !== i.fillOpacity && (o += "fill-opacity:" + i.fillOpacity + ";"), void 0 !== i.opacity && (o += "opacity:" + i.opacity + ";");
                var s = this._getIconSVG(i, o);
                this._locationIcon = t.divIcon({
                    className: s.className,
                    html: s.svg,
                    iconSize: [s.w, s.h]
                }), this.setIcon(this._locationIcon)
            },
            _getIconSVG: function (t, i) {
                var o = t.radius,
                    s = o + t.weight,
                    e = 2 * s;
                return {
                    className: "leaflet-control-locate-location",
                    svg: '<svg xmlns="http://www.w3.org/2000/svg" width="' + e + '" height="' + e + '" version="1.1" viewBox="-' + s + " -" + s + " " + e + " " + e + '"><circle r="' + o + '" style="' + i + '" /></svg>',
                    w: e,
                    h: e
                }
            },
            setStyle: function (i) {
                t.Util.setOptions(this, i), this.createIcon()
            }
        }),
        n = e.extend({
            initialize: function (i, o, s) {
                t.Util.setOptions(this, s), this._latlng = i, this._heading = o, this.createIcon()
            },
            setHeading: function (t) {
                this._heading = t
            },
            _getIconSVG: function (t, i) {
                var o = t.radius,
                    s = t.width + t.weight,
                    e = 2 * (o + t.depth + t.weight),
                    n = "M0,0 l" + t.width / 2 + "," + t.depth + " l-" + s + ",0 z";
                return {
                    className: "leaflet-control-locate-heading",
                    svg: '<svg xmlns="http://www.w3.org/2000/svg" width="' + s + '" height="' + e + '" version="1.1" viewBox="-' + s / 2 + " 0 " + s + " " + e + '" style="' + ("transform: rotate(" + this._heading + "deg)") + '"><path d="' + n + '" style="' + i + '" /></svg>',
                    w: s,
                    h: e
                }
            }
        }),
        a = t.Control.extend({
            options: {
                position: "topleft",
                layer: void 0,
                setView: "untilPanOrZoom",
                keepCurrentZoomLevel: !1,
                initialZoomLevel: !1,
                getLocationBounds: function (t) {
                    return t.bounds
                },
                flyTo: !1,
                clickBehavior: {
                    inView: "stop",
                    outOfView: "setView",
                    inViewNotFollowing: "inView"
                },
                returnToPrevBounds: !1,
                cacheLocation: !0,
                drawCircle: !0,
                drawMarker: !0,
                showCompass: !0,
                markerClass: e,
                compassClass: n,
                circleStyle: {
                    className: "leaflet-control-locate-circle",
                    color: "#136AEC",
                    fillColor: "#136AEC",
                    fillOpacity: .15,
                    weight: 0
                },
                markerStyle: {
                    className: "leaflet-control-locate-marker",
                    color: "#fff",
                    fillColor: "#2A93EE",
                    fillOpacity: 1,
                    weight: 3,
                    opacity: 1,
                    radius: 9
                },
                compassStyle: {
                    fillColor: "#2A93EE",
                    fillOpacity: 1,
                    weight: 0,
                    color: "#fff",
                    opacity: 1,
                    radius: 9,
                    width: 9,
                    depth: 6
                },
                followCircleStyle: {},
                followMarkerStyle: {},
                followCompassStyle: {},
                icon: "fa fa-map-marker",
                iconLoading: "fa fa-spinner fa-spin",
                iconElementTag: "span",
                circlePadding: [0, 0],
                metric: !0,
                createButtonCallback: function (i, o) {
                    var s = t.DomUtil.create("a", "leaflet-bar-part leaflet-bar-part-single", i);
                    return s.title = o.strings.title, s.role = "button", s.href = "#", {
                        link: s,
                        icon: t.DomUtil.create(o.iconElementTag, o.icon, s)
                    }
                },
                onLocationError: function (t, i) {
                    alert(t.message)
                },
                onLocationOutsideMapBounds: function (t) {
                    t.stop(), alert(t.options.strings.outsideMapBoundsMsg)
                },
                showPopup: !0,
                strings: {
                    title: "Show me where I am",
                    metersUnit: "meters",
                    feetUnit: "feet",
                    popup: "You are within {distance} {unit} from this point",
                    outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
                },
                locateOptions: {
                    maxZoom: 1 / 0,
                    watch: !0,
                    setView: !1
                }
            },
            initialize: function (i) {
                for (var o in i) "object" == typeof this.options[o] ? t.extend(this.options[o], i[o]) : this.options[o] = i[o];
                this.options.followMarkerStyle = t.extend({}, this.options.markerStyle, this.options.followMarkerStyle), this.options.followCircleStyle = t.extend({}, this.options.circleStyle, this.options.followCircleStyle), this.options.followCompassStyle = t.extend({}, this.options.compassStyle, this.options.followCompassStyle)
            },
            onAdd: function (i) {
                var o = t.DomUtil.create("div", "leaflet-control-locate leaflet-bar leaflet-control");
                this._container = o, this._map = i, this._layer = this.options.layer || new t.LayerGroup, this._layer.addTo(i), this._event = void 0, this._compassHeading = null, this._prevBounds = null;
                var s = this.options.createButtonCallback(o, this.options);
                return this._link = s.link, this._icon = s.icon, t.DomEvent.on(this._link, "click", (function (i) {
                    t.DomEvent.stopPropagation(i), t.DomEvent.preventDefault(i), this._onClick()
                }), this).on(this._link, "dblclick", t.DomEvent.stopPropagation), this._resetVariables(), this._map.on("unload", this._unload, this), o
            },
            _onClick: function () {
                this._justClicked = !0;
                var t = this._isFollowing();
                if (this._userPanned = !1, this._userZoomed = !1, this._active && !this._event) this.stop();
                else if (this._active) {
                    var i = this.options.clickBehavior,
                        o = i.outOfView;
                    switch (this._map.getBounds().contains(this._event.latlng) && (o = t ? i.inView : i.inViewNotFollowing), i[o] && (o = i[o]), o) {
                        case "setView":
                            this.setView();
                            break;
                        case "stop":
                            if (this.stop(), this.options.returnToPrevBounds)(this.options.flyTo ? this._map.flyToBounds : this._map.fitBounds).bind(this._map)(this._prevBounds)
                    }
                } else this.options.returnToPrevBounds && (this._prevBounds = this._map.getBounds()), this.start();
                this._updateContainerStyle()
            },
            start: function () {
                this._activate(), this._event && (this._drawMarker(this._map), this.options.setView && this.setView()), this._updateContainerStyle()
            },
            stop: function () {
                this._deactivate(), this._cleanClasses(), this._resetVariables(), this._removeMarker()
            },
            stopFollowing: function () {
                this._userPanned = !0, this._updateContainerStyle(), this._drawMarker()
            },
            _activate: function () {
                if (!this._active && (this._map.locate(this.options.locateOptions), this._map.fire("locateactivate", this), this._active = !0, this._map.on("locationfound", this._onLocationFound, this), this._map.on("locationerror", this._onLocationError, this), this._map.on("dragstart", this._onDrag, this), this._map.on("zoomstart", this._onZoom, this), this._map.on("zoomend", this._onZoomEnd, this), this.options.showCompass)) {
                    var i = "ondeviceorientationabsolute" in window;
                    if (i || "ondeviceorientation" in window) {
                        var o = this,
                            s = function () {
                                t.DomEvent.on(window, i ? "deviceorientationabsolute" : "deviceorientation", o._onDeviceOrientation, o)
                            };
                        DeviceOrientationEvent && "function" == typeof DeviceOrientationEvent.requestPermission ? DeviceOrientationEvent.requestPermission().then((function (t) {
                            "granted" === t && s()
                        })) : s()
                    }
                }
            },
            _deactivate: function () {
                this._map.stopLocate(), this._map.fire("locatedeactivate", this), this._active = !1, this.options.cacheLocation || (this._event = void 0), this._map.off("locationfound", this._onLocationFound, this), this._map.off("locationerror", this._onLocationError, this), this._map.off("dragstart", this._onDrag, this), this._map.off("zoomstart", this._onZoom, this), this._map.off("zoomend", this._onZoomEnd, this), this.options.showCompass && (this._compassHeading = null, "ondeviceorientationabsolute" in window ? t.DomEvent.off(window, "deviceorientationabsolute", this._onDeviceOrientation, this) : "ondeviceorientation" in window && t.DomEvent.off(window, "deviceorientation", this._onDeviceOrientation, this))
            },
            setView: function () {
                if (this._drawMarker(), this._isOutsideMapBounds()) this._event = void 0, this.options.onLocationOutsideMapBounds(this);
                else if (this._justClicked && !1 !== this.options.initialZoomLevel)(i = this.options.flyTo ? this._map.flyTo : this._map.setView).bind(this._map)([this._event.latitude, this._event.longitude], this.options.initialZoomLevel);
                else if (this.options.keepCurrentZoomLevel) {
                    (i = this.options.flyTo ? this._map.flyTo : this._map.panTo).bind(this._map)([this._event.latitude, this._event.longitude])
                } else {
                    var i = this.options.flyTo ? this._map.flyToBounds : this._map.fitBounds;
                    this._ignoreEvent = !0, i.bind(this._map)(this.options.getLocationBounds(this._event), {
                        padding: this.options.circlePadding,
                        maxZoom: this.options.locateOptions.maxZoom
                    }), t.Util.requestAnimFrame((function () {
                        this._ignoreEvent = !1
                    }), this)
                }
            },
            _drawCompass: function () {
                if (this._event) {
                    var t = this._event.latlng;
                    if (this.options.showCompass && t && null !== this._compassHeading) {
                        var i = this._isFollowing() ? this.options.followCompassStyle : this.options.compassStyle;
                        this._compass ? (this._compass.setLatLng(t), this._compass.setHeading(this._compassHeading), this._compass.setStyle && this._compass.setStyle(i)) : this._compass = new this.options.compassClass(t, this._compassHeading, i).addTo(this._layer)
                    }!this._compass || this.options.showCompass && null !== this._compassHeading || (this._compass.removeFrom(this._layer), this._compass = null)
                }
            },
            _drawMarker: function () {
                void 0 === this._event.accuracy && (this._event.accuracy = 0);
                var i, o, s = this._event.accuracy,
                    e = this._event.latlng;
                if (this.options.drawCircle) {
                    var n = this._isFollowing() ? this.options.followCircleStyle : this.options.circleStyle;
                    this._circle ? this._circle.setLatLng(e).setRadius(s).setStyle(n) : this._circle = t.circle(e, s, n).addTo(this._layer)
                }
                if (this.options.metric ? (i = s.toFixed(0), o = this.options.strings.metersUnit) : (i = (3.2808399 * s).toFixed(0), o = this.options.strings.feetUnit), this.options.drawMarker) {
                    var a = this._isFollowing() ? this.options.followMarkerStyle : this.options.markerStyle;
                    this._marker ? (this._marker.setLatLng(e), this._marker.setStyle && this._marker.setStyle(a)) : this._marker = new this.options.markerClass(e, a).addTo(this._layer)
                }
                this._drawCompass();
                var h = this.options.strings.popup;

                function r() {
                    return "string" == typeof h ? t.Util.template(h, {
                        distance: i,
                        unit: o
                    }) : "function" == typeof h ? h({
                        distance: i,
                        unit: o
                    }) : h
                }
                this.options.showPopup && h && this._marker && this._marker.bindPopup(r())._popup.setLatLng(e), this.options.showPopup && h && this._compass && this._compass.bindPopup(r())._popup.setLatLng(e)
            },
            _removeMarker: function () {
                this._layer.clearLayers(), this._marker = void 0, this._circle = void 0
            },
            _unload: function () {
                this.stop(), this._map.off("unload", this._unload, this)
            },
            _setCompassHeading: function (i) {
                !isNaN(parseFloat(i)) && isFinite(i) ? (i = Math.round(i), this._compassHeading = i, t.Util.requestAnimFrame(this._drawCompass, this)) : this._compassHeading = null
            },
            _onCompassNeedsCalibration: function () {
                this._setCompassHeading()
            },
            _onDeviceOrientation: function (t) {
                this._active && (t.webkitCompassHeading ? this._setCompassHeading(t.webkitCompassHeading) : t.absolute && t.alpha && this._setCompassHeading(360 - t.alpha))
            },
            _onLocationError: function (t) {
                3 == t.code && this.options.locateOptions.watch || (this.stop(), this.options.onLocationError(t, this))
            },
            _onLocationFound: function (t) {
                if ((!this._event || this._event.latlng.lat !== t.latlng.lat || this._event.latlng.lng !== t.latlng.lng || this._event.accuracy !== t.accuracy) && this._active) {
                    switch (this._event = t, this._drawMarker(), this._updateContainerStyle(), this.options.setView) {
                        case "once":
                            this._justClicked && this.setView();
                            break;
                        case "untilPan":
                            this._userPanned || this.setView();
                            break;
                        case "untilPanOrZoom":
                            this._userPanned || this._userZoomed || this.setView();
                            break;
                        case "always":
                            this.setView()
                    }
                    this._justClicked = !1
                }
            },
            _onDrag: function () {
                this._event && !this._ignoreEvent && (this._userPanned = !0, this._updateContainerStyle(), this._drawMarker())
            },
            _onZoom: function () {
                this._event && !this._ignoreEvent && (this._userZoomed = !0, this._updateContainerStyle(), this._drawMarker())
            },
            _onZoomEnd: function () {
                this._event && this._drawCompass(), this._event && !this._ignoreEvent && this._marker && !this._map.getBounds().pad(-.3).contains(this._marker.getLatLng()) && (this._userPanned = !0, this._updateContainerStyle(), this._drawMarker())
            },
            _isFollowing: function () {
                return !!this._active && ("always" === this.options.setView || ("untilPan" === this.options.setView ? !this._userPanned : "untilPanOrZoom" === this.options.setView ? !this._userPanned && !this._userZoomed : void 0))
            },
            _isOutsideMapBounds: function () {
                return void 0 !== this._event && (this._map.options.maxBounds && !this._map.options.maxBounds.contains(this._event.latlng))
            },
            _updateContainerStyle: function () {
                this._container && (this._active && !this._event ? this._setClasses("requesting") : this._isFollowing() ? this._setClasses("following") : this._active ? this._setClasses("active") : this._cleanClasses())
            },
            _setClasses: function (t) {
                "requesting" == t ? (s(this._container, "active following"), o(this._container, "requesting"), s(this._icon, this.options.icon), o(this._icon, this.options.iconLoading)) : "active" == t ? (s(this._container, "requesting following"), o(this._container, "active"), s(this._icon, this.options.iconLoading), o(this._icon, this.options.icon)) : "following" == t && (s(this._container, "requesting"), o(this._container, "active following"), s(this._icon, this.options.iconLoading), o(this._icon, this.options.icon))
            },
            _cleanClasses: function () {
                t.DomUtil.removeClass(this._container, "requesting"), t.DomUtil.removeClass(this._container, "active"), t.DomUtil.removeClass(this._container, "following"), s(this._icon, this.options.iconLoading), o(this._icon, this.options.icon)
            },
            _resetVariables: function () {
                this._active = !1, this._justClicked = !1, this._userPanned = !1, this._userZoomed = !1
            }
        });
    return t.control.locate = function (i) {
        return new t.Control.Locate(i)
    }, a
}), window);
//# sourceMappingURL=/sm/a478daf47cd8df5cc7bd6227e857b8ad1d4cb7885bca91c70057234733d690f4.map
