(() => {
    const button = document.querySelector('.js-nav-toggle')
    const navigation = document.querySelector('.js-nav')

    button.addEventListener('click', () => {
        navigation.classList.toggle('is-open')
    })
})()
