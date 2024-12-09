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
{{-- <script src="{{asset('css2/js/plugins/summernote/summernote.min.js')}}"></script> --}}

{{-- 
    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
    </script> --}}
   {{-- mini function section --}}
<script>
    function confirmDel(){
        return confirm('Bạn chắc chắn xoá không ')
    }

    // function dung de check cac field trong form
    // const validations = 
    // {
    //     email:{
    //         validate: validateEmail,
    //         messageId: 'emailMessage'
    //     },
    //     userName:{
    //         validate:validateuserName,
    //         messageId: 'usenameMessage'
    //     }
    // };
   
    // function validateField(field) {
    //     const value = document.getElementById(field + 'Field').value;
    //     const validation = validations[field];
    //     if (validation) {
    //         const isValid = validation.validate(value);
    //         toggleError(validation.messageId, !isValid);
    //     }
    // }

    // function validateEmail(email) {
    //     const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     return emailPattern.test(email);
    // }

    // function validateName(username) {
    //     return username.trim() !== '';
    // }

    // function toggleError(elementId, hasError) {
    //     const messageElement = document.getElementById(elementId);
    //     messageElement.style.display = hasError ? 'block' : 'none';
    // }


//  function validateField(field) {
//         const email = document.getElementById('emailField').value;
//         const name = document.getElementById('nameField').value;
//         let isValid = true;

//         if (field === 'email') {
//             isValid = validateEmail(email);
//             toggleError('emailMessage', !isValid);
//         } else if (field === 'name') {
//             isValid = validateName(name);
//             toggleError('nameMessage', !isValid);
//         }
//     }

function validateName(){
    const value = document.getEmlentById('usernameField').value;
    const message = document.getEmlentById('usernameMessage');
   console.log($value);
    
    if (value.trim() === ' ') {
        message.style.display = 'block';
    }else{
        message.style.display = 'none';
    }

}
    function validateEmail() {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const value = document.getEmlentById(email).value;
        const email
        return emailPattern.test(email);
    }

//     function validateName(name) {
//         return name.trim() !== '';
//     }

//     function toggleError(elementId, hasError) {
//         const messageElement = document.getElementById(elementId);
//         messageElement.style.display = hasError ? 'block' : 'none';
//     }
</script>

   </body>

   </html>
