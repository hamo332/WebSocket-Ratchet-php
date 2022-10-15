let myInputs = document.querySelectorAll(".container input");

window.onload = function(){
    myInputs[0].focus();
}
myInputs.forEach(function(ele){
    ele.onfocus = function(){
        this.setAttribute("placeholder" , "" );
        // this.removeAttribute("placeholder");
    }
    ele.onblur = function(){
        this.setAttribute("placeholder" , ele.getAttribute("data-holder"));
    }
});