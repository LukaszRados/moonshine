(() => {
    const coordinates = document.querySelectorAll('.js-coordinates')
    
    coordinates.forEach(group => {
        const fields = group.querySelectorAll('input')
        const output = group.querySelector('.js-result')
        const updateOutput = () => {
            const degrees = parseInt(fields[0].value || 0, 10)
            const minutes = parseInt(fields[1].value || 0, 10)
            const seconds = parseInt(fields[2].value || 0, 10)
            const direction = ['W', 'S'].find(v => v === fields[3].value) ? -1 : 1
            output.value = direction * (degrees + (minutes / 60) + (seconds / (60 * 1000)))
        }
        fields.forEach(field => {
            field.addEventListener('keyup', updateOutput)
        })
    })
})()
