(() => {
    const miles = document.querySelector('.js-miles')
    const fields = miles.querySelectorAll('input')

    fields[1].addEventListener('keyup', () => {
        fields[2].value = parseInt(fields[0].value) + parseInt(fields[1].value || 0)
    })
})()
