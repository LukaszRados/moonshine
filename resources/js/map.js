class Map {
    constructor ({ points, videos }) {
        this.$el = document.querySelector('.js-map')
        this.points = points
        this.videos = videos
        this.infoWindows = []
        this.markers = []
        this.map = null

        this.onZoomChanged = this.onZoomChanged.bind(this)
        this.init()
    }

    init () {
        this.map = new google.maps.Map(this.$el, {
            zoom: 5, 
            center: this.points[0],
        })

        this.putAllMarkers()
        google.maps.event.addListener(this.map, 'zoom_changed', this.onZoomChanged)
        this.onZoomChanged()
        this.drawRoute()
    }

    generateInfoWindow (point) {
        return new google.maps.InfoWindow({
            content: `<div class='map__info'>
                <h4>${point.options.title}</h4>
                <p>${point.options.text}</p>
            </div>`
        })
    }

    attachEventToMarker (marker, infoWindow) {
        marker.addListener('click', () => {
            this.infoWindows.forEach(info => info.close())
            infoWindow.open(this.map, marker)
        })
        this.infoWindows.push(infoWindow)
    }

    putMarker ({ position, icon, options, type }) {
        const marker = new google.maps.Marker({
            position,
            map: this.map,
            icon,
        })
        if (!position.options) {
            position.options = options
        }
        const infoWindow = this.generateInfoWindow(position)
        this.infoWindows.push(infoWindow)
        this.attachEventToMarker(marker, infoWindow)
        this.markers.push({
            marker,
            type
        })
    }

    putAllMarkers () {
        this.putMarker({
            position: this.points[this.points.length - 1], 
            icon: {
                url: this.$el.dataset.marker,
                size: new google.maps.Size(36, 36),
                anchor: new google.maps.Point(18, 18),
                scaledSize: new google.maps.Size(36, 36),
            }, 
            options: {
                title: this.$el.dataset.currentLocationPlace,
                text: this.$el.dataset.currentLocationDate,
            },
            type: 'current-position'
        })

        this.points.slice(0, -1).filter(point => !!point.location_pl).forEach(point => {
            this.putMarker({
                position: point, 
                icon: {
                    url: this.$el.dataset.markerSmall,
                    size: new google.maps.Size(16, 16),
                    anchor: new google.maps.Point(8, 8),
                    scaledSize: new google.maps.Size(16, 16),
                }, 
                options: {
                    title: point.location,
                    text: point.date_formatted,
                },
                type: 'stop-position'
            })
        })

        this.videos.forEach(video => {
            this.putMarker({
                position: {
                    lat: video.lat,
                    lng: video.lng,
                },
                icon: {
                    url: this.$el.dataset.markerVideo,
                    size: new google.maps.Size(16, 16),
                    anchor: new google.maps.Point(8, 8),
                    scaledSize: new google.maps.Size(16, 16),
                },
                options: {
                    title: video.title_pl,
                    text: `<a href='${video.url}'>${this.$el.dataset.videoText}</a>`
                },
                type: 'video-position'
            })
        })
    }

    onZoomChanged () {
        const zoom = this.map.getZoom()
        this.markers
            .filter(marker => marker.type === 'stop-position')
            .forEach(marker => {
                marker.marker.setVisible(zoom >= 6)
            })
    }

    drawRoute () {
        return new google.maps.Polyline({
            path: this.points,
            geodesic: true,
            strokeColor: '#1E3799',
            strokeOpacity: 1.0,
            strokeWeight: 2
        }).setMap(this.map)
    }
}

window.initMap = () => {
    const map = new Map({
        points: window.points,
        videos: window.videos
    })
}
