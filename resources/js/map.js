const mapDomElement = document.querySelector('.js-map')
const points = window.points
const currentPosition = points[points.length - 1]
const infoWindows = []

const generateInfoWindow = point => {
    return new google.maps.InfoWindow({
        content: `<div class='map__info'>
            <h4>${point.options.title}</h4>
            <p>${point.options.text}</p>
        </div>`
    })
}

const attachEventToMarker = (map, marker, infoWindow) => {
    marker.addListener('click', () => {
        infoWindows.forEach(info => info.close())
        infoWindow.open(map, marker)
    })
    infoWindows.push(infoWindow)
}

const initMap = () => {

    /* Initialise map */
    
    const map = new google.maps.Map(mapDomElement, {
        zoom: 7, 
        center: currentPosition,
    })

    /* Put marker on current position */

    const marker = new google.maps.Marker({
        position: currentPosition,
        map: map,
        icon: {
            url: mapDomElement.dataset.marker,
            size: new google.maps.Size(36, 36),
            anchor: new google.maps.Point(18, 18),
            scaledSize: new google.maps.Size(36, 36),
        }
    })
    if (!currentPosition.options) {
        currentPosition.options = {
            title: mapDomElement.dataset.currentLocationPlace,
            text: mapDomElement.dataset.currentLocationDate,
        }
    }
    const infoWindow = generateInfoWindow(currentPosition)
    attachEventToMarker(map, marker, infoWindow)
    

    /* Put markers for points with events */

    const smallMarkers = []

    points.slice(0, -1).filter(point => !!point.location_pl).forEach(point => {
        const pointMarker = new google.maps.Marker({
            position: {
                lat: point.lat,
                lng: point.lng,
            },
            map: map,
            icon: {
                url: mapDomElement.dataset.markerSmall,
                size: new google.maps.Size(16, 16),
                anchor: new google.maps.Point(8, 8),
                scaledSize: new google.maps.Size(16, 16),
            }
        })
        point.options = {
            title: point.location,
            text: point.date_formatted,
        }
        smallMarkers.push(pointMarker)
        const pointWindow = generateInfoWindow(point)
        attachEventToMarker(map, pointMarker, pointWindow)
    })

    /* Hide small markers if user zooms out */

    google.maps.event.addListener(map, 'zoom_changed', () => {
        const zoom = map.getZoom()
        smallMarkers.forEach(marker => {
            marker.setVisible(zoom >= 6)
        })
    })

    /* Draw line for our route */

    const route = new google.maps.Polyline({
        path: points,
        geodesic: true,
        strokeColor: '#1E3799',
        strokeOpacity: 1.0,
        strokeWeight: 2
    }).setMap(map)
    
}

window.initMap = initMap