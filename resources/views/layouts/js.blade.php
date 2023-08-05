<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
<script src="{{ url('template/dist/js/app.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->
<!-- <script src="{{ url('DataTables/datatables.js') }}"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    var aktif = 0;
    $(document).ready(function() {
        $("#toogle").click(function() {
            if (aktif == 0) {
                $("#maximini").addClass("side-nav--simple");
                $("#side-profil").hide();
                $("#font-lasik").hide();
                aktif = 1;
            } else {
                $("#maximini").removeClass("side-nav--simple");
                $("#side-profil").show();
                $("#font-lasik").show();
                aktif = 0;
            }
        });

    });

    $(document).ready(function() {
        $('#tabel-laporan-pegawai').DataTable({
            "dom": 'Bfrtip',
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "buttons": [{
                extend: 'excel',
                messageTop: 'DATA PEGAWAI NON ASN KOTA TANGERANG SELATAN',
                text: 'DOWNLOAD LAPORAN',
                className: 'btn btn-primary'
            }, ]
        });
    });

    $(document).ready(function() {
        $('#tabel-akun').DataTable({
            "bLengthChange": false,
        });
    });

    $(document).ready(function() {
        $('#tabel-skpd').DataTable({
            "bLengthChange": false,
        });
    });

    $(document).ready(function() {
        $('#tabel-identitas').DataTable({
            "bLengthChange": false,
        });
    });

    $(document).ready(function() {
        $('#tabel-jabatan').DataTable({
            "bLengthChange": false,
        });
    });

    $(document).on("click", '.btn_ubah', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var username = $(this).data('username');
        var skpd_id = $(this).data('skpd_id');
        var level = $(this).data('level');

        $(".ubah_id").val(id);
        $(".ubah_nama").val(nama);
        $(".ubah_username").val(username);
        $(".ubah_skpd_id").val(skpd_id);
        $(".ubah_level").val(level);

    });

    $(document).on("click", '.btn_ubah_identitas', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var nik = $(this).data('nik');
        var skpd_id = $(this).data('skpd_id');
        var nama_skpd = $(this).data('nama_skpd');
        var pendataan_2022 = $(this).data('pendataan_2022');
        var status_pegawai = $(this).data('status_pegawai');

        $(".ubah_id_identitas").val(id);
        $(".ubah_nama").val(nama);
        $(".ubah_nik").val(nik);
        $(".ubah_skpd_id").val(skpd_id);
        $(".ubah_nama_skpd").val(nama_skpd);
        $(".ubah_pendataan_2022").val(pendataan_2022);
        $(".ubah_status_pegawai").val(status_pegawai);

    });

    $(document).on("click", '.btn_ubah_skpd', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama_skpd = $(this).data('nama_skpd');
        var alias_skpd = $(this).data('alias_skpd');

        $(".ubah_id_skpd").val(id);
        $(".ubah_nama_skpd").val(nama_skpd);
        $(".ubah_alias_skpd").val(alias_skpd);

    });

    $(document).on("click", '.btn_ubah_jabatan', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama_jabatan = $(this).data('nama_jabatan');

        $(".ubah_id_jabatan").val(id);
        $(".ubah_nama_jabatan").val(nama_jabatan);

    });

    $(document).on("click", '.btn_ubah_rjabatan', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var identitas_id = $(this).data('identitas_id');
        var ledger_id = $(this).data('ledger_id');
        var spk_id = $(this).data('spk_id');
        var no_spk = $(this).data('no_spk');
        var tgl_spk = $(this).data('tgl_spk');
        var tgl_mulai = $(this).data('tgl_mulai');
        var tgl_akhir = $(this).data('tgl_akhir');
        var nama_skpd = $(this).data('nama_skpd');
        var unit_kerja = $(this).data('unit_kerja');
        var jabatan_id = $(this).data('jabatan_id');
        var pendidikan_id = $(this).data('pendidikan_id');
        var pembayaran = $(this).data('pembayaran');
        var tandatangan = $(this).data('tandatangan');
        //alert(pendidikan_id);
        $(".ubah_rjabatan_id").val(id);
        $(".ubah_rjabatan_identitas_id").val(identitas_id);
        $(".ubah_rjabatan_ledger_id").val(ledger_id);
        $(".ubah_rjabatan_spk_id").val(spk_id);
        $(".ubah_rjabatan_no_spk").val(no_spk);
        $(".ubah_rjabatan_tgl_spk").val(tgl_spk);
        $(".ubah_rjabatan_tgl_mulai").val(tgl_mulai);
        $(".ubah_rjabatan_tgl_akhir").val(tgl_akhir);
        $(".ubah_rjabatan_nama_skpd").val(nama_skpd);
        $(".ubah_rjabatan_unit_kerja").val(unit_kerja);
        $(".ubah_rjabatan_jabatan_id").val(jabatan_id);
        $(".ubah_rjabatan_pendidikan_id").val(pendidikan_id);
        $(".ubah_rjabatan_pembayaran").val(pembayaran);
        $(".ubah_rjabatan_tandatangan").val(tandatangan);

    });

    $(document).on("click", '.btn_ubah_rpendidikan', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var identitas_id = $(this).data('identitas_id');
        var ijazah_id = $(this).data('ijazah_id');
        var no_ijazah = $(this).data('no_ijazah');
        var tgl_ijazah = $(this).data('tgl_ijazah');
        var pendidikan_id = $(this).data('pendidikan_id');
        var lembaga_pendidikan = $(this).data('lembaga_pendidikan');
        var gelar_depan = $(this).data('gelar_depan');
        var gelar_belakang = $(this).data('gelar_belakang');

        //alert(pendidikan_id);
        $(".ubah_rpendidikan_id").val(id);
        $(".ubah_rpendidikan_identitas_id").val(identitas_id);
        $(".ubah_rpendidikan_ijazah_id").val(ijazah_id);
        $(".ubah_rpendidikan_no_ijazah").val(no_ijazah);
        $(".ubah_rpendidikan_tgl_ijazah").val(tgl_ijazah);
        $(".ubah_rpendidikan_pendidikan_id").val(pendidikan_id);
        $(".ubah_rpendidikan_lembaga_pendidikan").val(lembaga_pendidikan);
        $(".ubah_rpendidikan_gelar_depan").val(gelar_depan);
        $(".ubah_rpendidikan_gelar_belakang").val(gelar_belakang);

    });

    $(document).on("click", '.btn_hapus', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        $(".hapus_id").val(id);

    });

    $(document).on("click", '.btn_hapus_skpd', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        $(".hapus_id_skpd").val(id);

    });

    $(document).on("click", '.btn_hapus_identitas', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var pendataan_2022 = $(this).data('pendataan_2022');

        $(".hapus_id_identitas").val(id);
        $(".hapus_nama_identitas").val(nama);
        $(".hapus_pendataan_2022").val(pendataan_2022);

    });

    $(document).on("click", '.btn_hapus_jabatan', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        $(".hapus_id_jabatan").val(id);

    });

    $(document).on("click", '.btn_hapus_rjabatan', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var spk_id = $(this).data('spk_id');
        var ledger_id = $(this).data('ledger_id');
        var identitas_id = $(this).data('identitas_id');

        $(".hapus_id_rjabatan").val(id);
        $(".hapus_spk_id").val(spk_id);
        $(".hapus_identitas_id").val(identitas_id);
        $(".hapus_ledger_id").val(ledger_id);


    });

    $(document).on("click", '.btn_hapus_rpendidikan', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var ijazah_id = $(this).data('ijazah_id');
        var identitas_id = $(this).data('identitas_id');

        $(".hapus_id_rpendidikan").val(id);
        $(".hapus_identitas_id").val(identitas_id);
        $(".hapus_ijazah_id").val(ijazah_id);


    });

    $(document).on("click", '.btn_ubah_password', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama = $(this).data('nama');


        $(".ubah_id").val(id);
        $(".ubah_nama").val(nama);

    });

    $(document).on("click", '.btn_ubah_password_user', function(e) {
        //console.log("hallo");
        var id = $(this).data('id');
        var nama = $(this).data('nama');


        $(".ubah_id").val(id);
        $(".ubah_nama").val(nama);

    });

    function myFunction() {
        var nama_pegawai = document.getElementById("nama_pegawai");

        nama_pegawai.value = nama_pegawai.value.toUpperCase();
    }

    function myFunction2() {
        var tempat_lahir = document.getElementById("tempat_lahir");

        tempat_lahir.value = tempat_lahir.value.toUpperCase();
    }
</script>

<script type="text/javascript">
    var aktif = <?= $count_status_aktif; ?>;
    var diangkat = <?= $count_status_diangkat; ?>;
    var pindah = <?= $count_status_pindah; ?>;
    var resign = <?= $count_status_resign; ?>;
    var kelengkapan = <?= $count_kelengkapan; ?>;
    var kelengkapan_tidak = <?= $count_kelengkapan_tidak; ?>;
    var identitas = <?= $count_identitas; ?>;
    var pendataan = <?= $count_pendataan; ?>;
    var thk2 = <?= $count_thk2; ?>;
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['STATUS', 'Jumlah'],
            ['AKTIF', aktif],
            ['BERHENTI BEKERJA', resign],
            ['DIANGKAT PPPK/PNS', diangkat],
            ['PINDAH OPD', pindah],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'STATUS PEGAWAI NON ASN',
            'width': 350,
            'height': 200
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }

    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Pendataaan', 'Jumlah'],
            ['TERDATA NON ASN', pendataan - thk2],
            ['TIDAK TERDATA', identitas - pendataan],
            ['TERDATA THK-II', thk2],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'PENDATAAN NON ASN TAHUN 2022',
            'width': 350,
            'height': 200
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
    }

    function drawChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Pendataaan', 'Jumlah'],
            ['LENGKAP', kelengkapan],
            ['BELUM LENGKAP', kelengkapan_tidak],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'KELENGKAPAN DATA PEGAWAI',
            'width': 350,
            'height': 200
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
    }
</script>
<script>
    const xArray = <?= json_encode($nama_skpd); ?>;
    const yArray = <?= json_encode($jml_pegawai); ?>;

    const data = [{
        x: xArray,
        y: yArray,
        type: "bar"
    }];

    const layout = {
        title: "REKAPITUALSI DATA PEGAWAI NON ASN"
    };

    Plotly.newPlot("chartAdmin", data, layout);
</script>