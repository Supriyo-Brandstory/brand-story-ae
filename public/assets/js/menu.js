$(document).ready(function(){"use strict";$('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');$('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');$(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");$(".menu > ul > li").hover(function(e){if($(window).width()>943){$(this).children("ul").fadeIn(150);e.preventDefault()}},function(e){if($(window).width()>943){$(this).children("ul").fadeOut(150);e.preventDefault()}});$(document).on('click',function(e){if($(e.target).parents('.menu').length===0)
    $(".menu > ul").removeClass('show-on-mobile');});$(".menu > ul > li").click(function(){var thisMenu=$(this).children("ul");var prevState=thisMenu.css('display');$(".menu > ul > li > ul").fadeOut();if($(window).width()<943){if(prevState!=='block')
    thisMenu.fadeIn(150);}});$(".menu-mobile").click(function(e){$(".menu > ul").toggleClass('show-on-mobile');e.preventDefault()})})

  document.querySelectorAll('.uniq-contact-lead-btn').forEach(function(btn) {
    btn.addEventListener('click', function () {
      document.querySelector('.uniq-contact-lead-popup-overlay').style.display = 'flex';
    });
  });

  document.querySelector('.uniq-contact-lead-close').addEventListener('click', function() {
    document.querySelector('.uniq-contact-lead-popup-overlay').style.display = 'none';
  });

  // Optional: Close popup on outside click
  document.querySelector('.uniq-contact-lead-popup-overlay').addEventListener('click', function(e) {
    if (e.target.classList.contains('uniq-contact-lead-popup-overlay')) {
      document.querySelector('.uniq-contact-lead-popup-overlay').style.display = 'none';
    }
  });