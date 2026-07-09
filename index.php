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
        .panel {
            float: left; 
            width: 48%;  
        }
        #panel-inisialisasi {
            margin-right: 2%;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: inline-block;
            width: 120px;
        }
        #denah-area {
            clear: both; 
            padding-top: 20px;
        }

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
                    <input type="radio" name="jenis" value="available"> Available
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
        $(function() {
            $("#btn-generate").click(function() {
                var baris = $("#jml-baris").val();
                var kolom = $("#jml-kolom").val();
                
                var tableHtml = "<table>";
                    for (var i = 1; i <= baris; i++) {
                        tableHtml += "<tr>";
                        for (var j = 1; j <= kolom; j++) {
                            tableHtml += "<td id='cell-" + i + "-" + j + "'></td>";
                        }
                        tableHtml += "</tr>";
                    }
                    tableHtml += "</table>";
                    
                    $("#table-container").html(tableHtml);
            });
            $("#btn-simpan").click(function() {
                var tBaris = $("#target-baris").val();
                var tKolom = $("#target-kolom").val();
                var jenis = $("input[name='jenis']:checked").val();
                
                    var targetId = "#cell-" + tBaris + "-" + tKolom;
                    
                    if (jenis === "unavailable") {
                        $(targetId).addClass("unavailable");
                    } else {
                        $(targetId).removeClass("unavailable");
                    }
            });

        });
    </script>
</body>
</html>