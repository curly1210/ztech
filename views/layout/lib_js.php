 <!--====== Vendor Js ======-->
 <script src="assets/js/vendor.js"></script>

 <!--====== jQuery Shopnav plugin ======-->
 <script src="assets/js/jquery.shopnav.js"></script>

 <!--====== App ======-->
 <script src="assets/js/app.js"></script>

 <script src="assets/js/map-init.js"></script>
 <!--Font Awesome-->
 <script src="https://kit.fontawesome.com/7fbbf93a04.js" crossorigin="anonymous"></script>

 <script>
   function checkLogin(event, element) {
     event.preventDefault();

     const targetUrl = element.href;

     fetch('commons/checkSession.php')
       .then(response => response.json())
       .then(data => {
         if (data.status) {
           window.location.href = targetUrl;
         }
       })
       .catch(error => {
         alert('Lỗi rồi;');
       });

     return false;
   }
 </script>