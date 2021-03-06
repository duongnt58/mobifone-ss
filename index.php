<?php
include 'config.php';
$isOK = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        $goi_cuoc = isset($_POST['goi_cuoc']) ? $_POST['goi_cuoc'] : "";
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : "";
        $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : "";
        $ghiChu = isset($_POST['ghi_chu']) ? $_POST['ghi_chu'] : "";
        $timeTs = time();
        $sql = "INSERT INTO customer (goi_cuoc, ten, sdt, dia_chi, created_at, ghi_chu)"
            . " VALUE (:goi_cuoc, :ten, :sdt, :dia_chi, :created_at, :ghi_chu)";
        $stmt = $conn->prepare($sql);
        $data = [
            $goi_cuoc, $name, $sdt, $dia_chi, time()
        ];
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':goi_cuoc', $goi_cuoc);
        $stmt->bindParam(':ten', $name);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':created_at', $timeTs);
        $stmt->bindParam(':ghi_chu', $ghiChu);
        $stmt->execute();
//    echo "New records created successfully";
        $isOK = true;
        $conn = null;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

$isMobile = isMobile();

?>

<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="utf-8" />
    <!-- <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Mobifone</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body <?php if ($isOK) echo "onLoad=\"$('#exampleModal').modal('show');\""?> >
<a id="button" style="text-decoration: none;"></a>
<!-- Navigation -->
<?php if ($isMobile === 1) { ?>
    <!-- <ul class="nav nav-fill bg-blue">
        <li class="nav-item">
            <a class="" href="#">
                <img src="assets/img/logo-ss.png" alt="" class="img-logo-left" />
            </a>
        </li>

        <li class="nav-item">
            <a class="" href="#">
                <img
                        src="assets/img/logo-mbf.png"
                        alt=""
                        class="img-logo-right"
                        alt="Mobifone"
                />
            </a>
        </li>
    </ul> -->
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg  bg-blue static-top navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
          <img src="assets/img/logo-mbf.png" alt="" class="img-logo-right">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#gioi-thieu">Gi???i thi???u ch????ng tr??nh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tra-cuu">Tra c???u</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gioi-thieu-sp">Gi???i thi???u s???n ph???m</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#uu-dai">G??i c?????c</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cau-hoi">C??u h???i th?????ng g???p</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php } else { ?>

<!-- <div class="container ">
    <div class="row bg-blue" style="margin-left: 0px; margin-right: 0px">
        <div class="col-4">
            <a class="" href="#">
                <img src="assets/img/logo-ss.png" alt="" class="img-logo-left" />
            </a>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <a class="" href="#">
                <img
                    src="assets/img/logo-mbf.png"
                    alt=""
                    class="img-logo-right"
                    alt="Mobifone"
                />
            </a>
        </div>
    </div>
</div> -->
<div class="container">
<nav class="navbar navbar-expand-lg  bg-blue static-top navbar-dark">
  <!-- <div class="container"> -->
    <a class="navbar-brand" href="#">
          <img src="assets/img/logo-mbf.png" alt="" class="img-logo-right">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#gioi-thieu">Gi???i thi???u ch????ng tr??nh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tra-cuu">Tra c???u</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gioi-thieu-sp">Gi???i thi???u s???n ph???m</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#uu-dai">G??i c?????c</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cau-hoi">C??u h???i th?????ng g???p</a>
        </li>
      </ul>
    </div>
  <!-- </div> -->
</nav>
</div>
<?php } ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
<!--            <div class="cover-header-background-img">-->
<!--                <div class="cover-header-background-color">-->
<!--                    <div class="title-area">-->
<!--                        <span class="title-header-1"> Smartphone </span>-->
<!--                        <span class="title-header-2"> samsung 4g </span>-->
<!--                        <span class="title-header-3"> Ch??? c??n </span>-->
<!--                        <span class="title-header-4"> 1.290.000 <sup>(*)</sup> </span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <img src="/assets/img/img-cover-header.png" alt="" class="img-fluid">
        </div>

    </div>
    <div class="row bg-middle">
        <div class="col-12" id="gioi-thieu">
            <h3 class="">gi???i thi???u ch????ng tr??nh:</h3>
            <p class="text-justify">
                V???i s??? m???nh l?? nh?? cung c???p h??? t???ng s??? v?? d???ch v??? s??? h??ng ?????u Vi???t Nam, th??c ?????y nhanh qu?? tr??nh chuy???n ?????i s??? qu???c gia c???a Ch??nh ph???, MobiFone tri???n khai ch????ng tr??nh h??? tr??? chuy???n ?????i ??i???n tho???i l??n smartphone d??nh ri??ng cho c??c kh??ch h??ng l?? thu?? bao MobiFone.
            </p>
        </div>
        <!--        <div class="col-8 offset-4">-->
        <!--            <h3 class="text-right">??U ??I???M S???N PH???M</h3>-->
        <!--            <p class="text-right">-->
        <!--                Tr???i nghi???m thi???t b??? Galaxy th??m t???i ??u v???i ???ng d???ng Samsung-->
        <!--                Members. V???i kh??? n??ng h??? tr??? v?? ch???n ??o??n t??nh tr???ng thi???t b???, g???i-->
        <!--                c??c b??o c??o l???i v?? y??u c???u tr??? gi??p, ???ng d???ng Samsung Members gi??p-->
        <!--                thi???t b??? Galaxy c???a b???n v???n h??nh c??ch t???i ??u h??n, mang ?????n tr???i-->
        <!--                nghi???m ng?????i d??ng ho??n h???o h??n.-->
        <!--            </p>-->
        <!--        </div>-->
<!--        <div class="col-12" >-->
<!--            <h2 class="text-center">Thi???t K??? Hi???n ?????i, Nh??? G???n</h2>-->
<!--        </div>-->
<!--        <div class="col-12 col-md-6">-->
<!--            <img src="assets/img/img-phone-ss.png" alt="" class="img-fluid" />-->
<!--        </div>-->
<!--        <div class="col-12 col-md-6">-->
<!--            <table class="table borderless">-->
<!--                <tbody style="line-height: 8px;">-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">T???ng quan</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Lo???i ??i???n tho???i</td>-->
<!--                    <td class="align-middle">SmartPhone</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">Sim</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Lo???i sim</td>-->
<!--                    <td class="align-middle">Nano Sim</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">S??? sim</td>-->
<!--                    <td class="align-middle">Hai Sim</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">M??n h??nh</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">K??ch th?????c m??n h??nh</td>-->
<!--                    <td class="align-middle">5.3 inch</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Lo???i m??n h??nh</td>-->
<!--                    <td class="align-middle">16 tri???u m??u</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">????? ph??n gi???i m??n h??nh</td>-->
<!--                    <td class="align-middle">720 x 1480 pixels</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">C??ng ngh??? c???m ???ng</td>-->
<!--                    <td class="align-middle">C???m ???ng ??i???n dung ??a ??i???m</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">????? l???n m??n h??nh</td>-->
<!--                    <td class="align-middle">Tr??n 5 inches</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">CPU</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">H??? ??i???u h??nh</td>-->
<!--                    <td class="align-middle">Android 10</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">T???c ????? CPU</td>-->
<!--                    <td class="align-middle">Quad-core 1.5 GHz Cortex-A53</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
    </div>
    <div class="row tra-cuu" id="tra-cuu">
        <div class="col-10 offset-1">
            <h3>Tra c???u</h3>
            <p>
                Vui l??ng tra c???u ????? xem b???n c?? ????? ??i???u ki???n tham d??? ch????ng tr??nh
                kh??ng
            </p>
            <div class="form-tra-cuu">
                <div class="form-inline">
                    <div class="form-group mb-2">NH???P S??? THU?? BAO</div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input
                                type="text"
                                class="form-control"
                                id="inputMsisdn"
                                placeholder=""
                        />
                    </div>
                    <button type="" class="btn btn-primary mb-2" id='btn-tra-cuu'>
                        TRA C???U
                    </button>
                    <div id="loadinggg">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row ss-core-properties-main" id='gioi-thieu-sp'>
        <div class="col-lg-12 text-center">
            <div class="ss-core">
                <img src="assets/img/img-ss-core.png" alt="" class="img-fluid" />
                <div class="title-ss-core">
                    <h3>Samsung Galaxy</h3>
                    <h3>A01 CORE 2GB</h3>
                </div>
                <div class="price-ss-core" <?php if($isMobile) { echo 'style="padding-top: 15px;"'; }?>>
                    <span style="text-decoration-line: line-through;
  -webkit-text-decoration-line: line-through;
  text-decoration-color: red;
  -webkit-text-decoration-color: red;;  font-size: 22px;padding-top: 5px">2.290.000</span>
					<h3 style="text-decoration-line: none;">1.290.000 </h3>
                    <span><sup>(*)</sup> khi mua k??m g??i c?????c c???a mobifone</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>T???c ????? CPU</h4>
            <h3>1.5GHz</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Camera ch??nh - ????? ph??n gi???i</h4>
            <h3>8.0 MP</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Tr???ng l?????ng (g)</h4>
            <h3>150g</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Th???i gian ph??t Audio (Gi???)</h4>
            <h3>L??n t???i 70 gi???</h3>
        </div>
    </div>
    <div class="row img-container text-center">
        <div class="col-12 col-md-3 p-3">
            <img src="assets/img/img-gioi-thieu.png" alt="" class="img-fluid" onClick="actionClickImg('gioi-thieu')"/>
        </div>
        <div class="col-12 col-md-3 p-3 ">
            <img src="assets/img/img-tra-cuu.png" alt="" class="img-fluid img-container-small" onClick="actionClickImg('tra-cuu')"/>
        </div>
        <div class="col-12 col-md-3 p-3 ">
            <img src="assets/img/img-uu-diem.png" alt="" class="img-fluid img-container-small" onClick="actionClickImg('uu-diem')"/>
        </div>
        <div class="col-12 col-md-3 p-3">
            <img
                src="assets/img/img-goi-cuoc-uu-dai.png"
                alt=""
                class="img-fluid" onClick="actionClickImg('uu-dai')"
            />
        </div>
    </div>

    <div class="row phone-detail" >
        <div class="col-12" id="uu-diem">
            <h3>Ghi L???i Tr???n V???n M???i Kho???nh Kh???c</h3>
            <img src="assets/img/img-phone-camera.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12">
            <h3>T???i ??u Hi???u Su???t Ho???t ?????ng</h3>
            <div class="col-10 offset-1">
                <p>
                    H??? ??i???u h??nh Android (Phi??n b???n Go) gi??p b??? nh??? lu??n ???????c t???i ??u v???i c??c ???ng d???ng t??y ch???nh ???????c c??i ?????t tr?????c, h??? tr??? s??? d???ng nhanh ch??ng v?? d??? d??ng Galaxy A01 Core. Tr???i nghi???m hi???u n??ng m?????t m?? v???i 2GB RAM v?? b??? nh??? trong ???n t?????ng 32GB.
                </p>
            </div>
        </div>
        <div class="col-12">
            <img src="assets/img/img-phone-view.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12">
            <h3>Pin B???n B???</h3>
            <div class="col-10 offset-1">
                <p>
                    Gi???i tr?? b???t t???n v???i dung l?????ng pin b???n b??? 3,000mAh (Ti??u chu???n)
                    tr??n Galaxy A01 Core. Cho b???n tho???i m??i t???p trung l??m ??i???u y??u
                    th??ch, ki???n t???o tr???i nghi???m li???n m???ch h??n.
                </p>
            </div>
        </div>
        <div class="col-12">
            <img src="assets/img/img-run-slepp.png" alt="" class="img-fluid" />
        </div>
    </div>
    <div class="row bg-middle">
        <!--            <div class="col-12">-->
        <!--                <h3 class="">gi???i thi???u ch????ng tr??nh:</h3>-->
        <!--                <p class="text-justify">-->
        <!--                    V???i s??? m???nh l?? nh?? cung c???p h??? t???ng s??? v?? d???ch v??? s??? h??ng ?????u Vi???t Nam, th??c ?????y nhanh qu?? tr??nh chuy???n ?????i s??? qu???c gia c???a Ch??nh ph???, MobiFone tri???n khai ch????ng tr??nh h??? tr??? chuy???n ?????i ??i???n tho???i l??n smartphone d??nh ri??ng cho c??c kh??ch h??ng l?? thu?? bao MobiFone.-->
        <!--                </p>-->
        <!--            </div>-->
        <!--        <div class="col-8 offset-4">-->
        <!--            <h3 class="text-right">??U ??I???M S???N PH???M</h3>-->
        <!--            <p class="text-right">-->
        <!--                Tr???i nghi???m thi???t b??? Galaxy th??m t???i ??u v???i ???ng d???ng Samsung-->
        <!--                Members. V???i kh??? n??ng h??? tr??? v?? ch???n ??o??n t??nh tr???ng thi???t b???, g???i-->
        <!--                c??c b??o c??o l???i v?? y??u c???u tr??? gi??p, ???ng d???ng Samsung Members gi??p-->
        <!--                thi???t b??? Galaxy c???a b???n v???n h??nh c??ch t???i ??u h??n, mang ?????n tr???i-->
        <!--                nghi???m ng?????i d??ng ho??n h???o h??n.-->
        <!--            </p>-->
        <!--        </div>-->
        <div class="col-12" >
            <h2 class="text-center">Thi???t K??? Hi???n ?????i, Nh??? G???n</h2>
        </div>
        <div class="col-12 col-md-6">
            <img src="assets/img/img-phone-ss.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12 col-md-6">
            <table class="table borderless">
                <tbody <?php if (!$isMobile) {echo 'style="line-height: 8px;"'; } else { echo 'line-height: 14px;';} ?>
                <tr>
                    <th scope="row" class="align-middle">T???ng quan</th>
                </tr>
                <tr>
                    <td class="align-middle">Lo???i ??i???n tho???i</td>
                    <td class="align-middle">SmartPhone</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">Sim</th>
                </tr>
                <tr>
                    <td class="align-middle">Lo???i sim</td>
                    <td class="align-middle">Nano Sim</td>
                </tr>
                <tr>
                    <td class="align-middle">S??? sim</td>
                    <td class="align-middle">Hai Sim</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">M??n h??nh</th>
                </tr>
                <tr>
                    <td class="align-middle">K??ch th?????c m??n h??nh</td>
                    <td class="align-middle">5.3 inch</td>
                </tr>
                <tr>
                    <td class="align-middle">Lo???i m??n h??nh</td>
                    <td class="align-middle">16 tri???u m??u</td>
                </tr>
                <tr>
                    <td class="align-middle">????? ph??n gi???i m??n h??nh</td>
                    <td class="align-middle">720 x 1480 pixels</td>
                </tr>
                <tr>
                    <td class="align-middle">C??ng ngh??? c???m ???ng</td>
                    <td class="align-middle">C???m ???ng ??i???n dung ??a ??i???m</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">CPU</th>
                </tr>
                <tr>
                    <td class="align-middle">H??? ??i???u h??nh</td>
                    <td class="align-middle">Android 10</td>
                </tr>
                <tr>
                    <td class="align-middle">T???c ????? CPU</td>
                    <td class="align-middle">Quad-core 1.5 GHz Cortex-A53</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row list-goi-cuoc" id="uu-dai">
        <div class="col-12 text-center">
            <h3>g??i c?????c ??u ????i</h3>
        </div>
        <div class="col-12 text-center table-responsive">
            <table class="table table-bordered text-light">
                <thead>
                <tr
                    style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                >
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >STT</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >T??n g??i</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >M?? g??i</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Gi?? g??i</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Dung l?????ng g??i/chu k??? 31 ng??y</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >??i???u ki???n mua g??i</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="align-middle">1</th>
                    <td class="align-middle">G??i c?????c tr???i nghi???m</td>
                    <td class="align-middle">TNSP</td>
                    <td class="align-middle">Mi???n ph??</td>
                    <td class="align-middle">5GB, h???t dung l?????ng ng???t k???t n???i</td>
                    <td class="align-middle" rowspan="4" style="text-align: left">-	Thu?? bao MobiFone hi???n ??ang s??? d???ng ??i???n tho???i feature phone v?? th???c hi???n chuy???n ?????i l??n smartphone theo ch????ng tr??nh n??y.
                        <br>
                        -	Ri??ng c??c g??i c?????c MF50KH, MF120KH, MF200KH d??nh ri??ng cho thu?? bao tr??? sau MobiF (kh??ng c?????c thu?? bao)
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">2</th>
                    <td class="align-middle">G??i c?????c data smartphone</td>
                    <td class="align-middle">SP50, SP50KH, MF50KH</td>
                    <td class="align-middle">50.000</td>
                    <td class="align-middle">5GB, h???t dung l?????ng ng???t k???t n???i</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">3</th>
                    <td class="align-middle">G??i c?????c Combo smartphone 1 </td>
                    <td class="align-middle">SP120, SP120KH, MF120KH</td>
                    <td class="align-middle">120.000</td>
                    <td class="align-middle text-left">
                        + Mi???n ph?? cu???c g???i n???i m???ng d?????i 10 ph??t (T???i ??a 1.000 ph??t)<br/>
                        + 50 ph??t cu???c g???i ngo???i m???ng <br/>
                        + Data: 1GB/ng??y <br/>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">4</th>
                    <td class="align-middle">G??i c?????c Combo smartphone 2</td>
                    <td class="align-middle">SP200, SP200KH, MF200KH</td>
                    <td class="align-middle">200.000</td>
                    <td class="align-middle text-left">
                        + Mi???n ph?? cu???c g???i n???i m???ng d?????i 20 ph??t (T???i ??a 1.000 ph??t)<br/>
                        + 100 ph??t cu???c g???i ngo???i m???ng <br/>
                        + Data: 2GB/ng??y
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 text-center">
            <h3>Gi?? b??n m??y</h3>
        </div>
        <div class="col-12 text-center table-responsive">
            <table class="table table-bordered text-light">
                <thead>
                <tr
                        style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                >
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >STT</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >T???p thu?? bao</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Gi?? b??n m??y</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >??i???u ki???n t???i thi???u</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="align-middle">1</th>
                    <td class="align-middle">FF1</td>
                    <td class="align-middle">1.290.000</td>
                    <td class="align-middle" style="text-align: left">- Thu?? bao MobiFone ??ang s??? d???ng ??i???n tho???i feature phone, ???? h??a m???ng tr??n 1 n??m, ch??a s??? d???ng c??c g??i c?????c data c???a MobiFone (theo danh s??ch c???a MobiFone)
                        <br>
                        - Kh??ch h??ng ?????ng t??n ch??nh ch??? thu?? bao khi mua m??y. <br>
                        - Cam k???t s??? d???ng 12 th??ng m???t trong c??c g??i c?????c: SP50KH, SP120KH, SP200KH, MF50KH, MF120KH, MF200KH.
                        <br>
                        - M???i KH ???????c mua t???i ??a 01 m??y theo m???c gi?? ??u ????i n??y.
                    </td>

                </tr>
                <tr>
                    <th scope="row" class="align-middle">2</th>
                    <td class="align-middle">FF2</td>
                    <td class="align-middle">1.790.000</td>
                    <td class="align-middle" style="text-align: left">- Thu?? bao MobiFone ??ang s??? d???ng ??i???n tho???i feature phone (theo danh s??ch c???a MobiFone).
                        <br>
                        - Kh??ch h??ng ?????ng t??n ch??nh ch??? thu?? bao khi mua m??y. <br>
                        - ????ng k?? s??? d???ng m???t trong c??c g??i c?????c: TNSP, SP50, SP120, SP200.
                    </td>
                </tr>
                </tbody>
            </table>
           <div style="text-align: left; color: #fff; font-weight: bold; padding-bottom: 10px">
               (*) Gi?? b??n m??y ni??m y???t c???a h??ng: 2.290.000 ?????ng.
           </div>
        </div>
    </div>
    <div class="row faq" id='cau-hoi'>
        <div class="col-12">
            <h3>C??u h???i th?????ng g???p</h3>
        </div>
        <div class="row" id="cau-hoi-collapse">
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse1" role="button" aria-expanded="false" aria-controls="multiCollapse1" >1. ?????I T?????NG THAM GIA CH????NG TR??NH?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse1" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Thu?? bao MobiFone ??ang s??? d???ng ??i???n tho???i feature phone
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse2" role="button" aria-expanded="false" aria-controls="multiCollapse2">
                            2. L??m th??? n??o ????? t??i bi???t m??nh ????? ??i???u ki???n tham gia ch????ng tr??nh?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse2" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Kh??ch h??ng c?? th??? t??? tra c???u ho???c tra c???u cho ng?????i nh??n t???i m???c Tra c???u tr??n page ho???c nh???n tin theo c?? ph??p [S??? ??i???n tho???i] g???i 9129
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse3" role="button" aria-expanded="false" aria-controls="multiCollapse3">
                            3. Khi mua ??i???n tho???i v???i gi?? 1.290.000, t??i c?? c???n cam k???t g?? kh??ng? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse3" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    C??, Kh??ch h??ng c???n cam k???t s??? d???ng 12 th??ng g??i c?????c c???a MobiFone. ????? ki???m so??t vi???c n??y, kh??ch h??ng c???n ?????ng ?? cho MobiFone c??i ?????t ph???n m???m KNOX c???a Samsung (ph???n m???m s??? t??? ?????ng ???????c g??? sau khi kh??ch h??ng ho??n th??nh cam k???t).
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse4" role="button" aria-expanded="false" aria-controls="multiCollapse4">
                            4. Khi mua ??i???n tho???i v???i gi?? 1.790.000, t??i c?? c???n cam k???t g?? kh??ng? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse4" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Kh??ng, Kh??ch h??ng khi ???? ???????c t???ng g??i TNSP (mi???n ph?? 5GB t???i ????? cao trong 1 th??ng). H???t th???i gian khuy???n m???i, kh??ch h??ng ???????c ??u ti??n ????ng k?? g??i 5GB v???i gi?? 50.000??, h???t l??u l?????ng d???ng truy c???p.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse5" role="button" aria-expanded="false" aria-controls="multiCollapse5">
                            5. M??Y SAMSUNG A01 CORE C???A MOBIFONE KH??C G?? SO V???I PHI??N B???N C???A TH??? TR?????NG?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse5" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    M??y Samsung A01 Core c???a Mobifone l?? phi??n b???n ?????c quy???n Samsung d??nh cho Mobifone ????? tri???n khai ch????ng tr??nh ?????i m??y v???i b??? nh??? RAM 2Gb, gi??p m??y m???nh m??? h??n, kh??ch h??ng c?? th??? tr???i nghi???m t???t v?? m?????t m?? h??n
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse6" role="button" aria-expanded="false" aria-controls="multiCollapse6">
                            6. M??Y SAMSUNG A01 CORE 2GB ???????C B???O H??NH BAO L??U?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse6" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    S???n ph???m ???????c b???o h??nh ch??nh h??ng 12 th??ng t???i t???t c??? c??c TTBH to??n qu???c c???a Samsung. Kh??ch h??ng c?? th??? li??n h??? c??c c???a h??ng Mobifone g???n Nh???t ????? ???????c h??? tr???
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse7" role="button" aria-expanded="false" aria-controls="multiCollapse7">
                            7. T??I C?? TH??? T??M MUA M??Y SAMSUNG A01 CORE 2GB T???I ????U? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse7" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    => Kh??ch h??ng c?? th??? li??n h??? mua m??y t???i c??c c???a h??ng MobiFone ho???c ????? l???i th??ng tin t???i ph???n d?????i ????? ???????c h??? tr???.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<div class="container footer">
    <div class="row">
        <div class="col-12 col-md-7" id="contact">
            <h3>
                XIN VUI L??NG ????? L???I TH??NG TIN N???U ANH/CH??? ???? CH???N ???????C G??I C?????C PH??
                H???P HO???C C???N CH??NG T??I T?? V???N TH??M
            </h3>
            <form method="post" action="index.php">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Email address</label> -->
<!--                            <select class="form-control" id="selectGoiCuoc" name="goi_cuoc">-->
<!--                                <option value="0">Ch???n g??i c?????c</option>-->
<!--                                <option value="G??i c?????c tr???i nghi???m">G??i c?????c tr???i nghi???m</option>-->
<!--                                <option value="G??i c?????c data smartphone">G??i c?????c data smartphone</option>-->
<!--                                <option value="G??i c?????c combo smartphone 1">G??i c?????c combo smartphone 1</option>-->
<!--                                <option value="G??i c?????c combo smartphone 2">G??i c?????c combo smartphone 2</option>-->
<!--                                <option value="TNSP">TNSP</option>-->
<!--                                <option value="SP50KH">SP50KH</option>-->
<!--                                <option value="SP120KH">SP120KH</option>-->
<!--                                <option value="SP200KH">SP200KH</option>-->
<!--                                <option value="MF50KH">MF50KH</option>-->
<!--                                <option value="MF120KH">MF120KH</option>-->
<!--                                <option value="MF200KH">MF200KH</option>-->
<!--                                <option value="SP50">SP50</option>-->
<!--                                <option value="SP120">SP120</option>-->
<!--                                <option value="SP200">SP200</option>-->
<!--                            </select>-->
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Email address</label> -->
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id=""
                                aria-describedby="emailHelp"
                                placeholder="T??N C???A B???N"
                            />
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1">Password</label> -->
                            <input
                                type="text"
                                name="sdt"
                                class="form-control"
                                id=""
                                aria-describedby="emailHelp"
                                placeholder="S??? ??I???N THO???I"
                            />
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1">Password</label> -->
                            <input
                                type="text"
                                name="dia_chi"
                                class="form-control"
                                id=""
                                aria-describedby="emailHelp"
                                placeholder="?????A CH???"
                            />
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1">Password</label> -->
                           <!-- <input
                                    type="text"
                                    name="ghi-chu"
                                    class="form-control"
                                    id=""
                                    aria-describedby="emailHelp"
                                    placeholder="Ghi ch?? cho MobiFone"
                            />-->
                            <textarea  name="ghi_chu" class="form-control" aria-label=""  placeholder="Ghi ch?? cho MobiFone"></textarea>
                        </div>
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div> -->
                    </div>
                    <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-primary">G???i</button>
                    </div>
                </div>
            </form>
            <h3>MOBIFONE H??N H???NH ???????C PH???C V??? QU?? KH??CH</h3>
        </div>
        <div class="col-12 col-md-5 bg-lien-he">
            <div class="row">
                <div class="col-12 p-4">
                    <h4 class="text-center">TH??NG TIN LI??N H???:</h4>
                    <ul>
                        <li><i class="fas fa-globe text-light"></i> WWW.MOBIFONE.VN</li>
                        <li>
                            <i class="fas fa-store-alt text-light"></i> SHOP.MOBIFONE.VN
                        </li>
                        <li><i class="fas fa-phone-alt text-light"></i> 9090</li>
                    </ul>
                    <h5>
                        T???ng C??ng Ty Vi???n Th??ng MobiFone
                    </h5>
                    <h5>
                        C??ng Ty C??? Ph???n D???ch V??? Gia T??ng MobiFone
                    </h5>
                </div>
                <div class="col-6 d-none d-md-block d-lg-block">
                    <hr style="color: #fff;
    border-top: 1px solid #fff !important;
    bottom: -40px;
    position: relative;
    margin-left: 18px;">
                </div>
                <div class="col-6 offset-6 d-none d-md-block d-lg-block">
                    <img src="assets/img/logo-mbf.png" alt="" class="img-fluid" />
                </div>
                <div class="col-6 offset-3 d-block d-md-none d-lg-none">
                    <img src="assets/img/logo-mbf.png" alt="" class="img-fluid" />
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
<!--    Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Th??ng b??o!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-danger">
                Th??ng tin c???a b???n ???? ???????c ghi nh???n th??nh th??ng.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-FF1">-->
<!--    Launch demo modal-->
<!--</button>-->

<!-- Modal FF1 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">G??I C?????C ??U ????I</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">L???A CH???N G??I C?????C CAM K???T ????NG K??</h3>
                    <a href="" style="color: #fff" data-toggle="modal" data-target="#modal-full-goi-cuoc">(Click v??o ????y ????? xem chi ti???t g??i c?????c)</a>
                </div>
                <table class="table table-bordered text-light">
                    <thead>
                    <tr
                            style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                    >
                        <th scope="col" class="align-middle">T??n g??i</th>
                        <th scope="col" class="align-middle" class="FF1-SP50KH">SP50KH</th>
                        <th scope="col" class="align-middle" class="FF1-SP120KH">SP120KH</th>
                        <th scope="col" class="align-middle" class="FF1-SP200KH">SP200KH</th>
                        <th scope="col" class="align-middle" class="FF1-MF50KH">MF50KH</th>
                        <th scope="col" class="align-middle" class="FF1-MF120KH">MF120KH</th>
                        <th scope="col" class="align-middle" class="FF1-MF200KH">MF200KH</th>
                        <th scope="col" class="align-middle" class="FF1-SP50">SP50</th>
                        <th scope="col" class="align-middle" class="FF1-SP120">SP120</th>
                        <th scope="col" class="align-middle" class="FF1-SP200">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">Gi?? b??n</td>
                        <td class="align-middle" class="FF1-SP50KH">1,290,000</td>
                        <td class="align-middle" class="FF1-SP120KH">1,290,000</td>
                        <td class="align-middle" class="FF1-SP200KH">1,290,000</td>
                        <td class="align-middle" class="FF1-MF50KH">1,290,000</td>
                        <td class="align-middle" class="FF1-MF120KH">1,290,000</td>
                        <td class="align-middle" class="FF1-MF200KH">1,290,000</td>
                        <td class="align-middle" class="FF1-SP50">1,790,000</td>
                        <td class="align-middle" class="FF1-SP120">1,790,000</td>
                        <td class="align-middle" class="FF1-SP200">1,790,000</td>
                    </tr>
                    <tr>
                        <td class="align-middle"><button type="button" class="btn btn-warning text-danger font-weight-bold " onclick="actionMuaNgay('NULL')" disabled="" style="
    visibility: hidden;
">
                                Mua ngay
                            </button></td>
                        <td class="align-middle" class="FF1-SP50KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-SP120KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-SP200KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP200KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-MF50KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('MF50KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-MF120KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('MF120KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-MF120KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('MF120KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-SP50">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-SP120">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF1-SP200">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP200')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
            </div>
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>-->
<!--            </div>-->
        </div>
    </div>
</div>

<!-- Modal FF2 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">G??I C?????C ??U ????I</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                    <span aria-hidden="true">&times;</span>-->
            <!--                </button>-->
            <!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">L???A CH???N G??I C?????C CAM K???T ????NG K??</h3>
                    <a href="" style="color: #fff" data-toggle="modal" data-target="#modal-full-goi-cuoc">(Click v??o ????y ????? xem chi ti???t g??i c?????c)</a>
                </div>
                <table class="table table-bordered text-light">
                    <thead>
                    <tr
                            style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                    >
                        <th scope="col" class="align-middle">T??n g??i</th>
                        <th scope="col" class="align-middle" class="FF2-SP50">SP50</th>
                        <th scope="col" class="align-middle" class="FF2-SP120">SP120</th>
                        <th scope="col" class="align-middle" class="FF2-SP200">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">Gi?? b??n</td>
                        <td class="align-middle" class="FF2-SP50">1,790,000</td>
                        <td class="align-middle" class="FF2-SP120">1,790,000</td>
                        <td class="align-middle" class="FF2-SP200">1,790,000</td>
                    </tr>
                    <tr>
                        <td class="align-middle"><button type="button" class="btn btn-warning text-danger font-weight-bold" onclick="actionMuaNgay('NULL')" disabled="" style="
    visibility: hidden;
">
                                Mua ngay
                            </button></td>
                        <td class="align-middle" class="FF2-SP50">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF2-SP120">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle" class="FF2-SP200">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP200')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>-->
            <!--            </div>-->
        </div>
    </div>
</div>

<!-- Modal FF3 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">G??I C?????C ??U ????I</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                    <span aria-hidden="true">&times;</span>-->
            <!--                </button>-->
            <!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">L???A CH???N G??I C?????C CAM K???T ????NG K??</h3>
                    <a href="" style="color: #fff" data-toggle="modal" data-target="#modal-full-goi-cuoc">(Click v??o ????y ????? xem chi ti???t g??i c?????c)</a>
                </div>
                <table class="table table-bordered text-light">
                    <thead>
                    <tr
                            style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                    >
                        <th scope="col" class="align-middle">T??n g??i</th>
                        <th scope="col" class="align-middle">SP50</th>
                        <th scope="col" class="align-middle">SP120</th>
                        <th scope="col" class="align-middle">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">Gi?? b??n</td>
                        <td class="align-middle">1,990,000</td>
                        <td class="align-middle">1,990,000</td>
                        <td class="align-middle">1,990,000</td>
                    </tr>
                    <tr>
                        <td class="align-middle"><button type="button" class="btn btn-warning text-danger font-weight-bold" onclick="actionMuaNgay('NULL')" disabled="" style="
    visibility: hidden;
">
                                Mua ngay
                            </button></td>
                        <td class="align-middle">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="align-middle">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP200')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>-->
            <!--            </div>-->
        </div>
    </div>
</div>
<!--Chi ti???t g??i c?????c-->
<div class="modal fade bd-example-modal-lg" id="modal-full-goi-cuoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">MUA M??Y K??M G??I C?????C ??U ????I</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">L???A CH???N G??I C?????C CAM K???T ????NG K??</h3>
                    <p>
                        <br>
                        Ch?? Th??ch :(*)??u ????i h??ng th??ng

                    </p>
                    <p style="color: #c6b9b9">
                        ??i???u ki???n 1 : Kh??ch h??ng l?? thu?? bao MobiFone ??ang s??? d???ng ??i???n tho???i feature phone (bao g???m TBTT v?? TBTS).
                        <br>
                        ??i???u ki???n 2 : Kh??ch h??ng l?? thu?? bao MobiFone ??ang s??? d???ng ??i???n tho???i feature phone; l?? TBTS MobiF.
                    </p>
                </div>
                <table class="table table-bordered text-light">
                    <thead>
                    <tr
                            style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                    >
                        <th scope="col" class="align-middle">T??n g??i c?????c (*)</th>
                        <th scope="col" class="align-middle">TNSP</th>
                        <th scope="col" class="align-middle">SP50KH</th>
                        <th scope="col" class="align-middle">SP120KH</th>
                        <th scope="col" class="align-middle">SP200KH</th>
                        <th scope="col" class="align-middle">MF50KH</th>
                        <th scope="col" class="align-middle">MF120KH</th>
                        <th scope="col" class="align-middle">MF200KH</th>
                        <th scope="col" class="align-middle">SP50</th>
                        <th scope="col" class="align-middle">SP120</th>
                        <th scope="col" class="align-middle">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="align-middle">Lo???i thu?? bao</th>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                        <td class="align-middle">Thu?? bao hi???n h???u</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Tho???i n???i m???ng (*)</th>
                        <td class="align-middle">...</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">mi???n ph?? d?????i 20 ph??t</td>
                        <td class="align-middle">mi???n ph?? d?????i 20 ph??t</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">mi???n ph?? d?????i 20 ph??t</td>
                        <td class="align-middle">mi???n ph?? d?????i 20 ph??t</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">mi???n ph?? d?????i 20 ph??t</td>
                        <td class="align-middle">mi???n ph?? d?????i 20 ph??t</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle"> Tho???i ngo??i m???ng (*)</th>
                        <td class="align-middle">...</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">50 ph??t</td>
                        <td class="align-middle">100 ph??t</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">50 ph??t</td>
                        <td class="align-middle">100 ph??t</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">50 ph??t</td>
                        <td class="align-middle">100 ph??t</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle"> Data (*)</th>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">1Gb/ng??y</td>
                        <td class="align-middle">2Gb/ng??y</td>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">1Gb/ng??y</td>
                        <td class="align-middle">2Gb/ng??y</td>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">1Gb/ng??y</td>
                        <td class="align-middle">2Gb/ng??y</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Gi?? g??i c?????c/th??ng (Ch??a bao g???m c?????c thu?? bao)</th>
                        <td class="align-middle">Chu k??? ?????u: 0??.<br>
                            Chu k??? ti???p theo: 50.000??</td>
                        <td class="align-middle">50.000??</td>
                        <td class="align-middle">120.000??</td>
                        <td class="align-middle">200.000</td>
                        <td class="align-middle">50.000??</td>
                        <td class="align-middle">120.000??</td>
                        <td class="align-middle">200.000</td>
                        <td class="align-middle">50.000??</td>
                        <td class="align-middle">120.000??</td>
                        <td class="align-middle">200.000</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">S??? chu k??? cam k???t</th>
                        <td class="align-middle">...</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                        <td class="align-middle">12 th??ng</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">??i???u ki???n</th>
                        <td class="align-middle">??i???u ki???n 1</td>
                        <td class="align-middle">??i???u ki???n 1</td>
                        <td class="align-middle">??i???u ki???n 1</td>
                        <td class="align-middle">??i???u ki???n 1</td>
                        <td class="align-middle">??i???u ki???n 2</td>
                        <td class="align-middle">??i???u ki???n 2</td>
                        <td class="align-middle">??i???u ki???n 2</td>
                        <td class="align-middle">??i???u ki???n 1</td>
                        <td class="align-middle">??i???u ki???n 1</td>
                        <td class="align-middle">??i???u ki???n 1</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">C??i ?????t ph???n m???m KNOX</th>
                        <td class="align-middle"></td>
                        <td class="align-middle">C??</td>
                        <td class="align-middle">C??</td>
                        <td class="align-middle">C??</td>
                        <td class="align-middle">C??</td>
                        <td class="align-middle">C??</td>
                        <td class="align-middle">C??</td>
                        <td class="align-middle">Kh??ng</td>
                        <td class="align-middle">Kh??ng</td>
                        <td class="align-middle">Kh??ng</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">????ng k?? g??i</th>
                        <td class="align-middle">TNSP ho???c DK TNSP g???i 999 ho???c qua c???a h??ng MobiFone</td>
                        <td class="align-middle">SP50KH ho???c DK SP50KH g???i 999 ho???c qua c???a h??ng MobiFone</td>
                        <td class="align-middle">SP120KH ho???c DK SP120KH g???i 999 ho???c qua c???a h??ng MobiFone</td>
                        <td class="align-middle">SP200KH ho???c DK SP200KH g???i 999 ho???c qua c???a h??ng MobiFone</td>
                        <td class="align-middle">Qua c???a h??ng MobiFone</td>
                        <td class="align-middle">Qua c???a h??ng MobiFone</td>
                        <td class="align-middle">Qua c???a h??ng MobiFone</td>
                        <td class="align-middle">SP50KH ho???c DK SP50KH g???i 999 ho???c qua c???a h??ng MobiFone</td>
                        <td class="align-middle">SP120KH ho???c DK SP120KH g???i 999 ho???c qua c???a h??ng MobiFone</td>
                        <td class="align-middle">SP200KH ho???c DK SP200KH g???i 999 ho???c qua c???a h??ng MobiFone</td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
            </div>
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>-->
<!--            </div>-->
        </div>
    </div>
</div>

<!-- Modal FF -->
<div class="modal fade bd-example-modal-lg" id="modal-FF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">G??I C?????C ??U ????I</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                    <span aria-hidden="true">&times;</span>-->
            <!--                </button>-->
            <!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">

                    <div id="content-ff" style="color:#fff"></div>
                    <br>
                    <div id="content-fff" style="color:#fff"></div>
                    <br>
                    <h3 style="color: #fff">Th??ng tin g??i  c?????c c???a MBF:</h3>
                </div>
                <table class="table table-bordered text-light">
                    <thead>
                    <tr
                            style="
                  background-image: linear-gradient(
                    to right,
                    rgb(228, 228, 0),
                    rgb(253, 114, 0)
                  );
                "
                    >
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >STT</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >T??n g??i</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >M?? g??i</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Gi?? g??i</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Dung l?????ng g??i</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >??i???u ki???n</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;">H???n s??? d???ng g??i c?????c</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="align-middle">1</th>
                        <td class="align-middle">G??i c?????c tr???i nghi???m</td>
                        <td class="align-middle">TNSP</td>
                        <td class="align-middle">0</td>
                        <td class="align-middle">5GB, h???t dung l?????ng ng???t k???t n???i</td>
                        <td class="align-middle">M???t thu?? bao ???????c s??? d???ng t???i ??a 01 l???n g??i TNSP</td>
                        <td class="align-middle" rowspan="4"">31 ng??y</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">2</th>
                        <td class="align-middle">G??i c?????c data smartphone</td>
                        <td class="align-middle">SP50, SP50KH, MF50KH</td>
                        <td class="align-middle">50.000</td>
                        <td class="align-middle">5GB, h???t dung l?????ng ng???t k???t n???i</td>
                        <td class="align-middle text-center">-</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">3</th>
                        <td class="align-middle">G??i c?????c Combo smartphone 1 </td>
                        <td class="align-middle">SP120, SP120KH, MF120KH</td>
                        <td class="align-middle">120.000</td>
                        <td class="align-middle text-left">
                            + Mi???n ph?? cu???c g???i n???i m???ng d?????i 10 ph??t (T???i ??a 1.000 ph??t) <br>
                            + 50 ph??t cu???c g???i ngo???i m???ng <br>
                            + Data: 1GB/ng??y
                        </td>
                        <td class="align-middle">ARPU/th??ng (bao g???m VAT) trong 3 th??ng g???n nh???t < 120.000??/th??ng</td>

                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">4</th>
                        <td class="align-middle">G??i c?????c Combo smartphone 2</td>
                        <td class="align-middle">SP200, SP200KH, MF200KH</td>
                        <td class="align-middle">200.000</td>
                        <td class="align-middle text-left">
                            + Mi???n ph?? cu???c g???i n???i m???ng d?????i 20 ph??t (T???i ??a 1.000 ph??t) <br>
                            + 100 ph??t cu???c g???i ngo???i m???ng <br>
                            + Data: 2GB/ng??y
                        </td>
                        <td class="align-middle">ARPU/th??ng (bao g???m VAT) trong 3 th??ng g???n nh???t < 200.000??/th??ng</td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>-->
            <!--            </div>-->
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script
    src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"
    data-auto-replace-svg="nest"
></script>
</body>
</html>
