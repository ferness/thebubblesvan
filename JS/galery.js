        //vybrat všechny elementy s třídou .GaleryImg
        document.querySelectorAll('.GaleryImg').forEach(image =>{
            image.onclick = () =>{
                document.querySelector('.popup-image').style.display = 'block';
                document.querySelector('#popup-img').src = image.getAttribute("src");
            }
        });
  
            document.querySelector('.popup-image span').onclick = () =>{
            document.querySelector('.popup-image').style.display = 'none';
  
        };
    