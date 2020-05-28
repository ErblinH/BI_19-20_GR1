var slideIndex2,slides2;
function initGallery(){
    slideIndex2 = 0;
    slides2=document.getElementsByClassName("MbajtesiImazheve2");
    slides2[slideIndex2].style.opacity=1;

    if(slides2.length<2){
        var nextPrevBtns=document.querySelector(".shigjetaMajtas,.shigjetaDjathtas");
        nextPrevBtns.style.display="none";
        for (i = 0; i < nextPrevBtn.length; i++) {
            nextPrevBtn[i].style.display="none";
        }
    }

}

initGallery();

function plusSlides2(n){
    moveSlide2(slideIndex2+n);
}

function moveSlide2(n){
    var i, current, next;
        var move = {
            forCurrent:"",
            forNext:""
        };

        var slide;

        if(n>slideIndex2) {
            if(n >= slides2.length){n=0;}
            move.forCurrent="moveLeftCurrentSlide2";
            move.forNext="moveLeftNextSlide2";
            slide="slideTextFromTop2";
        }else if(n<slideIndex2){
            if(n<0){n=slides2.length-1;}
            move.forCurrent="moveRightCurrentSlide2";
            move.forNext="moveRightPrevSlide2";
            slide="slideTextFromBottom";
        }
        if(n!=slideIndex2){
            next = slides2[n];
            current=slides2[slideIndex2];
            for (i = 0; i < slides2.length; i++) {
                slides2[i].className = "MbajtesiImazheve2";
                slides2[i].style.opacity=0;
                
            }
            current.classList.add(move.forCurrent);
            next.classList.add(move.forNext);
            
            slideIndex2=n;
           
        }
}
