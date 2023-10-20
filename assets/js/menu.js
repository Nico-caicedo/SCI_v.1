
menu_burger = document.getElementById('menu_burger')
closes = document.getElementById('close')
dark = document.getElementById('dark')


menu_burger.addEventListener('click', function() {

    menu_burger.style.display = "none"
    closes.style.display = "block"
    dark.style.display = "block"
})

closes.addEventListener('click', function(){
    menu_burger.style.display = "block"
    closes.style.display = "none"
    dark.style.display = "none"
})
   

