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

    points.slice(0, -1).filter(point => !!point.options).forEach(point => {
        const pointMarker = new google.maps.Marker({
            position: {
                lat: point.lat,
                lng: point.lng,
            },
            map: map,
            icon: {
                url: mapDomElement.dataset.markerSmall,
                size: new google.maps.Size(24, 24),
                anchor: new google.maps.Point(12, 12),
                scaledSize: new google.maps.Size(24, 24),
            }
        })
        const pointWindow = generateInfoWindow(point)
        attachEventToMarker(map, pointMarker, pointWindow)
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