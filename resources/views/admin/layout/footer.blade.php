   <!-- footer section Start -->
   <div class="footer">
       <div class="pull-right">

       </div>
       <div>
           <strong>Bản quyền thuộc</strong> Nhóm 1&copy; 2024
       </div>
   </div>
   <!-- footer section End -->

   <!-- Mainly scripts -->
   <script src="{{ asset('css2/js/jquery-3.1.1.min.js') }}"></script>
   <script src="{{ asset('css2/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

   <!-- Flot -->
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.spline.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.resize.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.pie.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/flot/jquery.flot.time.js') }}"></script>

   <!-- Custom and plugin javascript -->
   <script src="{{ asset('css2/js/inspinia.js') }}"></script>
   <script src="{{ asset('css2/js/plugins/pace/pace.min.js') }}"></script>

   <!-- Sparkline -->
   <script src="{{ asset('css2/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

   <script>
       $(document).ready(function() {
           var sparklineCharts = function() {
               $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                   type: 'line',
                   width: '100%',
                   height: '50',
                   lineColor: '#1ab394',
                   fillColor: "transparent"
               });

               $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                   type: 'line',
                   width: '100%',
                   height: '50',
                   lineColor: '#1ab394',
                   fillColor: "transparent"
               });

               $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16, 8], {
                   type: 'line',
                   width: '100%',
                   height: '50',
                   lineColor: '#1C84C6',
                   fillColor: "transparent"
               });
           };

           var sparkResize;

           $(window).resize(function(e) {
               clearTimeout(sparkResize);
               sparkResize = setTimeout(sparklineCharts, 500);
           });

           sparklineCharts();

           var data1 = [
               [0, 4],
               [1, 8],
               [2, 5],
               [3, 10],
               [4, 4],
               [5, 16],
               [6, 5],
               [7, 11],
               [8, 6],
               [9, 11],
               [10, 20],
               [11, 10],
               [12, 13],
               [13, 4],
               [14, 7],
               [15, 8],
               [16, 12]
           ];
           var data2 = [
               [0, 0],
               [1, 2],
               [2, 7],
               [3, 4],
               [4, 11],
               [5, 4],
               [6, 2],
               [7, 5],
               [8, 11],
               [9, 5],
               [10, 4],
               [11, 1],
               [12, 5],
               [13, 2],
               [14, 5],
               [15, 2],
               [16, 0]
           ];
           $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
               data1, data2
           ], {
               series: {
                   lines: {
                       show: false,
                       fill: true
                   },
                   splines: {
                       show: true,
                       tension: 0.4,
                       lineWidth: 1,
                       fill: 0.4
                   },
                   points: {
                       radius: 0,
                       show: true
                   },
                   shadowSize: 2
               },
               grid: {
                   hoverable: true,
                   clickable: true,
                   borderWidth: 2,
                   color: 'transparent'
               },
               colors: ["#1ab394", "#1C84C6"],
               xaxis: {},
               yaxis: {},
               tooltip: false
           });
       });
   </script>

   <!-- SUMMERNOTE -->
   <script src="{{ asset('css2/js/plugins/summernote/summernote.min.js') }}"></script>


   <script>
       $(document).ready(function() {

           $('.summernote').summernote();

       });
   </script>
   {{-- mini function section  --}}
   <script>
       // confirm delete item 
       function confirmDel() {
           return confirm('Bạn chắc chắn xoá không ')
       }

       // Validate form field

    //    document.getElementById('addProForm').addEventListener('submit', function(event) {
    //        event.preventDefault(); //Ngăn form  gửi khi không hợp lệ

    //        //xoá thông báo lỗi cũ
    //        document.getElementById('usernameMessage').classList.remove('show');
    //        let isValid = true;

    //        //Kiểm tra username
    //        const name = document.getElementById('username').value;
    //        if (!name) {
    //            document.getElementById('usernameMessage').classList.add('show');
    //            isValid = false;
    //        }

    //    })

       function validateName() {
           const name = document.getElementById('username').value;
           if (!name) {
               document.getElementById('usernameMessage').classList.add('show');
           } else {
               document.getElementById('usernameMessage').classList.remove('show');
           }

       }

       function validateEmail() {
           const email = document.getElementById('email').value;
           const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
           if (!emailPattern.test(email)) {
               document.getElementById('emailMessage').classList.add('show');
           } else {
               document.getElementById('emailMessage').classList.remove('show');
           }
       }

       function validateAddress() {
           const address = document.getElementById('address').value;
           if (!address) {
               document.getElementById('addressMessage').classList.add('show');
           } else {
               document.getElementById('addressMessage').classList.remove('show');
           }
       }

       function validatePhone() {

           const phone = document.getElementById('phonenumber').value;
           const phonePattern = /^\d{10,15}$/; // Điều chỉnh biểu thức chính quy theo định dạng
           if (!phonePattern.test(phone)) {
               document.getElementById('phonenumberMessage').classList.add('show');
           } else {
               document.getElementById('phonenumberMessage').classList.remove('show');
           }
       }

       function validatePass() {
           const pass = document.getElementById('password').value;
           if (!pass || pass.length < 5) {
               document.getElementById('passwordMessage').classList.add('show');
           } else {
               document.getElementById('passwordMessage').classList.remove('show');
           }
       }

       function validateConfirmPass() {
           const pass = document.getElementById('password').value;
           const confirmPass = document.getElementById('confirmpassword').value;
           if (pass !== confirmPass) {
               document.getElementById('confirmMessage').classList.add('show');
           } else {
               document.getElementById('confirmMessage').classList.remove('show');
           }
       }
   </script>

   </body>

   </html>
