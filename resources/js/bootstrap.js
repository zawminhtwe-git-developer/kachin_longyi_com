window._ = require('lodash');

try {
    require('bootstrap');
    window.VenoBox = require('venobox');
    window.Swal = require('sweetalert2');
    window.$=require('jquery');
    window.DataTable= require('datatables.net/js/jquery.dataTables.min');
    window.Chart = require('chart.js');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
// welcome js start
const body =document.querySelector("body"),
    nav= document.querySelector('nav'),
    modeToggle =document.querySelector(".dark-light"),
    searchToggle =document.querySelector(".searchToggle"),
    sideBarOpen =document.querySelector(".sideBarOpen"),
    sideBarClose =document.querySelector(".sideBarClose");



//js code to keep user selected mode even page refresh or file reopen
let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark-mode"){
    body.classList.add("dark");
}


//js Code toggle dark and light mode
modeToggle.addEventListener('click',()=>{
    modeToggle.classList.toggle('active');
    body.classList.toggle('dark');


    //js code to keep user selected mode even page refresh or file reopen
    if(!body.classList.contains('dark')){
        localStorage.setItem("mode" , "light-mode");
    }else{
        localStorage.setItem("mode" , "dark-mode");
    }
})

//js Code searchbox
searchToggle.addEventListener('click',()=>{
    searchToggle.classList.toggle('active');

})

//  //js Code sideBarClose
//  sideBarToggle.addEventListener('click',()=>{
//     sideBarToggle.classList.toggle('active');

// })

//js Code sidebar
sideBarOpen.addEventListener('click',()=>{
    nav.classList.add('active');

})

//js Code sidebar
sideBarClose.addEventListener('click', e =>{
    let clickedElm =e.target;
    if(!clickedElm.classList.contains("sideBarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove('active');
    }

})
// welcome js stop
