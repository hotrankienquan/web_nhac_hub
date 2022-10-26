<?php 
  include('../includes/connect.php');
  $bool = "";
//   $bool = false;
  if(isset($_POST['insert_song_input'])) {
    $name_song = $_POST['name_song'];
    $artists_names = $_POST['artists_names'];
    $performer = $_POST['performer'];
    $url_song =  $_FILES['file']['name'];
    $url_song_tmp = $_FILES['file']['tmp_name'];
    $file_up_name = time().$url_song;

    $anh1 = $_FILES['anh1']['name'];
    $anh1_tmp = $_FILES['anh1']['tmp_name'];
    var_dump($name_song, $artists_names);
    if( !($name_song == "" || $artists_names == "" ||  $url_song == "" ||  $performer == "" || $anh1 == "")){
      move_uploaded_file($anh1_tmp,"./upload/$anh1");
      move_uploaded_file($url_song_tmp,"./upload/song_upload/$url_song");
      // insert query
      $insert_song = "insert into `song` (name_song, artists_names, performer, url_song,image1,date) values ('$name_song','$artists_names','$performer','$url_song','$anh1',NOW())";
      $result_query = mysqli_query($conn,$insert_song );
      if($result_query) {
        $bool = "success";
      }
    } else {
        $bool = "fail";
    }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product</title>
    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../assets/css/style_upload.css">
</head>

<body>
    <div class="container">
        <h1>Thêm bài hát</h1>
        <form action="insert_song.php" method="post" enctype="multipart/form-data">
            <div class="form-group mx-auto">
                <label for="">Tên bài hát</label>
                <input type="text" name="name_song" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    style="width:50%;">

                <label for="">Tên nhạc sĩ</label>
                <input type="text" name="artists_names" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" style="width:50%;">

                <label for="">Trình bày</label>
                <input type="text" name="performer" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    style="width:50%;">



                <label for="">File nhạc</label>
                <!-- <input type="file" name="url_song" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;" /> -->

                <div class="wrapper">
                    <header>File Uploader JavaScript</header>

                    <input class="file-input" type="file" name="file">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Browse File to Upload</p>

                    <section class="progress-area"></section>
                    <section class="uploaded-area"></section>
                </div>

                <!-- ảnh  -->

                <div class="form-group">
                    <label for="">Ảnh 1</label>
                    <input type="file" class="form-control-file" name="anh1" id="" placeholder=""
                        aria-describedby="fileHelpId">
                </div>

            </div>
            <!-- <input type="submit" value="gửi"> -->
            <input name="insert_song_input" id="" class="btn btn-primary" type="submit" value="gửi lên">
        </form>
        <br />
        <a href="index.php">come back to admin page</a>
        <div id="toast"></div>
        <!--  -->

        <!--  -->
    </div>
    </div>
    <!-- js bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script> -->
    <script>
    const form = document.querySelector("form"),
        fileInput = document.querySelector(".file-input"),
        progressArea = document.querySelector(".progress-area"),
        uploadedArea = document.querySelector(".uploaded-area");

    // form.addEventListener("click", () =>{
    //   fileInput.click();
    // });

    fileInput.onchange = ({
        target
    }) => {
        let file = target.files[0];
        if (file) {
            let fileName = file.name;
            if (fileName.length >= 12) {
                let splitName = fileName.split('.');
                fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
            }
            uploadFile(fileName);
        }
    }

    function uploadFile(name) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "insert_song.php");
        xhr.upload.addEventListener("progress", ({
            loaded,
            total
        }) => {
            let fileLoaded = Math.floor((loaded / total) * 100);

            let fileTotal = Math.floor(total / 1000);
            let fileSize;
            (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) +
                " MB";
            let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
            uploadedArea.classList.add("onprogress");
            progressArea.innerHTML = progressHTML;
            if (loaded == total) {
                progressArea.innerHTML = "";
                let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
                uploadedArea.classList.remove("onprogress");
                uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
            }
        });
        let data = new FormData(form);
        xhr.send(data);
    }

    function toast({
        title = '',
        message = '',
        type = 'info',
        duration = 3000
    }) {
        const main = document.getElementById('toast');
        if (main) {
            const toast = document.createElement('div');

            // Auto remove toast
            const autoRemoveId = setTimeout(function() {
                main.removeChild(toast);
            }, duration + 1000);

            // Remove toast when clicked
            toast.onclick = function(e) {
                if (e.target.closest('.toast__close')) {
                    main.removeChild(toast);
                    clearTimeout(autoRemoveId);
                }
            };

            const icons = {
                success: 'fas fa-check-circle',
                info: 'fas fa-info-circle',
                warning: 'fas fa-exclamation-circle',
                error: 'fas fa-exclamation-circle'
            };
            const icon = icons[type];
            const delay = (duration / 1000).toFixed(2);

            toast.classList.add('toast', `toast--${type}`);
            toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

            toast.innerHTML = `
                        <div class='toast__icon'>
                            <i class='${icon}'></i>
                        </div>
                        <div class='toast__body'>
                            <h3 class='toast__title'>${title}</h3>
                            <p class='toast__msg'>${message}</p>
                        </div>
                        <div class='toast__close'>
                            <i class='fas fa-times'></i>
                        </div>
                    `;
            main.appendChild(toast); // chen` vao main
        }
    }

    function showSuccessToast() {
        toast({
            title: 'Thành công!',
            message: 'Bạn đã thêm nhạc thành công.',
            type: 'success',
            duration: 5000
        });
    }

    function showErrorToast() {
        toast({
            title: "Thất bại!",
            message: "Vui lòng nhập lại.",
            type: "error",
            duration: 5000
        });
    }

    function showInfoToast() {
        toast({
            title: "Chào mừng",
            message: "HEHEHEHE.",
            type: "info",
            duration: 5000
        });
    }

    let bool = "<?php echo($bool); ?>";
    console.log(bool);

    if (bool === "success") {
        showSuccessToast();
    } else if (bool === "fail") {
        showErrorToast();
    } else {
        showInfoToast();
    }
    </script>
</body>

</html>