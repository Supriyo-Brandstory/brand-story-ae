//gsap.registerPlugin(CSSRulePlugin);
$(document).ready(function () { //Screen size start
    if (window.matchMedia("(min-width: 1200px)").matches) {


        //Solutions
        if ($(".solutions-desktop").length > 0) {
            const csp = gsap.timeline();
            csp.to(".homepage .header", { autoAlpha: 0 }, "0")
            ScrollTrigger.create({
                animation: csp,
                trigger: ".solutions-desktop",
                start: "top top",
                end: "+=100",
                scrub: true,
            });

            const decor1 = gsap.timeline();
            decor1.from(".ddslide2", { yPercent: 100 }, "+=1")
            decor1.from(".ddslide3", { yPercent: 100 }, "+=1")
            decor1.from(".ddslide4", { yPercent: 100 }, "+=1")
            decor1.from(".ddslide5", { yPercent: 100 }, "+=1")
            decor1.from(".ddslide6", { yPercent: 100 }, "+=1")

            ScrollTrigger.create({
                animation: decor1,
                trigger: ".solutions-desktop",
                start: "top top",
                end: "+=3000",
                scrub: 1,
                pin: true,
                //anticipatePin: 1,
            });

            const ddbtns = gsap.timeline();
            ddbtns.from(".dd2sbtn", { opacity: 0, display: "none", duration: 0.01 }, "+=1")
                .from(".dd3sbtn", { opacity: 0, display: "none", duration: 0.01 }, "+=1")
                .from(".dd4sbtn", { opacity: 0, display: "none", duration: 0.01 }, "+=1")
                .from(".dd5sbtn", { opacity: 0, display: "none", duration: 0.01 }, "+=1")
                .from(".dd6sbtn", { opacity: 0, display: "none", duration: 0.01 }, "+=1")

            ScrollTrigger.create({
                animation: ddbtns,
                trigger: ".solutions-desktop",
                start: "top top",
                end: "+=3000",
                scrub: 3,
                toggleClass: "active",
            });
        }

        if ($(".homepage .brand-sec").length > 0) {
            const csp1 = gsap.timeline();
            csp1.to(".homepage .header", { autoAlpha: 1 }, "0")
            ScrollTrigger.create({
                animation: csp1,
                trigger: ".homepage .brand-sec",
                start: "top top",
                end: "top",
                scrub: true,
            });
        }
        //Solutions 	









    }
});//Screen size end






















