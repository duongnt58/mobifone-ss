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
          <a class="nav-link" href="#gioi-thieu">Giới thiệu chương trình</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tra-cuu">Tra cứu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gioi-thieu-sp">Giới thiệu sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#uu-dai">Gói cước</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cau-hoi">Câu hỏi thường gặp</a>
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
          <a class="nav-link" href="#gioi-thieu">Giới thiệu chương trình</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tra-cuu">Tra cứu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gioi-thieu-sp">Giới thiệu sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#uu-dai">Gói cước</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cau-hoi">Câu hỏi thường gặp</a>
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
<!--                        <span class="title-header-3"> Chỉ còn </span>-->
<!--                        <span class="title-header-4"> 1.290.000 <sup>(*)</sup> </span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <img src="/assets/img/img-cover-header.png" alt="" class="img-fluid">
        </div>

    </div>
    <div class="row bg-middle">
        <div class="col-12" id="gioi-thieu">
            <h3 class="">giới thiệu chương trình:</h3>
            <p class="text-justify">
                Với sứ mệnh là nhà cung cấp hạ tầng số và dịch vụ số hàng đầu Việt Nam, thúc đẩy nhanh quá trình chuyển đổi số quốc gia của Chính phủ, MobiFone triển khai chương trình hỗ trợ chuyển đổi điện thoại lên smartphone dành riêng cho các khách hàng là thuê bao MobiFone.
            </p>
        </div>
        <!--        <div class="col-8 offset-4">-->
        <!--            <h3 class="text-right">ƯU ĐIỂM SẢN PHẨM</h3>-->
        <!--            <p class="text-right">-->
        <!--                Trải nghiệm thiết bị Galaxy thêm tối ưu với ứng dụng Samsung-->
        <!--                Members. Với khả năng hỗ trợ và chẩn đoán tình trạng thiết bị, gửi-->
        <!--                các báo cáo lỗi và yêu cầu trợ giúp, ứng dụng Samsung Members giúp-->
        <!--                thiết bị Galaxy của bạn vận hành cách tối ưu hơn, mang đến trải-->
        <!--                nghiệm người dùng hoàn hảo hơn.-->
        <!--            </p>-->
        <!--        </div>-->
<!--        <div class="col-12" >-->
<!--            <h2 class="text-center">Thiết Kế Hiện Đại, Nhỏ Gọn</h2>-->
<!--        </div>-->
<!--        <div class="col-12 col-md-6">-->
<!--            <img src="assets/img/img-phone-ss.png" alt="" class="img-fluid" />-->
<!--        </div>-->
<!--        <div class="col-12 col-md-6">-->
<!--            <table class="table borderless">-->
<!--                <tbody style="line-height: 8px;">-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">Tổng quan</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Loại điện thoại</td>-->
<!--                    <td class="align-middle">SmartPhone</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">Sim</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Loại sim</td>-->
<!--                    <td class="align-middle">Nano Sim</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Số sim</td>-->
<!--                    <td class="align-middle">Hai Sim</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">Màn hình</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Kích thước màn hình</td>-->
<!--                    <td class="align-middle">5.3 inch</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Loại màn hình</td>-->
<!--                    <td class="align-middle">16 triệu màu</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Độ phân giải màn hình</td>-->
<!--                    <td class="align-middle">720 x 1480 pixels</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Công nghệ cảm ứng</td>-->
<!--                    <td class="align-middle">Cảm ứng điện dung đa điểm</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Độ lớn màn hình</td>-->
<!--                    <td class="align-middle">Trên 5 inches</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th scope="row" class="align-middle">CPU</th>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Hệ điều hành</td>-->
<!--                    <td class="align-middle">Android 10</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="align-middle">Tốc độ CPU</td>-->
<!--                    <td class="align-middle">Quad-core 1.5 GHz Cortex-A53</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
    </div>
    <div class="row tra-cuu" id="tra-cuu">
        <div class="col-10 offset-1">
            <h3>Tra cứu</h3>
            <p>
                Vui lòng tra cứu để xem bạn có đủ điều kiện tham dự chương trình
                không
            </p>
            <div class="form-tra-cuu">
                <div class="form-inline">
                    <div class="form-group mb-2">NHẬP SỐ THUÊ BAO</div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input
                                type="text"
                                class="form-control"
                                id="inputMsisdn"
                                placeholder=""
                        />
                    </div>
                    <button type="" class="btn btn-primary mb-2" id='btn-tra-cuu'>
                        TRA CỨU
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
                <div class="price-ss-core">
                    <span style="text-decoration:line-through red; font-size: 26px;">2.290.000</span>
					<h3 style="text-decoration-line: none;">1.290.000 </h3>
                    <span><sup>(*)</sup> khi mua kèm gói cước của mobifone</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Tốc độ CPU</h4>
            <h3>1.5GHz</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Camera chính - Độ phân giải</h4>
            <h3>8.0 MP</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Trọng lượng (g)</h4>
            <h3>150g</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Thời gian phát Audio (Giờ)</h4>
            <h3>Lên tới 70 giờ</h3>
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
            <h3>Ghi Lại Trọn Vẹn Mọi Khoảnh Khắc</h3>
            <img src="assets/img/img-phone-camera.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12">
            <h3>Tối Ưu Hiệu Suất Hoạt Động</h3>
            <div class="col-10 offset-1">
                <p>
                    Hệ điều hành Android (Phiên bản Go) giúp bộ nhớ luôn được tối ưu
                    với các ứng dụng tùy chỉnh được cài đặt trước, hỗ trợ sử dụng
                    nhanh chóng và dễ dàng Galaxy A01 Core. Trải nghiệm hiệu năng mượt
                    mà và bộ nhớ trong ấn tượng.
                </p>
            </div>
        </div>
        <div class="col-12">
            <img src="assets/img/img-phone-view.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12">
            <h3>Pin Bền Bỉ</h3>
            <div class="col-10 offset-1">
                <p>
                    Giải trí bất tận với dung lượng pin bền bỉ 3,000mAh (Tiêu chuẩn)
                    trên Galaxy A01 Core. Cho bạn thoải mái tập trung làm điều yêu
                    thích, kiến tạo trải nghiệm liền mạch hơn.
                </p>
            </div>
        </div>
        <div class="col-12">
            <img src="assets/img/img-run-slepp.png" alt="" class="img-fluid" />
        </div>
    </div>
    <div class="row bg-middle">
        <!--            <div class="col-12">-->
        <!--                <h3 class="">giới thiệu chương trình:</h3>-->
        <!--                <p class="text-justify">-->
        <!--                    Với sứ mệnh là nhà cung cấp hạ tầng số và dịch vụ số hàng đầu Việt Nam, thúc đẩy nhanh quá trình chuyển đổi số quốc gia của Chính phủ, MobiFone triển khai chương trình hỗ trợ chuyển đổi điện thoại lên smartphone dành riêng cho các khách hàng là thuê bao MobiFone.-->
        <!--                </p>-->
        <!--            </div>-->
        <!--        <div class="col-8 offset-4">-->
        <!--            <h3 class="text-right">ƯU ĐIỂM SẢN PHẨM</h3>-->
        <!--            <p class="text-right">-->
        <!--                Trải nghiệm thiết bị Galaxy thêm tối ưu với ứng dụng Samsung-->
        <!--                Members. Với khả năng hỗ trợ và chẩn đoán tình trạng thiết bị, gửi-->
        <!--                các báo cáo lỗi và yêu cầu trợ giúp, ứng dụng Samsung Members giúp-->
        <!--                thiết bị Galaxy của bạn vận hành cách tối ưu hơn, mang đến trải-->
        <!--                nghiệm người dùng hoàn hảo hơn.-->
        <!--            </p>-->
        <!--        </div>-->
        <div class="col-12" >
            <h2 class="text-center">Thiết Kế Hiện Đại, Nhỏ Gọn</h2>
        </div>
        <div class="col-12 col-md-6">
            <img src="assets/img/img-phone-ss.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12 col-md-6">
            <table class="table borderless">
                <tbody <?php if (!$isMobile) {echo 'style="line-height: 8px;"'; } else { echo 'line-height: 14px;';} ?>
                <tr>
                    <th scope="row" class="align-middle">Tổng quan</th>
                </tr>
                <tr>
                    <td class="align-middle">Loại điện thoại</td>
                    <td class="align-middle">SmartPhone</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">Sim</th>
                </tr>
                <tr>
                    <td class="align-middle">Loại sim</td>
                    <td class="align-middle">Nano Sim</td>
                </tr>
                <tr>
                    <td class="align-middle">Số sim</td>
                    <td class="align-middle">Hai Sim</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">Màn hình</th>
                </tr>
                <tr>
                    <td class="align-middle">Kích thước màn hình</td>
                    <td class="align-middle">5.3 inch</td>
                </tr>
                <tr>
                    <td class="align-middle">Loại màn hình</td>
                    <td class="align-middle">16 triệu màu</td>
                </tr>
                <tr>
                    <td class="align-middle">Độ phân giải màn hình</td>
                    <td class="align-middle">720 x 1480 pixels</td>
                </tr>
                <tr>
                    <td class="align-middle">Công nghệ cảm ứng</td>
                    <td class="align-middle">Cảm ứng điện dung đa điểm</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">CPU</th>
                </tr>
                <tr>
                    <td class="align-middle">Hệ điều hành</td>
                    <td class="align-middle">Android 10</td>
                </tr>
                <tr>
                    <td class="align-middle">Tốc độ CPU</td>
                    <td class="align-middle">Quad-core 1.5 GHz Cortex-A53</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row list-goi-cuoc" id="uu-dai">
        <div class="col-12 text-center">
            <h3>gói cước ưu đãi</h3>
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
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Tên gói</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Mã gói</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Giá gói</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Dung lượng gói/chu kỳ 31 ngày</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Điều kiện mua gói</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="align-middle">1</th>
                    <td class="align-middle">Gói cước trải nghiệm</td>
                    <td class="align-middle">TNSP</td>
                    <td class="align-middle">Miễn phí</td>
                    <td class="align-middle">5GB, hết dung lượng ngắt kết nối</td>
                    <td class="align-middle" rowspan="4" style="text-align: left">-	Thuê bao MobiFone hiện đang sử dụng điện thoại feature phone và thực hiện chuyển đổi lên smartphone theo chương trình này.
                        <br>
                        -	Riêng các gói cước MF50KH, MF120KH, MF200KH dành riêng cho thuê bao trả sau MobiF (không cước thuê bao)
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">2</th>
                    <td class="align-middle">Gói cước data smartphone</td>
                    <td class="align-middle">SP50, SP50KH, MF50KH</td>
                    <td class="align-middle">50.000</td>
                    <td class="align-middle">5GB, hết dung lượng ngắt kết nối</td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">3</th>
                    <td class="align-middle">Gói cước Combo smartphone 1 </td>
                    <td class="align-middle">SP120, SP120KH, MF120KH</td>
                    <td class="align-middle">120.000</td>
                    <td class="align-middle text-left">
                        + Miễn phí cuộc gọi nội mạng dưới 10 phút (Tối đa 1.000 phút)<br/>
                        + 50 phút cuộc gọi ngoại mạng <br/>
                        + Data: 1GB/ngày <br/>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="align-middle">4</th>
                    <td class="align-middle">Gói cước Combo smartphone 2</td>
                    <td class="align-middle">SP200, SP200KH, MF200KH</td>
                    <td class="align-middle">200.000</td>
                    <td class="align-middle text-left">
                        + Miễn phí cuộc gọi nội mạng dưới 20 phút (Tối đa 1.000 phút)<br/>
                        + 100 phút cuộc gọi ngoại mạng <br/>
                        + Data: 2GB/ngày
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 text-center">
            <h3>Giá bán máy</h3>
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
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Tập thuê bao</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Giá bán máy</th>
                    <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Điều kiện tối thiểu</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="align-middle">1</th>
                    <td class="align-middle">FF1</td>
                    <td class="align-middle">1.290.000</td>
                    <td class="align-middle" style="text-align: left">- Thuê bao MobiFone đang sử dụng điện thoại feature phone, đã hòa mạng trên 1 năm, chưa sử dụng các gói cước data của MobiFone (theo danh sách của MobiFone)
                        <br>
                        - Khách hàng đứng tên chính chủ thuê bao khi mua máy. <br>
                        - Cam kết sử dụng 12 tháng một trong các gói cước: SP50KH, SP120KH, SP200KH, MF50KH, MF120KH, MF200KH.
                        <br>
                        - Mỗi KH được mua tối đa 01 máy theo mức giá ưu đãi này.
                    </td>

                </tr>
                <tr>
                    <th scope="row" class="align-middle">2</th>
                    <td class="align-middle">FF2</td>
                    <td class="align-middle">1.790.000</td>
                    <td class="align-middle" style="text-align: left">- Thuê bao MobiFone đang sử dụng điện thoại feature phone (theo danh sách của MobiFone).
                        <br>
                        - Khách hàng đứng tên chính chủ thuê bao khi mua máy. <br>
                        - Đăng ký sử dụng một trong các gói cước: TNSP, SP50, SP120, SP200.
                    </td>
                </tr>
                </tbody>
            </table>
           <div style="text-align: left; color: #fff; font-weight: bold; padding-bottom: 10px">
               (*) Giá bán máy niêm yết của hãng: 2.290.000 đồng.
           </div>
        </div>
    </div>
    <div class="row faq" id='cau-hoi'>
        <div class="col-12">
            <h3>Câu hỏi thường gặp</h3>
        </div>
        <div class="row" id="cau-hoi-collapse">
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse1" role="button" aria-expanded="false" aria-controls="multiCollapse1" >1. ĐỐI TƯỢNG THAM GIA CHƯƠNG TRÌNH?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse1" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Thuê bao MobiFone đang sử dụng điện thoại feature phone
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
                            2. Làm thế nào để tôi biết mình đủ điều kiện tham gia chương trình?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse2" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Khách hàng có thể tự tra cứu hoặc tra cứu cho người nhân tại mục Tra cứu trên page hoặc nhắn tin theo cú pháp [Số điện thoại] gửi 9129
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
                            3. Khi mua điện thoại với giá 1.290.000, tôi có cần cam kết gì không? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse3" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Có, Khách hàng cần cam kết sử dụng 12 tháng gói cước của MobiFone. Để kiểm soát việc này, khách hàng cần đồng ý cho MobiFone cài đặt phần mềm KNOX của Samsung (phần mềm sẽ tự động được gỡ sau khi khách hàng hoàn thành cam kết).
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
                            4. Khi mua điện thoại với giá 1.790.000, tôi có cần cam kết gì không? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse4" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Không, Khách hàng khi đó được tặng gói TNSP (miễn phí 5GB tối độ cao trong 1 tháng). Hết thời gian khuyến mại, khách hàng được ưu tiên đăng ký gói 5GB với giá 50.000đ, hết lưu lượng dừng truy cập.
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
                            5. MÁY SAMSUNG A01 CORE CỦA MOBIFONE KHÁC GÌ SO VỚI PHIÊN BẢN CỦA THỊ TRƯỜNG?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse5" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Máy Samsung A01 Core của Mobifone là phiên bản độc quyền Samsung dành cho Mobifone để triển khai chương trình đổi máy với bộ nhớ RAM 2Gb, giúp máy mạnh mẽ hơn, khách hàng có thể trải nghiệm tốt và mượt mà hơn
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
                            6. MÁY SAMSUNG A01 CORE 2GB ĐƯỢC BẢO HÀNH BAO LÂU?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse6" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    Sản phẩm được bảo hành chính hãng 12 tháng tại tất cả các TTBH toàn quốc của Samsung. Khách hàng có thể liên hệ các cửa hàng Mobifone gần Nhất Để Được hỗ trợ
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
                            7. TÔI CÓ THỂ TÌM MUA MÁY SAMSUNG A01 CORE 2GB TẠI ĐÂU? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse7" data-parent="#cau-hoi-collapse">
                                <div class="">
                                    => Khách hàng có thể liên hệ mua máy tại các cửa hàng MobiFone hoặc để lại thông tin tại phần dưới để được hỗ trợ.
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
                XIN VUI LÒNG ĐỂ LẠI THÔNG TIN NẾU ANH/CHỊ ĐÃ CHỌN ĐƯỢC GÓI CƯỚC PHÙ
                HỢP HOẶC CẦN CHÚNG TÔI TƯ VẤN THÊM
            </h3>
            <form method="post" action="index.php">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Email address</label> -->
<!--                            <select class="form-control" id="selectGoiCuoc" name="goi_cuoc">-->
<!--                                <option value="0">Chọn gói cước</option>-->
<!--                                <option value="Gói cước trải nghiệm">Gói cước trải nghiệm</option>-->
<!--                                <option value="Gói cước data smartphone">Gói cước data smartphone</option>-->
<!--                                <option value="Gói cước combo smartphone 1">Gói cước combo smartphone 1</option>-->
<!--                                <option value="Gói cước combo smartphone 2">Gói cước combo smartphone 2</option>-->
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
                                placeholder="TÊN CỦA BẠN"
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
                                placeholder="SỐ ĐIỆN THOẠI"
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
                                placeholder="ĐỊA CHỈ"
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
                                    placeholder="Ghi chú cho MobiFone"
                            />-->
                            <textarea  name="ghi_chu" class="form-control" aria-label=""  placeholder="Ghi chú cho MobiFone"></textarea>
                        </div>
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div> -->
                    </div>
                    <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
            </form>
            <h3>MOBIFONE HÂN HẠNH ĐƯỢC PHỤC VỤ QUÝ KHÁCH</h3>
        </div>
        <div class="col-12 col-md-5 bg-lien-he">
            <div class="row">
                <div class="col-12 p-4">
                    <h4 class="text-center">THÔNG TIN LIÊN HỆ:</h4>
                    <ul>
                        <li><i class="fas fa-globe text-light"></i> WWW.MOBIFONE.VN</li>
                        <li>
                            <i class="fas fa-store-alt text-light"></i> SHOP.MOBIFONE.VN
                        </li>
                        <li><i class="fas fa-phone-alt text-light"></i> 9090</li>
                    </ul>
                    <h5>
                        Tổng Công Ty Viễn Thông MobiFone
                    </h5>
                    <h5>
                        Công Ty Cổ Phần Dịch Vụ Gia Tăng MobiFone
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
                <h5 class="modal-title" id="exampleModalLabel">Thông báo!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-danger">
                Thông tin của bạn đã được ghi nhận thành thông.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
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
<!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">GÓI CƯỚC ƯU ĐÃI</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">LỰA CHỌN GÓI CƯỚC CAM KẾT ĐĂNG KÝ</h3>
                    <a href="" style="color: #fff" data-toggle="modal" data-target="#modal-full-goi-cuoc">(Click vào đây để xem chi tiết gói cước)</a>
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
                        <th scope="col" class="align-middle">Tên gói</th>
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
                        <td class="align-middle">Giá bán</td>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>-->
<!--            </div>-->
        </div>
    </div>
</div>

<!-- Modal FF2 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">GÓI CƯỚC ƯU ĐÃI</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                    <span aria-hidden="true">&times;</span>-->
            <!--                </button>-->
            <!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">LỰA CHỌN GÓI CƯỚC CAM KẾT ĐĂNG KÝ</h3>
                    <a href="" style="color: #fff" data-toggle="modal" data-target="#modal-full-goi-cuoc">(Click vào đây để xem chi tiết gói cước)</a>
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
                        <th scope="col" class="align-middle">Tên gói</th>
                        <th scope="col" class="align-middle" class="FF2-SP50">SP50</th>
                        <th scope="col" class="align-middle" class="FF2-SP120">SP120</th>
                        <th scope="col" class="align-middle" class="FF2-SP200">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">Giá bán</td>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>-->
            <!--            </div>-->
        </div>
    </div>
</div>

<!-- Modal FF3 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">GÓI CƯỚC ƯU ĐÃI</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                    <span aria-hidden="true">&times;</span>-->
            <!--                </button>-->
            <!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">LỰA CHỌN GÓI CƯỚC CAM KẾT ĐĂNG KÝ</h3>
                    <a href="" style="color: #fff" data-toggle="modal" data-target="#modal-full-goi-cuoc">(Click vào đây để xem chi tiết gói cước)</a>
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
                        <th scope="col" class="align-middle">Tên gói</th>
                        <th scope="col" class="align-middle">SP50</th>
                        <th scope="col" class="align-middle">SP120</th>
                        <th scope="col" class="align-middle">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">Giá bán</td>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>-->
            <!--            </div>-->
        </div>
    </div>
</div>
<!--Chi tiết gói cước-->
<div class="modal fade bd-example-modal-lg" id="modal-full-goi-cuoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">MUA MÁY KÈM GÓI CƯỚC ƯU ĐÃI</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
                <div style="margin-bottom: 5px">
                    <h3 style="color: #fff">LỰA CHỌN GÓI CƯỚC CAM KẾT ĐĂNG KÝ</h3>
                    <p>
                        <br>
                        Chú Thích :(*)ưu đãi hàng tháng

                    </p>
                    <p style="color: #c6b9b9">
                        Điều kiện 1 : Khách hàng là thuê bao MobiFone đang sử dụng điện thoại feature phone (bao gồm TBTT và TBTS).
                        <br>
                        Điều kiện 2 : Khách hàng là thuê bao MobiFone đang sử dụng điện thoại feature phone; là TBTS MobiF.
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
                        <th scope="col" class="align-middle">Tên gói cước (*)</th>
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
                        <th scope="row" class="align-middle">Loại thuê bao</th>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                        <td class="align-middle">Thuê bao hiện hữu</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Thoại nội mạng (*)</th>
                        <td class="align-middle">...</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">miễn phí dưới 20 phút</td>
                        <td class="align-middle">miễn phí dưới 20 phút</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">miễn phí dưới 20 phút</td>
                        <td class="align-middle">miễn phí dưới 20 phút</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">miễn phí dưới 20 phút</td>
                        <td class="align-middle">miễn phí dưới 20 phút</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle"> Thoại ngoài mạng (*)</th>
                        <td class="align-middle">...</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">50 phút</td>
                        <td class="align-middle">100 phút</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">50 phút</td>
                        <td class="align-middle">100 phút</td>
                        <td class="align-middle">...</td>
                        <td class="align-middle">50 phút</td>
                        <td class="align-middle">100 phút</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle"> Data (*)</th>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">1Gb/ngày</td>
                        <td class="align-middle">2Gb/ngày</td>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">1Gb/ngày</td>
                        <td class="align-middle">2Gb/ngày</td>
                        <td class="align-middle">5Gb</td>
                        <td class="align-middle">1Gb/ngày</td>
                        <td class="align-middle">2Gb/ngày</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Giá gói cước/tháng (Chưa bao gồm cước thuê bao)</th>
                        <td class="align-middle">Chu kỳ đầu: 0đ.<br>
                            Chu kỳ tiếp theo: 50.000đ</td>
                        <td class="align-middle">50.000đ</td>
                        <td class="align-middle">120.000đ</td>
                        <td class="align-middle">200.000</td>
                        <td class="align-middle">50.000đ</td>
                        <td class="align-middle">120.000đ</td>
                        <td class="align-middle">200.000</td>
                        <td class="align-middle">50.000đ</td>
                        <td class="align-middle">120.000đ</td>
                        <td class="align-middle">200.000</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Số chu kỳ cam kết</th>
                        <td class="align-middle">...</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                        <td class="align-middle">12 tháng</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Điều kiện</th>
                        <td class="align-middle">Điều kiện 1</td>
                        <td class="align-middle">Điều kiện 1</td>
                        <td class="align-middle">Điều kiện 1</td>
                        <td class="align-middle">Điều kiện 1</td>
                        <td class="align-middle">Điều kiện 2</td>
                        <td class="align-middle">Điều kiện 2</td>
                        <td class="align-middle">Điều kiện 2</td>
                        <td class="align-middle">Điều kiện 1</td>
                        <td class="align-middle">Điều kiện 1</td>
                        <td class="align-middle">Điều kiện 1</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Cài đặt phần mềm KNOX</th>
                        <td class="align-middle"></td>
                        <td class="align-middle">Có</td>
                        <td class="align-middle">Có</td>
                        <td class="align-middle">Có</td>
                        <td class="align-middle">Có</td>
                        <td class="align-middle">Có</td>
                        <td class="align-middle">Có</td>
                        <td class="align-middle">Không</td>
                        <td class="align-middle">Không</td>
                        <td class="align-middle">Không</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">Đăng ký gói</th>
                        <td class="align-middle">TNSP hoặc DK TNSP gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td class="align-middle">SP50KH hoặc DK SP50KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td class="align-middle">SP120KH hoặc DK SP120KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td class="align-middle">SP200KH hoặc DK SP200KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td class="align-middle">Qua cửa hàng MobiFone</td>
                        <td class="align-middle">Qua cửa hàng MobiFone</td>
                        <td class="align-middle">Qua cửa hàng MobiFone</td>
                        <td class="align-middle">SP50KH hoặc DK SP50KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td class="align-middle">SP120KH hoặc DK SP120KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td class="align-middle">SP200KH hoặc DK SP200KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>-->
<!--            </div>-->
        </div>
    </div>
</div>

<!-- Modal FF -->
<div class="modal fade bd-example-modal-lg" id="modal-FF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">GÓI CƯỚC ƯU ĐÃI</h4>-->
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
                    <h3 style="color: #fff">Thông tin gói  cước của MBF:</h3>
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
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Tên gói</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Mã gói</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Giá gói</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Dung lượng gói</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;" >Điều kiện</th>
                        <th scope="col" class="align-middle" style="text-transform: uppercase;vertical-align: middle;">Hạn sử dụng gói cước</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="align-middle">1</th>
                        <td class="align-middle">Gói cước trải nghiệm</td>
                        <td class="align-middle">TNSP</td>
                        <td class="align-middle">0</td>
                        <td class="align-middle">5GB, hết dung lượng ngắt kết nối</td>
                        <td class="align-middle">Một thuê bao được sử dụng tối đa 01 lần gói TNSP</td>
                        <td class="align-middle" rowspan="4"">31 ngày</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">2</th>
                        <td class="align-middle">Gói cước data smartphone</td>
                        <td class="align-middle">SP50, SP50KH, MF50KH</td>
                        <td class="align-middle">50.000</td>
                        <td class="align-middle">5GB, hết dung lượng ngắt kết nối</td>
                        <td class="align-middle text-center">-</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">3</th>
                        <td class="align-middle">Gói cước Combo smartphone 1 </td>
                        <td class="align-middle">SP120, SP120KH, MF120KH</td>
                        <td class="align-middle">120.000</td>
                        <td class="align-middle text-left">
                            + Miễn phí cuộc gọi nội mạng dưới 10 phút (Tối đa 1.000 phút) <br>
                            + 50 phút cuộc gọi ngoại mạng <br>
                            + Data: 1GB/ngày
                        </td>
                        <td class="align-middle">ARPU/tháng (bao gồm VAT) trong 3 tháng gần nhất < 120.000đ/tháng</td>

                    </tr>
                    <tr>
                        <th scope="row" class="align-middle">4</th>
                        <td class="align-middle">Gói cước Combo smartphone 2</td>
                        <td class="align-middle">SP200, SP200KH, MF200KH</td>
                        <td class="align-middle">200.000</td>
                        <td class="align-middle text-left">
                            + Miễn phí cuộc gọi nội mạng dưới 20 phút (Tối đa 1.000 phút) <br>
                            + 100 phút cuộc gọi ngoại mạng <br>
                            + Data: 2GB/ngày
                        </td>
                        <td class="align-middle">ARPU/tháng (bao gồm VAT) trong 3 tháng gần nhất < 200.000đ/tháng</td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>-->
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
