<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Webprog UAS</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
    <style>
        body {
            font-family: Times New Roman, sans-serif;
            margin: 20px;
        }
        
        /* Menggunakan teknik Float dari materi Week 11 */
        .panel {
            float: left; /* Kotak akan mengambang ke kiri sejajar */
            width: 48%;  /* Membagi layar hampir setengah-setengah */
        }
        
        /* Memberikan jarak antara kotak kiri dan kanan */
        #panel-inisialisasi {
            margin-right: 2%;
        }

        fieldset {
            height: 150px; /* Menyamakan tinggi bingkai */
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            /* Menggunakan inline-block dari materi Week 10 untuk label form */
            display: inline-block;
            width: 120px;
        }
        
        /* Menggunakan clear: both dari materi Week 11 slide 17 */
        /* Berfungsi agar elemen Denah di bawahnya tidak ikut menempel di atas */
        #denah-area {
            clear: both; 
            padding-top: 20px;
        }

        /* Aturan layout Tabel dari materi Week 08 */
        table {
            width: 100%; 
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            border: 1px solid black;
            height: 30px;
            text-align: center;
        }
        
        /* Class CSS untuk warna saat statusnya Unavailable */
        .unavailable {
            background-color: gray;
        }
    </style>
</head>
<body>

    <div class="panel-container">
        <div class="panel" id="panel-inisialisasi">
                <h3>Inisialisasi</h3>
                <br>
                <div class="form-group">
                    <label>Jumlah Baris</label>
                    <input type="number" id="jml-baris" min="1">
                </div>
                <div class="form-group">
                    <label>Jumlah Kolom</label>
                    <input type="number" id="jml-kolom" min="1">
                </div>
                <button id="btn-generate">Generate</button>
        </div>

        <div class="panel" id="panel-okupansi">
                <h3>Okupansi</h3>
                <br>
                <div class="form-group">
                    <label>Baris</label>
                    <input type="number" id="target-baris" min="1">
                </div>
                <div class="form-group">
                    <label>Kolom</label>
                    <input type="number" id="target-kolom" min="1">
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <input type="radio" name="jenis" value="available" checked> Available
                    <input type="radio" name="jenis" value="unavailable"> Unavailable
                </div>
                <button id="btn-simpan">Simpan</button>
        </div>
    </div>

    <div id="denah-area">
        <h3>Denah</h3>
        <div id="table-container">
            </div>
    </div>

    <script>
        $(document).ready(function() {
            
            // 1. Fungsi saat tombol Generate ditekan (Materi Week 13 & Week 08)
            $("#btn-generate").click(function() {
                var baris = $("#jml-baris").val();
                var kolom = $("#jml-kolom").val();

                if (baris > 0 && kolom > 0) {
                    var tableHtml = "<table>";
                    
                    // Melakukan looping untuk membuat baris dan kolom
                    for (var i = 1; i <= baris; i++) {
                        tableHtml += "<tr>";
                        for (var j = 1; j <= kolom; j++) {
                            tableHtml += "<td id='cell-" + i + "-" + j + "'></td>";
                        }
                        tableHtml += "</tr>";
                    }
                    tableHtml += "</table>";
                    
                    // Mencetak html tabel ke dalam div
                    $("#table-container").html(tableHtml);
                } else {
                    alert("Harap masukkan Jumlah Baris dan Jumlah Kolom!");
                }
            });

            // 2. Fungsi saat tombol Simpan ditekan (Materi Week 13 - Client Scripting)
            $("#btn-simpan").click(function() {
                var tBaris = $("#target-baris").val();
                var tKolom = $("#target-kolom").val();
                var jenis = $("input[name='jenis']:checked").val();

                if (tBaris !== "" && tKolom !== "") {
                    // Menyusun ID tujuan (misal: #cell-2-3)
                    var targetId = "#cell-" + tBaris + "-" + tKolom;
                    
                    // Mengubah class sesuai jenis okupansi yang dipilih
                    if (jenis === "unavailable") {
                        $(targetId).addClass("unavailable");
                    } else {
                        $(targetId).removeClass("unavailable");
                    }
                } else {
                    alert("Harap isi input Baris dan Kolom Okupansi!");
                }
            });

        });
    </script>
</body>
</html>