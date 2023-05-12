gsap.registerPlugin(ScrollTrigger);
gsap.to(".About_second",{
     duration:3,
     opacity:1,
     y:-300,
    scrollTrigger: {
        
        trigger:".About_second",
        start:"top 80%",
        end:"+=500",
        markers:true,
        
    }
    
}
)