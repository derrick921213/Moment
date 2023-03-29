// const sideMenu = document.querySelector("aside");
// const menuBtn = document.querySelector("#menu-btn");
// const closeBtn = document.querySelector("#close-btn");
// const themeToggler = document.querySelector(".theme-toggler");

// menuBtn.addEventListener('click',()=>{
//     sideMenu.style.display = 'block';
// });

// closeBtn.addEventListener('click',()=>{
//     sideMenu.style.display = 'none';
// });

// themeToggler.addEventListener('click',()=>{
//     document.body.classList.toggle('dark-theme-variables');
//     themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
//     themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
// });


$("#menu-btn").on('click',()=>{
    $("aside").show();
});

$("#close-btn").on('click',()=>{
    $("aside").hide() ;
});


// var Dark;
// $(".theme-toggler").on('click',()=>{
//     $("body").toggleClass('dark-theme-variables');
//     if($("body").hasClass('dark-theme-variables')){
//         Dark = 'dark-theme-variables';
//     }
//     else{
//         Dark = '';
//     }
//     $(".theme-toggler").children("span").eq(0).toggleClass('active');
//     $(".theme-toggler").children("span").eq(1).toggleClass('active');
// });


// $(document).ready(function() {
//     if(Dark==='dark-theme-variables'){
//         $("body").addClass(Dark);
//     }
//     else{
//         $("body").removeClass(Dark);
//     }
// });

const themeToggler = $(".theme-toggler");
const body = $("body");
const themeClass = "dark-theme-variables";

// 讀取用戶的主題設置
const isDarkTheme = localStorage.getItem("isDarkTheme");

if (isDarkTheme === "true") {
  body.addClass(themeClass);
  themeToggler.children("span").eq(0).addClass("active");
  themeToggler.children("span").eq(1).addClass("active");
}

// 點擊事件
themeToggler.on("click", () => {
  body.toggleClass(themeClass);
  const isDark = body.hasClass(themeClass);
  localStorage.setItem("isDarkTheme", isDark ? "true" : "false");
  console.log('aaa');
  themeToggler.children("span").eq(0).toggleClass("active");
  themeToggler.children("span").eq(1).toggleClass("active");
});