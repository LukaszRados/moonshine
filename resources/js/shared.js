(() => {
    const body = document.body
    const html = document.querySelector('html')
    const button = document.querySelector('.js-nav-toggle')
    const navigation = document.querySelector('.js-nav')

    button.addEventListener('click', e => {
        e.preventDefault()
        body.classList.toggle('is-blocked')
        html.classList.toggle('is-blocked')
        navigation.classList.toggle('is-open')
    })
})()
