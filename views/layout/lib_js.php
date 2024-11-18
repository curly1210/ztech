 <!--====== Vendor Js ======-->
 <script src="assets/js/vendor.js"></script>

 <!--====== jQuery Shopnav plugin ======-->
 <script src="assets/js/jquery.shopnav.js"></script>

 <!--====== App ======-->
 <script src="assets/js/app.js"></script>

 <script src="assets/js/map-init.js"></script>

 <script>
   function checkLogin(event) {
     event.preventDefault();
     // return false;
     return fetch('commons/checkSession.php')
       .then(response => response.json())
       .then(data => {
         if (data.status) {
           window.location.href = event.target.href;

         } else {

         }
         // alert('data.status');
       })
       .catch(error => {
         alert('Lỗi rồi;');
       });

     return false;
   }
 </script>