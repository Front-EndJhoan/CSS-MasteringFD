document.addEventListener("DOMContentLoaded", () => {
    const btn = document.querySelector('#add')
    const inputItem = document.querySelector('#item')
    const listaCompra = document.querySelector('ul')
    const feedback = document.querySelector('.feedback')

    inputItem.addEventListener('input', () => {
        console.log(inputItem.value.length)
    })    

    btn.addEventListener('click', () => {
        const valueItem = inputItem.value.trim()

        if (valueItem.length > 0) {
            const itemLista = document.createElement('li')
            itemLista.textContent = valueItem

            const btnBorrar = document.createElement('button')
            btnBorrar.textContent = 'Borrar'

            itemLista.appendChild(btnBorrar)
            listaCompra.appendChild(itemLista)

            btnBorrar.addEventListener('click', () => {
                itemLista.remove()
            })

            inputItem.value = ''
            feedback.textContent = ''
        } else {
            feedback.textContent = 'Añade un producto a la lista'
        }
    })
})
