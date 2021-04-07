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
    <ul class="nav nav-fill bg-blue">
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
    </ul>
<?php } else { ?>

<div class="container ">
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
                    <h3>A01 CORE 2BG</h3>
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
                Theo định hướng của Chính phủ đển năm 2030 phổ cập mạng di động
                4G/5G và điện thoại thông minh(Smartphone) đến từng người dân Việt
                Nam. MobiFone hợp tác cùng Samsung triển khai chương trình nâng cấp
                điện thoại Samsung Galaxy A01 Core giá 2.290.000đ kèm gói cước cho
                các thuê bao MobiFone với giá siêu ưu đãi nay chỉ còn 1.290.000đ.
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
        <div class="col-12">
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
                    <th scope="col">STT</th>
                    <th scope="col">Tên gói</th>
                    <th scope="col">Giá gói</th>
                    <th scope="col">Dung lượng gói</th>
                    <th scope="col">Giá bán lẻ</th>
                    <th scope="col">Giá kèm gói cước</th>
                    <th scope="col">Đăng ký</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Gói cước trải nghiệm TN50</td>
                    <td>0</td>
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
                    <th scope="row">2</th>
                    <td>Gói cước data FF50</td>
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
                    <td>Gói cước Combo 1 FF120</td>
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
                    <th scope="row">1</th>
                    <td>Gói cước Combo 2 FF200</td>
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
    <div class="row faq">
        <div class="col-12">
            <h3>Câu hỏi thường gặp</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    1. Đối tượng tham gia chương trình? <br />
                    <br />
                    Khách hàng là thuê bao MobiFone hiện chỉ đang sử dụng feature
                    phone. + Thuê bao đã hòa mạng trên 1 năm tại thời điểm mua máy. +
                    Chưa từng đăng ký sử dụng gói cước data tính đến thời điểm mua máy
                    (để loại các thuê bao trước đây sử dụng smartphone nay vừa mới đổi
                    sang featurephone).
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    2. Cách để biết mình có thuộc đối tượng không? <br />
                    <br />

                    Anh Chị có thể tự tra cứu, hoặc tra cứu cho người thân tại mục
                    “Tra cứu” trên page; hoặc liên hệ hotline 9090 để được nhân viên
                    MobiFone tư vấn nhanh nhất.
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    3.Mỗi khách hàng có thể mua được bao nhiêu máy : <br /><br />

                    Mỗi khách hàng (CMTND/thẻ căn cước/hộ chiếu) được mua tối đa 01
                    máy có trợ giá khuyến mại. + Khách hàng đăng ký và cam kết sử dụng
                    12 tháng gói cước FF50, FF120 hoặc FF200 tùy theo mức ARPU hiện
                    tại. Khách hàng không thực hiện cam kết sẽ bị khóa máy bằng phần
                    mềm Knox của Samsung.
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    4. Tôi có thể tìm mua máy Samsung A01 Core 2Gb tại đâu?
                    <br /><br />

                    Khách hàng đủ điều kiện có thể tìm mua tại hệ thống cửa hàng trực
                    tiếp của Mobifone trên toàn quốc, qua tư vấn viên Mobifone, tổng
                    đài 9090 hoặc đặt hàng tại page : shop.mobifone.vn
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    5. Tôi có thể đặt mua máy cho người khác được không? <br /><br />

                    Anh Chị có thể tra cứu số điện thoại bạn bè, người thân, sau đó
                    đặt hàng và thanh toán nếu số điện thoại người đó đủ điều kiện
                    tham gia chương trình ạ.
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="content-faq">
                    6. Điện thoại Samsung A01Core 2Gb mua qua chương trình trợ giá của
                    Samsung có được bảo hành bao lâu? <br /><br />

                    Sản phẩm được bảo hành chính hãng 12 tháng tại tất cả các TTBH
                    toàn quốc của Samsung Ngoài ra, khách hàng có thể liên hệ 9090
                    hoặc cửa hàng trực tiếp MobiFone gần nhất để được hỗ trợ.
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
                                <option value="Gói cước trải nghiệm">Gói cước trải nghiệm</option>
                                <option value="Gói cước data smartphone">Gói cước data smartphone</option>
                                <option value="Gói cước combo smartphone 1">Gói cước combo smartphone 1</option>
                                <option value="Gói cước combo smartphone 2">Gói cước combo smartphone 2</option>
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
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">MUA MÁY KÈM GÓI CƯỚC ƯU ĐÃI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
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
                        <th scope="col">STT</th>
                        <th scope="col">Tên gói</th>
                        <th scope="col">Mã gói</th>
                        <th scope="col">Giá gói</th>
                        <th scope="col">Dung lượng gói</th>
                        <th scope="col">Giá bán lẻ</th>
                        <th scope="col">Giá kèm gói cước</th>
                        <th scope="col">Đăng ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Gói cước trải nghiệm</td>
                        <td>TNSP</td>
                        <td>0</td>
                        <td>5GB, hết dung lượng ngắt kết nối</td>
                        <td>2.290.000</td>
                        <td>1.290.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước trải nghiệm')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Gói cước data smartphone</td>
                        <td>SP50, SP50KH , MF50KH</td>
                        <td>50.000</td>
                        <td>5GB, hết dung lượng ngắt kết nối</td>
                        <td>2.290.000</td>
                        <td>1.290.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước data smartphone')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Gói cước combo smartphone 1</td>
                        <td>SP200, SP200KH , MF200KH</td>
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
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước combo smartphone 1')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Gói cước combo smartphone 2</td>
                        <td>SP200, SP200KH , MF200KH</td>
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
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước combo smartphone 2')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal FF2 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">MUA MÁY KÈM GÓI CƯỚC ƯU ĐÃI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
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
                        <th scope="col">STT</th>
                        <th scope="col">Tên gói</th>
                        <th scope="col">Mã gói</th>
                        <th scope="col">Giá gói</th>
                        <th scope="col">Dung lượng gói</th>
                        <th scope="col">Giá bán lẻ</th>
                        <th scope="col">Giá kèm gói cước</th>
                        <th scope="col">Đăng ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Gói cước trải nghiệm</td>
                        <td>TNSP</td>
                        <td>0</td>
                        <td>5GB, hết dung lượng ngắt kết nối</td>
                        <td>2.290.000</td>
                        <td>1.790.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước trải nghiệm')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Gói cước data smartphone</td>
                        <td>SP50, SP50KH , MF50KH</td>
                        <td>50.000</td>
                        <td>5GB, hết dung lượng ngắt kết nối</td>
                        <td>2.290.000</td>
                        <td>1.790.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước data smartphone')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Gói cước combo smartphone 1</td>
                        <td>SP200, SP200KH , MF200KH</td>
                        <td>120.000</td>
                        <td>
                            + Miễn phí cuộc gọi nội mạng dưới 20 phút + 50 phút cuộc gọi
                            ngoại mạng + Data: 1GB/ngày
                        </td>
                        <td>2.290.000</td>
                        <td>1.790.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước combo smartphone 1')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Gói cước combo smartphone 2</td>
                        <td>SP200, SP200KH , MF200KH</td>
                        <td>200.000</td>
                        <td>
                            + Miễn phí cuộc gọi nội mạng dưới 20 phút + 100 phút cuộc gọi
                            ngoại mạng + Data: 2GB/ngày
                        </td>
                        <td>2.290.000</td>
                        <td>1.790.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước combo smartphone 2')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal FF3 -->
<div class="modal fade bd-example-modal-lg" id="modal-FF3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="color: #004ea2;">MUA MÁY KÈM GÓI CƯỚC ƯU ĐÃI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive" style="background-color: #004ea2;">
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
                        <th scope="col">STT</th>
                        <th scope="col">Tên gói</th>
                        <th scope="col">Mã gói</th>
                        <th scope="col">Giá gói</th>
                        <th scope="col">Dung lượng gói</th>
                        <th scope="col">Giá bán lẻ</th>
                        <th scope="col">Giá kèm gói cước</th>
                        <th scope="col">Đăng ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Gói cước trải nghiệm</td>
                        <td>TNSP</td>
                        <td>0</td>
                        <td>5GB, hết dung lượng ngắt kết nối</td>
                        <td>2.290.000</td>
                        <td>1.990.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước trải nghiệm')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Gói cước data smartphone</td>
                        <td>SP50, SP50KH , MF50KH</td>
                        <td>50.000</td>
                        <td>5GB, hết dung lượng ngắt kết nối</td>
                        <td>2.290.000</td>
                        <td>1.990.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước data smartphone')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Gói cước combo smartphone 1</td>
                        <td>SP200, SP200KH , MF200KH</td>
                        <td>120.000</td>
                        <td>
                            + Miễn phí cuộc gọi nội mạng dưới 20 phút + 50 phút cuộc gọi
                            ngoại mạng + Data: 1GB/ngày
                        </td>
                        <td>2.290.000</td>
                        <td>1.990.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước combo smartphone 1')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Gói cước combo smartphone 2</td>
                        <td>SP200, SP200KH , MF200KH</td>
                        <td>200.000</td>
                        <td>
                            + Miễn phí cuộc gọi nội mạng dưới 20 phút + 100 phút cuộc gọi
                            ngoại mạng + Data: 2GB/ngày
                        </td>
                        <td>2.290.000</td>
                        <td>1.990.000</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-warning text-danger font-weight-bold" onClick="actionMuaNgay('Gói cước combo smartphone 2')"
                            >
                                Mua ngay
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
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
