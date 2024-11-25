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
   const modalCheckLogin = document.getElementById('check-login');
   const myselftModal = document.getElementById('myselfModal');
   const closeModal = document.getElementById('closeModal');
   const bodyEle = document.querySelector('body');

   const openModalCheckLogin = () => {
     bodyEle.classList.add('modal-open');
     modalCheckLogin.classList.add('show');
     modalCheckLogin.style.display = "block";
     // modalCheckLogin.style.visibility = "visible";
     // modalCheckLogin.style.opacity = "1";


     myselfModal.classList.add('modal-backdrop');
     myselfModal.classList.add('modal-fade');
     myselfModal.classList.add('modal-show');
     myselfModal.style.opacity = 0.5;
   }

   closeModal.addEventListener('click', even => {
     bodyEle.classList.remove('modal-open');
     modalCheckLogin.classList.remove('show');
     modalCheckLogin.style.display = "none";
     myselfModal.classList.remove('modal-backdrop');
     myselfModal.classList.remove('modal-fade');
     myselfModal.classList.remove('modal-show');

     // modalCheckLogin.style.visibility = "hidden";
     // modalCheckLogin.style.opacity = "0";
   });
 </script>

 <script>
   function checkLogin(event, element) {
     event.preventDefault();

     const targetUrl = element.href;

     fetch('commons/checkSession.php')
       .then(response => response.json())
       .then(data => {
         if (data.status) {
           window.location.href = targetUrl;
         } else {
           openModalCheckLogin();
         }
       })
       .catch(error => {
         alert('Lỗi rồi;');
       });

     return false;
   }
 </script>

 <script>
   const formatStringToNumber = (invalidString) => {
     return cleanedString = invalidString.replace(/,/g, '').replace(/[^\d.-]/g, '');

   }
 </script>