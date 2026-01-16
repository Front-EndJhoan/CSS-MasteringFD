document.addEventListener("DOMContentLoaded", function() {

    const btn = document.querySelector('.btn')

    
    

    btn.addEventListener('click', () => {

        const para = document.createElement('p')
        const section = document.querySelector('section')
        // section.appendChild(para)
        const text = document.createTextNode('Párrafo creado dinámicamente')
        para.appendChild(text)
        //para.textContent = 'Párrafo creado dinámicamente'
        btn.after(para)
        
       
    })
});