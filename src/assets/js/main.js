/**
 * @author Ahmed Salah
 * @github AH-SALAH
 * @create date 2018-11-03 03:23:33
 * @modify date 2018-11-03 03:23:33
 * @desc [main.js]
*/


// import all files from a dir that match regex
let cache = {};
function importAll (r) {
    r.keys().forEach((key) => {
        cache[key] = r(key);

        // get img which need to be converted to base64 by url-loader
        let getimgstr = key.split('/')[1].split('.')[0],
            img = document.querySelector('[alt="'+getimgstr+'"]'),
            imgsArray = ['screenshot']; // list of imgs name
            // console.log("getimgstr: ",getimgstr);
        if(img && $.inArray(getimgstr,imgsArray) > -1){
            img.src = cache[key];
            // console.log("ifistrue: ",img);
        }
    });
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
import { clearInterval, setInterval } from "timers";
//// Alternatively, you may import plugins individually as needed:
// import 'bootstrap/js/dist/util';
// import 'bootstrap/js/dist/dropdown';
//================================
// import "./about.js";
// import "../../about.html";

//================================
// Start main js

// import screenshot from '../img/screenshot.jpg';
// let img = document.querySelector('[alt="screenshot"]');
// img.src = screenshot;

const mainObj = {
    loadMoreBtn : $(".load-more-btn"),
    loader : $(".loader"),
    moreContent: $(".more-content"),
    projsContent: $(".projs-content"),
    mediaItems: $(".media"),
    init: function() {
        let obj = this;
        obj.leftSlideIn(obj.mediaItems);
        obj.loadMoreBtn.click(function(){
            obj.disableLoadMoreBtn();
            obj.loadMoreDots();
            obj.showBtnLoader();
            setTimeout(() =>{
                obj.projsContent.append(obj.moreContent.html());
                obj.leftSlideIn(obj.moreContent);
                obj.hideBtnLoader();
                obj.noMore();
                // obj.enableLoadMoreBtn();

                //TODO : Get data from github
                // $.ajax({
                //     type: 'GET',
                //     url:'https://api.github.com/users/AH-SALAH/repos',
                //     success: function(resp) {
                //         console.log(resp);
                //     },
                //     failed: function(er,status,xhr) {
                //         console.log(er,status);
                //     }
                // });
            },3000);
        });

        //===================================
        //enable tooltip
        // $('[data-toggle="tooltip"]').tooltip();

    },
    showBtnLoader: function() {
        this.loader.removeClass('d-none');
        this.loader.addClass('d-inline-block');
    },
    hideBtnLoader: function() {
        this.loader.removeClass('d-inline-block');
        this.loader.addClass('d-none');
    },
    enableLoadMoreBtn: function() {
        this.loadMoreBtn.prop('disabled',false);
        this.loadMoreBtn.find('.load-text').text('Load More');
    },
    disableLoadMoreBtn: function() {
        this.loadMoreBtn.prop('disabled',true);
    },
    loadMoreDots: function() {
        this.loadMoreBtn.find('.load-text').text('Load More..');
    },
    noMore: function() {
        this.loadMoreBtn.find('.load-text').text('no More for now :(');
        this.disableLoadMoreBtn();
    },
    leftSlideIn: function(items) {
        var x = 0,
            inter = setInterval(function(){
                if(x == items.length){
                    clearInterval(inter);
                    return;
                }else{
                    items[x].classList.add('left-slide-in');
                }
                x+=1;
            },700);
    }
};

//init
mainObj.init();



//================================
// for hot module
if (module.hot) {
    module.hot.accept();
}