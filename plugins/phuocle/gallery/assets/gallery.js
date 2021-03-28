var gallery1 = document.querySelector('#gallery1List');
var getVal = function (elem, style) {
    return parseInt(window.getComputedStyle(elem).getPropertyValue(style));
};
var getHeight = function (item) {
    return item.querySelector('.content').getBoundingClientRect().height;
};
var resizeAll = function () {
    var altura = getVal(gallery1, 'grid-auto-rows');
    var gap = getVal(gallery1, 'grid-row-gap');
    gallery1.querySelectorAll('.gallery1-item').forEach(function (item) {
        var el = item;
        el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
    });
};
gallery1.querySelectorAll('img').forEach(function (item) {
    var altura = getVal(gallery1, 'grid-auto-rows');
    var gap = getVal(gallery1, 'grid-row-gap');
    var gitem = item.parentElement.parentElement;
    gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
    item.addEventListener('load', function () {
        var altura = getVal(gallery1, 'grid-auto-rows');
        var gap = getVal(gallery1, 'grid-row-gap');
        var gitem = item.parentElement.parentElement;
        gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
        item.classList.remove('byebye');
    });

});
window.addEventListener('resize', resizeAll);
gallery1.querySelectorAll('.gallery1-item').forEach(function (item) {
    item.addEventListener('click', function () {
        item.classList.toggle('full-image-gallery');
    });
});
