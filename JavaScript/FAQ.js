const HeadersItemAcordeon = document.querySelectorAll(".Header_Item_Acordeon");

HeadersItemAcordeon.forEach(HeadersItemAcordeon =>{
    HeadersItemAcordeon.addEventListener("click", event =>{
        const HeadersItemAcordeonActualmente = document.querySelector(".Header_Item_Acordeon.active");
        
        if(HeadersItemAcordeonActualmente && HeadersItemAcordeonActualmente !== HeadersItemAcordeon){
            HeadersItemAcordeonActualmente.classList.toggle("active");
            HeadersItemAcordeonActualmente.nextElementSibling.style.maxHeight = 0;
        }

        HeadersItemAcordeon.classList.toggle("active");
        const BodysItemAcordeon = HeadersItemAcordeon.nextElementSibling;
        
        if(HeadersItemAcordeon.classList.contains("active")){
            BodysItemAcordeon.style.maxHeight = BodysItemAcordeon.scrollHeight + "px"; 
        }else{
            BodysItemAcordeon.style.maxHeight = 0;
        }
        
    });
});