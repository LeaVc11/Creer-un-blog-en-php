//Animation de L'écriture

const txtAnim = document.querySelector('.text-animation');

let typewriter = new Typewriter(txtAnim,{
    loop: false,
    deleteSpeed:20
})
typewriter
    .pauseFor(1800)
    .changeDelay(50)
    .typeString('<strong style="font-size: 34px "> Carine Vinagre </strong> <br>')
    .pauseFor(300)
    .typeString(' Développeur Applications !')
    .pauseFor(1000)
    .deleteChars(14)
    .typeString('<span style="color:#f1c40f"> Html, Css, Bootstrap</span> ')
    .pauseFor(1000)
    .deleteChars(23)
    .typeString('<span style="color: #EA39ff "> Php, Symfony, Wordpress</span> ')
    .pauseFor(1000)

    .start()


