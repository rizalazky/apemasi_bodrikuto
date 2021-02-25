<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../header.css">
  <link rel="stylesheet" href="detail.css">
</head>

<body>
  <!-- <header style="height:300px;">
      Bendungan
  </header> -->


  <?php
  include './../config/koneksi.php';
  // include 'conn.php';
  include 'template/header.php';
  if (!empty($_GET['kode_bendung'])) { ?>

    
    <?php
    include './detail.php';
    ?>
    <?php
    include($_GET['kode_bendung'] . ".php");
  } else { ?>
      <div class='list-bendung-container'>
        <?php $query = mysql_query("SELECT kode,bendung FROM bendung");
        while ($r = mysql_fetch_array($query)) { ?>
          <div class="list-bendung-item">
            <a href="?kode_bendung=<?php echo $r['kode']; ?>" class='list-bendung-card'>
              <img src="../assets/images/mejagong1.jpg" alt="gambarbendung" class='list-bendung-image'>
              <div class='list-bendung-desc'>
                <?php echo $r['bendung']; ?>
              </div>
            </a>
        </div>
      <?php } ?>
        </div>
<?php } ?>

      <script>
        let queryString = window.location.search;
        let UrlParams = new URLSearchParams(queryString)
        let KodeBendung = UrlParams.get('kode_bendung');
        const table = document.getElementsByClassName('table');
        const lokasi = document.getElementsByClassName('lokasi');

        console.log(lokasi)
        let data = []

        function setValueTable() {
          console.log(data)
          for (let i = 0; i < table.length; i++) {
            // console.log(table[i].children[1])
            // console.log(lokasi[i].value)
            let area, qAlir;
            for (let x = 0; x < data.length; x++) {
              if (lokasi[i].value == data[x].lokasi) {
                area = data[x].a_tanam;
                qAlir = data[x].q_diberikan
              }
            }
            table[i].children[1].innerHTML = `
          <tr>
            <td>Areal</td>
            <td>${area}</td>
          </tr>
          <tr>
            <td>Q Alir</td>
            <td>${qAlir}</td>
          </tr>
        `
          }
        }

      
        fetchData()
    
        function fetchData() {
          console.log('test')
          fetch('http://bodrikuto.com/distribusiair/getBendung.php?kode_bendung=' + KodeBendung).
          then(res => {
            return res.json()
          }).then(result => {
            data = result
            console.log('h: ', result)
            setValueTable()
          }).catch(err => console.log(err))
        }
        const select = document.getElementsByTagName('select')

        for (let index = 0; index < select.length; index++) {
          select[index].setAttribute('disabled', true)
          select[index].style.textAlign = 'center'
        }
        const text = document.getElementsByClassName('text')

        for (let index = 0; index < text.length; index++) {
          text[index].setAttribute('contenteditable', false)
          text[index].style.textAlign = 'center'
        }
      </script>

    <!-- <div class="footer">
      Copyright @2021 pemalicomal
    </div> -->
</body>

</html>