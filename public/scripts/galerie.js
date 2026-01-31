let slideIndex = 1;
showSlides(slideIndex);

// Contrôle les flèches (n vaut 1 ou -1)
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Affiche la bonne image
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    
    // Vérification de sécurité au cas où le JS charge avant le HTML
    if (slides[slideIndex-1]) {
        slides[slideIndex-1].style.display = "block";  
    }
}
