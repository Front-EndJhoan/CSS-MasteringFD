document.addEventListener("DOMContentLoaded", function() {

    const btn = document.querySelector('.btn')

    
    

    btn.addEventListener('click', () => {

        const para = document.createElement('p')
        const section = document.querySelector('section')
        section.appendChild(para)
        para.textContent = 'Párrafo creado dinámicamente'
        
       
    })
});