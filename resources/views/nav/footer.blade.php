<script src="{{asset('/template/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('/template/assets/js/app.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/horizontal-layout.js')}}"></script>
<!-- <script src="style.js"></script> -->

<!-- Need: Apexcharts -->
<script src="{{asset('/template/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('/template/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/simple-datatables.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('/template/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/sweetalert2.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="{{asset('/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.flash.min.js')}}"></script>
<script src="{{asset('/datatable/jszip.min.js')}}"></script>
<script src="{{asset('/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.colVis.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#postLink').click(function(e) {
            e.preventDefault(); // Mencegah hyperlink melakukan navigasi standar

            // Data yang ingin Anda kirim dalam permintaan POST
            var postData = {
                _token: '{{ csrf_token() }}', // Token CSRF
            };

            $.post("{{route('logout')}}", postData, function(response) {
                // Tanggapan dari server
                console.log(response);
                // Anda dapat menambahkan kode lain untuk menangani tanggapan di sini
            });
        });
    });
</script>
<script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>

</body>

</html>