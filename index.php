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
        $timeTs = time();
        $sql = "INSERT INTO customer (goi_cuoc, ten, sdt, dia_chi, created_at)"
            . " VALUE (:goi_cuoc, :ten, :sdt, :dia_chi, :created_at)";
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
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body <?php if ($isOK) echo "onLoad=\"$('#exampleModal').modal('show');\""?> >
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
            <div class="cover-header-background-img">
                <div class="cover-header-background-color">
                    <div class="title-area">
                        <span class="title-header-1"> Smartphone </span>
                        <span class="title-header-2"> samsung 4g </span>
                        <span class="title-header-3"> Chỉ còn </span>
                        <span class="title-header-4"> 1.290.000 <sup>(*)</sup> </span>
                        <!-- <span class="title-header-5"> (*) </span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <div class="ss-core">
                <img src="assets/img/img-ss-core.png" alt="" class="img-fluid" />
                <div class="title-ss-core">
                    <h3>Samsung Galaxy</h3>
                    <h3>A01 CORE 2GB</h3>
                </div>
                <div class="price-ss-core">
                    <h3>2.290.000 <sup>(*)</sup></h3>
                    <span><sup>(*)</sup> khi mua kèm gói cước của mobifone</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row ss-core-properties-main">
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
            <h3>150</h3>
        </div>
        <div class="col-lg-3 text-center ss-core-properties">
            <h4>Thời gian phát Audio (Giờ)</h4>
            <h3>Lên tới 70</h3>
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
    <div class="row bg-middle">
        <div class="col-12" id="gioi-thieu">
            <h3 class="">giới thiệu chương trình:</h3>
            <p class="text-justify">
                Với sứ mệnh là nhà cung cấp hạ tầng số và dịch vụ số hàng đầu Việt Nam, giúp mọi người dân Việt Nam đều được tiếp cận công nghệ một cách <b>THẦN TỐC</b>, góp phần <b>ĐỔI MỚI</b> đất nước thành một nước công nghệ số, MobiFone hợp tác cùng Samsung triển khai chương trình nâng cấp điện thoại Samsung Galaxy A01 Core 2Gb giá 2.290.000đ kèm gói cước cho các thuê bao MobiFone giá siêu ưu đãi chỉ 1.290.000đ. MobiFone tự tin với sự <b>HIỆU QUẢ</b> và <b>CHUYÊN NGHIỆP</b> trong suốt quá trình 28 năm phát triển của mình, mọi người dân Việt Nam đều được sử dụng smartphone 4G với giá bình dân nhất để không một ai bị bỏ lại phía sau trong sự phát triển <b>THẦN TỐC</b> của công nghệ.
            </p>
        </div>
        <div class="col-8 offset-4">
            <h3 class="text-right">ƯU ĐIỂM SẢN PHẨM</h3>
            <p class="text-right">
                Trải nghiệm thiết bị Galaxy thêm tối ưu với ứng dụng Samsung
                Members. Với khả năng hỗ trợ và chẩn đoán tình trạng thiết bị, gửi
                các báo cáo lỗi và yêu cầu trợ giúp, ứng dụng Samsung Members giúp
                thiết bị Galaxy của bạn vận hành cách tối ưu hơn, mang đến trải
                nghiệm người dùng hoàn hảo hơn.
            </p>
        </div>
        <div class="col-12" id='gioi-thieu-sp'>
            <h2 class="text-center">Thiết Kế Hiện Đại, Nhỏ Gọn</h2>
        </div>
        <div class="col-12 col-md-6">
            <img src="assets/img/img-phone-ss.png" alt="" class="img-fluid" />
        </div>
        <div class="col-12 col-md-6">
            <table class="table borderless">
                <tbody>
                <tr>
                    <th scope="row">Tổng quan</th>
                </tr>
                <tr>
                    <td>Loại điện thoại</td>
                    <td>SmartPhone</td>
                </tr>
                <tr>
                    <th scope="row">Sim</th>
                </tr>
                <tr>
                    <td>Loại sim</td>
                    <td>Nano Sim</td>
                </tr>
                <tr>
                    <td>Số sim</td>
                    <td>Hai Sim</td>
                </tr>
                <tr>
                    <th scope="row">Màn hình</th>
                </tr>
                <tr>
                    <td>Kích thước màn hình</td>
                    <td>5.3 inch</td>
                </tr>
                <tr>
                    <td>Loại màn hình</td>
                    <td>16 triệu màu</td>
                </tr>
                <tr>
                    <td>Độ phân giải màn hình</td>
                    <td>720 x 1480 pixels</td>
                </tr>
                <tr>
                    <td>Công nghệ cảm ứng</td>
                    <td>Cảm ứng điện dung đa điểm</td>
                </tr>
                <tr>
                    <td>Độ lớn màn hình</td>
                    <td>Trên 5 inches</td>
                </tr>
                <tr>
                    <th scope="row">CPU</th>
                </tr>
                <tr>
                    <td>Hệ điều hành</td>
                    <td>Android 10</td>
                </tr>
                <tr>
                    <td>Tốc độ CPU</td>
                    <td>Quad-core 1.5 GHz Cortex-A53</td>
                </tr>
                </tbody>
            </table>
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
                    mà với RAM 1GB/2GB và bộ nhớ trong ấn tượng 16GB/32GB.
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
                </div>
            </div>
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
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >STT</th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >Tên gói</th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >Mã gói</th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >Giá gói</th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >Dung lượng gói</th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >Giá bán lẻ</th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;">Giá kèm gói cước<i>(Giá chỉ từ)</i></th>
                    <th scope="col" style="text-transform: uppercase;vertical-align: middle;" >Đăng ký</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Gói cước trải nghiệm</td>
                    <td>TNSP</td>
                    <td>0</td>
                    <td>5GB, hết dung lượng ngắt kết nối</td>
                    <td></td>
                    <td></td>
                    <td>
                        <!-- <button
                            type="button"
                            class="btn btn-warning text-danger font-weight-bold" onClick="window.location='#tra-cuu'"
                        >
                            Mua ngay
                        </button> -->
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Gói cước data smartphone</td>
                    <td>SP50, SP50KH, MF50KH</td>
                    <td>50.000</td>
                    <td>5GB, hết dung lượng ngắt kết nối</td>
                    <td>2.290.000</td>
                    <td>1.290.000</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-warning text-danger font-weight-bold" onClick="window.location='#tra-cuu'"
                        >
                            Mua ngay
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Gói cước Combo smartphone 1 </td>
                    <td>SP120, SP120KH, MF120KH</td>
                    <td>120.000</td>
                    <td>
                        + Miễn phí cuộc gọi nội mạng dưới 20 phút + 50 phút cuộc gọi
                        ngoại mạng + Data: 1GB/ngày
                    </td>
                    <td>2.290.000</td>
                    <td>1.290.000</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-warning text-danger font-weight-bold" onClick="window.location='#tra-cuu'"
                        >
                            Mua ngay
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Gói cước Combo smartphone 2</td>
                    <td>SP200, SP200KH, MF200KH</td>
                    <td>200.000</td>
                    <td>
                        + Miễn phí cuộc gọi nội mạng dưới 20 phút + 100 phút cuộc gọi
                        ngoại mạng + Data: 2GB/ngày
                    </td>
                    <td>2.290.000</td>
                    <td>1.290.000</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-warning text-danger font-weight-bold" onClick="window.location='#tra-cuu'"
                        >
                            Mua ngay
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row faq" id='cau-hoi'>
        <div class="col-12">
            <h3>Câu hỏi thường gặp</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse1" role="button" aria-expanded="false" aria-controls="multiCollapse1">1. ĐỐI TƯỢNG THAM GIA CHƯƠNG TRÌNH?</a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse1">
                                <div class="">
                                    Thuê bao MobiFone đang sử dụng điện thoại feature phone và đứng tên chủ thuê bao sẽ được tham gia chương trình này
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse2" role="button" aria-expanded="false" aria-controls="multiCollapse2">2. ĐỐI TƯỢNG NÀO ĐƯỢC THAM GIA MUA MÁY GIÁ 1.290.000 đ </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse2">
                                <div class="">
                                    Các khách hàng thỏa điều kiện sau đây sẽ được mua máy Samsung A01 core 2Gb giá 1.290.000 đ<br/>
                                    a. Thuê bao trả sau MobiFone đang sử dụng điện thoại feature phone (bao gồm thuê
                                    bao trả trước chuyển trả sau và thuê bao trả sau MobiF),<br/>
                                    b. Đã hòa mạng MobiFone trên 01 năm tại thời điểm lấy dữ liệu,<br/>
                                    c. Không sử dụng các gói cước data của MobiFone trong vòng 06 tháng tính tới thời
                                    điểm lấy dữ liệu,<br/>
                                    d. ARPU/tháng (bao gồm VAT) trong 03 tháng gần nhất tính tới thời điểm lấy dữ
                                    liệu đều lớn hơn 5.000 đồng/tháng; và:<br/>
                                    e. Khách hàng đứng tên chính chủ thuê bao,<br/>
                                    f. Mỗi khách hàng (CMTND/thẻ căn cước/hộ chiếu) được mua tối đa 01 máy A01
                                    Core 2Gb với giá ưu đãi 1.290.000 đồng/máy,<br/>
                                    g. Đăng ký và cam kết sử dụng 12 tháng một trong các gói cước SP50KH, SP120KH,
                                    SP200KH, MF50KH, MF120KH, MF200KH<br/>
                                    h. Đồng ý cho MobiFone cài đặt phần mềm khóa máy Knox và thực hiện khóa máy
                                    nếu thuê bao vi phạm cam kết phải sử dụng và thanh toán cước đầy đủ trong 12
                                    tháng sử dụng gói cước cam kết.<br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse3" role="button" aria-expanded="false" aria-controls="multiCollapse3"> 3. ĐỐI TƯỢNG NÀO ĐƯỢC THAM GIA MUA MÁY GIÁ 1.790.000 đ </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse3">
                                <div class="">
                                    Các khách hàng thỏa các điều kiện sau đây sẽ được mua máy với giá 1.790.000 đ<br/>
                                    a. Thuê bao MobiFone đang sử dụng điện thoại feature phone (bao gồm thuê bao trả
                                    trước và thuê bao trả sau)<br/>
                                    b. Không thuộc tập thuê bao (1), và:<br/>
                                    c. Khách hàng đứng tên chính chủ thuê bao,<br/>
                                    d. Đăng ký sử dụng một trong các gói cước TNSP, SP50, SP120, SP200
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse4" role="button" aria-expanded="false" aria-controls="multiCollapse4"> 4. ĐỐI TƯỢNG NÀO ĐƯỢC THAM GIA MUA MÁY GIÁ 1.990.000 đ </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse4">
                                <div class="">
                                    Tất cả thuê bao MobiFone không thuộc 2 đối tượng trên thì được mua máy giá 1.990.000 đ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse5" role="button" aria-expanded="false" aria-controls="multiCollapse5"> 5. Cách để biết mình tham gia đối tượng ưu đãi ? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse5">
                                <div class="">
                                    Anh chị có thể tự tra cứu, hoặc tra cứu cho người thân tại website : www.mobifone.vn/smartphone. Dùng tin nhắn nhắn tin theo cú pháp [Số điện thoại] gửi đến tổng đài 9129 hoặc liên hệ tổng đài số 9090 để biết được thông tin nhanh nhất
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse6" role="button" aria-expanded="false" aria-controls="multiCollapse6">  6. Nếu khách hàng thuộc các đối tượng trên nhưng không muốn mua máy điện thoại thì được ưu đãi gì không? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse6">
                                <div class="">
                                    Nếu khách hàng thuộc các đối tượng trên nhưng không muốn mua máy điện thoại, Mobifone sẽ tặng cho một gói cước 4G với 5Gb data trong 30 ngày tốc độ cao để trải nghiệm 4G của Mobifone.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse7" role="button" aria-expanded="false" aria-controls="multiCollapse7">  7. MỖI KHÁCH HÀNG CÓ THỂ MUA ĐƯỢC BAO NHIÊU MÁY? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse7">
                                <div class="">
                                    Mỗi Khách Hàng (Cmtnd/Thẻ Căn Cước/Hộ Chiếu) Được Mua Tối Đa 01 Máy Có Trợ Giá Khuyến Mại. + Khách Hàng Đăng Ký Và Cam Kết Sử Dụng 12 Tháng Với Giá Máy 1.290.000 Sẽ Được Cài Phần Mềm Khóa Máy Knox Của Samsung. Khi Khách Hàng Không Thực Hiện Cam Kết Sẽ Bị Khóa Máy Bằng Phần Mềm Knox Của Samsung.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse8" role="button" aria-expanded="false" aria-controls="multiCollapse8">  8. MÁY SAMSUNG A01 CORE CỦA MOBIFONE KHÁC GÌ SO VỚI PHIÊN BẢN CỦA THỊ TRƯỜNG? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse8">
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
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse9" role="button" aria-expanded="false" aria-controls="multiCollapse9">  9. MÁY SAMSUNG A01 CORE 2GB ĐƯỢC BẢO HÀNH BAO LÂU? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse9">
                                <div class="">
                                    Sản Phẩm Được Bảo Hành Chính Hãng 12 Tháng Tại Tất Cả Các TTBH Toàn Quốc Của Samsung Ngoài Ra, Khách Hàng Có Thể Liên Hệ 9090 Hoặc Cửa Hàng Trực Tiếp Mobifone Gần Nhất Để Được Hỗ Trợ.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    <p>
                        <a class=""  style="text-transform: uppercase;" data-toggle="collapse" href="#multiCollapse10" role="button" aria-expanded="false" aria-controls="multiCollapse10">  10. TÔI CÓ THỂ TÌM MUA MÁY SAMSUNG A01 CORE 2GB TẠI ĐÂU? </a>
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapse10">
                                <div class="">
                                    Khách Hàng Đủ Điều Kiện Có Thể Tìm Mua Tại Hệ Thống Cửa Hàng Trực Tiếp Của Mobifone Trên Toàn Quốc, Qua Tư Vấn Viên Mobifone, Tổng Đài 9090 Hoặc Đặt Hàng Tại Page : www.Mobifone.vn/Smartphone
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
                            <select class="form-control" id="selectGoiCuoc" name="goi_cuoc">
                                <option value="0">Chọn gói cước</option>
<!--                                <option value="Gói cước trải nghiệm">Gói cước trải nghiệm</option>-->
<!--                                <option value="Gói cước data smartphone">Gói cước data smartphone</option>-->
<!--                                <option value="Gói cước combo smartphone 1">Gói cước combo smartphone 1</option>-->
<!--                                <option value="Gói cước combo smartphone 2">Gói cước combo smartphone 2</option>-->
                                <option value="TNSP">TNSP</option>
                                <option value="SP50KH">SP50KH</option>
                                <option value="SP120KH">SP120KH</option>
                                <option value="SP200KH">SP200KH</option>
                                <option value="MF50KH">MF50KH</option>
                                <option value="MF120KH">MF120KH</option>
                                <option value="MF200KH">MF200KH</option>
                                <option value="SP50">SP50</option>
                                <option value="SP120">SP120</option>
                                <option value="SP200">SP200</option>
                            </select>
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
                        <th scope="col">Tên gói</th>
                        <th scope="col" class="FF1-SP50KH">SP50KH</th>
                        <th scope="col" class="FF1-SP120KH">SP120KH</th>
                        <th scope="col" class="FF1-SP200KH">SP200KH</th>
                        <th scope="col" class="FF1-MF50KH">MF50KH</th>
                        <th scope="col" class="FF1-MF120KH">MF120KH</th>
                        <th scope="col" class="FF1-MF200KH">MF200KH</th>
                        <th scope="col" class="FF1-SP50">SP50</th>
                        <th scope="col" class="FF1-SP120">SP120</th>
                        <th scope="col" class="FF1-SP200">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Giá bán</td>
                        <td class="FF1-SP50KH">1,290,000</td>
                        <td class="FF1-SP120KH">1,290,000</td>
                        <td class="FF1-SP200KH">1,290,000</td>
                        <td class="FF1-MF50KH">1,290,000</td>
                        <td class="FF1-MF120KH">1,290,000</td>
                        <td class="FF1-MF200KH">1,290,000</td>
                        <td class="FF1-SP50">1,790,000</td>
                        <td class="FF1-SP120">1,790,000</td>
                        <td class="FF1-SP200">1,790,000</td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-warning text-danger font-weight-bold " onclick="actionMuaNgay('NULL')" disabled="" style="
    visibility: hidden;
">
                                Mua ngay
                            </button></td>
                        <td class="FF1-SP50KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-SP120KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-SP200KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP200KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-MF50KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('MF50KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-MF120KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('MF120KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-MF120KH">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('MF120KH')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-SP50">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-SP120">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF1-SP200">
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
                        <th scope="col">Tên gói</th>
                        <th scope="col" class="FF2-SP50">SP50</th>
                        <th scope="col" class="FF2-SP120">SP120</th>
                        <th scope="col" class="FF2-SP200">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Giá bán</td>
                        <td class="FF2-SP50">1,790,000</td>
                        <td class="FF2-SP120">1,790,000</td>
                        <td class="FF2-SP200">1,790,000</td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-warning text-danger font-weight-bold" onclick="actionMuaNgay('NULL')" disabled="" style="
    visibility: hidden;
">
                                Mua ngay
                            </button></td>
                        <td class="FF2-SP50">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF2-SP120">
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td class="FF2-SP200">
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
                        <th scope="col">Tên gói</th>
                        <th scope="col">SP50</th>
                        <th scope="col">SP120</th>
                        <th scope="col">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Giá bán</td>
                        <td>1,990,000</td>
                        <td>1,990,000</td>
                        <td>1,990,000</td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-warning text-danger font-weight-bold" onclick="actionMuaNgay('NULL')" disabled="" style="
    visibility: hidden;
">
                                Mua ngay
                            </button></td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP50')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('SP120')"
                            >
                                Mua ngay
                            </button>
                        </td>
                        <td>
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
                        <th scope="col">Tên gói cước (*)</th>
                        <th scope="col">TNSP</th>
                        <th scope="col">SP50KH</th>
                        <th scope="col">SP120KH</th>
                        <th scope="col">SP200KH</th>
                        <th scope="col">MF50KH</th>
                        <th scope="col">MF120KH</th>
                        <th scope="col">MF200KH</th>
                        <th scope="col">SP50</th>
                        <th scope="col">SP120</th>
                        <th scope="col">SP200</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Loại thuê bao</th>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                        <td>Thuê bao hiện hữu</td>
                    </tr>
                    <tr>
                        <th scope="row">Thoại nội mạng (*)</th>
                        <td>...</td>
                        <td>...</td>
                        <td>miễn phí dưới 20 phút</td>
                        <td>miễn phí dưới 20 phút</td>
                        <td>...</td>
                        <td>miễn phí dưới 20 phút</td>
                        <td>miễn phí dưới 20 phút</td>
                        <td>...</td>
                        <td>miễn phí dưới 20 phút</td>
                        <td>miễn phí dưới 20 phút</td>
                    </tr>
                    <tr>
                        <th scope="row"> Thoại ngoài mạng (*)</th>
                        <td>...</td>
                        <td>...</td>
                        <td>50 phút</td>
                        <td>100 phút</td>
                        <td>...</td>
                        <td>50 phút</td>
                        <td>100 phút</td>
                        <td>...</td>
                        <td>50 phút</td>
                        <td>100 phút</td>
                    </tr>
                    <tr>
                        <th scope="row"> Data (*)</th>
                        <td>5Gb</td>
                        <td>5Gb</td>
                        <td>1Gb/ngày</td>
                        <td>2Gb/ngày</td>
                        <td>5Gb</td>
                        <td>1Gb/ngày</td>
                        <td>2Gb/ngày</td>
                        <td>5Gb</td>
                        <td>1Gb/ngày</td>
                        <td>2Gb/ngày</td>
                    </tr>
                    <tr>
                        <th scope="row">Giá gói cước/tháng (Chưa bao gồm cước thuê bao)</th>
                        <td>Chu kỳ đầu: 0đ.<br>
                            Chu kỳ tiếp theo: 50.000đ</td>
                        <td>50.000đ</td>
                        <td>120.000đ</td>
                        <td>200.000</td>
                        <td>50.000đ</td>
                        <td>120.000đ</td>
                        <td>200.000</td>
                        <td>50.000đ</td>
                        <td>120.000đ</td>
                        <td>200.000</td>
                    </tr>
                    <tr>
                        <th scope="row">Số chu kỳ cam kết</th>
                        <td>...</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                        <td>12 tháng</td>
                    </tr>
                    <tr>
                        <th scope="row">Điều kiện</th>
                        <td>Điều kiện 1</td>
                        <td>Điều kiện 1</td>
                        <td>Điều kiện 1</td>
                        <td>Điều kiện 1</td>
                        <td>Điều kiện 2</td>
                        <td>Điều kiện 2</td>
                        <td>Điều kiện 2</td>
                        <td>Điều kiện 1</td>
                        <td>Điều kiện 1</td>
                        <td>Điều kiện 1</td>
                    </tr>
                    <tr>
                        <th scope="row">Cài đặt phần mềm KNOX</th>
                        <td></td>
                        <td>Có</td>
                        <td>Có</td>
                        <td>Có</td>
                        <td>Có</td>
                        <td>Có</td>
                        <td>Có</td>
                        <td>Không</td>
                        <td>Không</td>
                        <td>Không</td>
                    </tr>
                    <tr>
                        <th scope="row">Đăng ký gói</th>
                        <td>TNSP hoặc DK TNSP gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td>SP50KH hoặc DK SP50KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td>SP120KH hoặc DK SP120KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td>SP200KH hoặc DK SP200KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td>Qua cửa hàng MobiFone</td>
                        <td>Qua cửa hàng MobiFone</td>
                        <td>Qua cửa hàng MobiFone</td>
                        <td>SP50KH hoặc DK SP50KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td>SP120KH hoặc DK SP120KH gửi 999 hoặc qua cửa hàng MobiFone</td>
                        <td>SP200KH hoặc DK SP200KH gửi 999 hoặc qua cửa hàng MobiFone</td>
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
