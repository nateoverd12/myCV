var swiper = new Swiper('.swiper-container', {
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="'+className+'">'+index+'</span>';}
  },
  // effect: 'fade',
  loop: true,
  autoplay:{
    delay:240,
    autoplayDisableOnInteraction: true
  },
  keyboard: {
    enabled: true,
    onlyInViewport: false,
  },
  // direction: 'vertical',
  // // parallax: true,
  // slidesPerView: 1.15,
      // spaceBetween: 30,
});

for(let i=0;i<4;i++){
document.getElementsByClassName('hoverButton')[i].addEventListener(
'mouseover', function (){
this.click();
document.getElementsByClassName('swiper-pagination-bullet')[i].click()
})
}


// Select the node that will be observed for mutations
var targetNode = document.getElementsByClassName('swiper-pagination')[0];

// Options for the observer (which mutations to observe)
var config = { attributes: true, childList: true, subtree: true };

// Callback function to execute when mutations are observed
var callback = function(mutationsList, observer) {
for(var mutation of mutationsList) {
if (mutation.target.className == 'swiper-pagination-bullet swiper-pagination-bullet-active'){
  document.getElementsByClassName('hoverButton')[mutation.target.innerHTML].click();
}
}
};

// Create an observer instance linked to the callback function
var observer = new MutationObserver(callback);

// Start observing the target node for configured mutations
observer.observe(targetNode, config);
