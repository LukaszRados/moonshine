import throttle from './throttle'

let photos = []
let windowHeight = window.innerHeight
const THRESHOLD = 1000

const collectPhotos = () => {
    const elements = document.querySelectorAll('.js-lazy-photo')
    for (let i = 0; i < elements.length; ++i) {
        const element = elements[i]
        const src = element.dataset.src
        if (!src) continue

        photos.push({
            el: element,
            src: src,
            top: 0,
            loaded: false,
        })
    }
}

const updatePhotosPositions = () => {
    const windowScrollY = window.scrollY
    photos.forEach((photo) => {
        const rect = photo.el.getBoundingClientRect()
        photo.top = parseInt(rect.top + windowScrollY)
    })
}

const onScroll = () => {
    const windowScrollY = window.scrollY
    const windowBottom = windowScrollY + windowHeight

    photos.forEach((photo) => {
        if (windowBottom + THRESHOLD > photo.top) {
            const image = new Image()
            image.addEventListener('load', () => {
                photo.el.src = photo.src
            })
            image.src = photo.src
            photo.loaded = true
        }
    })

    photos = photos.filter((photo) => {
        return !photo.loaded
    })

    if (photos.length === 0) {
        removeEventListeners()
    }
}

const onResize = () => {
    windowHeight = window.innerHeight
    updatePhotosPositions()
}

const removeEventListeners = () => {
    window.removeEventListener('scroll', throttle(onScroll, 200), false)
    window.removeEventListener('resize', throttle(onScroll, 200), false)
}

export const initLazyPhoto = () => {
    collectPhotos()
    if (photos.length === 0) return

    updatePhotosPositions()

    window.addEventListener('scroll', throttle(onScroll, 200), {
        passive: true
    })

    window.addEventListener('resize', throttle(onResize, 200), {
        passive: true
    })

    onScroll()
}
