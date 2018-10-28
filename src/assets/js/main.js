// import all files from a dir that match regex
let cache = {};
function importAll (r) {
    r.keys().forEach(key => cache[key] = r(key));
}
//================================
// import all imgs
importAll(require.context('../img/', true, /\.(png|jpe?g|gif|svg)$/));
// import front-end necessary files
importAll(require.context('../../../src/', true, /(\.(ico|txt|xml|htaccess|webmanifest)?$|(tile\.png|tile-wide\.png))/));

//================================
import "../scss/main.scss";
//================================
// import "jquery";
//================================
//// Import Bootstrap’s JavaScript
import "bootstrap";
//// Alternatively, you may import plugins individually as needed:
// import 'bootstrap/js/dist/util';
// import 'bootstrap/js/dist/dropdown';
//================================
// import "./about.js";
// import "../../about.html";

//================================
// Start main js


let tag = $(".card-title").eq(0).text();
console.log(tag);

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});





//================================
// for hot module
if (module.hot) {
    module.hot.accept();
}