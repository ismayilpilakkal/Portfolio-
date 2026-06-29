document.addEventListener('DOMContentLoaded', function() {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800, // values from 0 to 3000, with step 50ms
            easing: 'ease-in-out', // default easing for AOS animations
            once: true, // whether animation should happen only once - while scrolling down
            offset: 50, // offset (in px) from the original trigger point
        });
    }
});
