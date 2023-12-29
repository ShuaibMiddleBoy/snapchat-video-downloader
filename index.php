<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snapchat Video Downloader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./script.js" defer></script>
    <link rel="stylesheet" href="./style.css">
    <style>
        
@media screen and (max-width: 700px) {
    body{
        background-color: red;
    }
    .snapchat-container .snapchat-row h1 {
        font-size: 20px;
    }

    .snapchat-container .snapchat-row p {
        font-size: 16px!important;
    }
 
.downloadBtns span{
    font-size: 15px;
}
.snapchat-search-url input:first-child{
    font-size: 13px;
}
.snapchat-search-url input:last-child{
    font-size: 12px;
    font-weight: 600;
}
.snapchat-download-row .social-buttons{
    margin-top: 20px;
    display: flex;
    gap: 10px;
}
.snapchat-download-row .social-buttons .fa-brands, 
.snapchat-download-row .social-buttons .fa-envelope{
    width: 30px;
    height: 30px;
}

}
@media screen and (max-width: 580px) {

    .snapchat-download-row{
    width: 80%;
    margin:30px auto;
    display: flex;
    flex-direction:column;
gap: 50px;

}
.snapchat-download-row video{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    width: 35%;
    border-radius: 5px;
    background-color: yellow;
}
.snapchat-container .snapchat-row{
width: 95%;
}
.snapchat-search-url input:last-child{
    width: 80px;
    height: 45px;
    font-size: 14px;
    font-weight: 600;
}
.snapchat-download-row{
gap: 30px;

}

}

@media screen and (max-width: 440px) {
    .snapchat-search-url input:last-child{
    width: 80px;
    height: 35px;
    font-size: 12px;
    font-weight: 600;
}
.snapchat-search-url input:first-child{
    height: 35px;
    font-size:11px
}
.snapchat-download-row .downloadBtn{
    width: 100%;
    height: 35px;

}
.snapchat-download-row .social-buttons .fa-brands, 
.snapchat-download-row .social-buttons .fa-envelope{
    width: 25px;
    height: 25px;
}
.snapchat-download-row .downloadBtn span{
    font-size:12px
}
.snapchat-container .snapchat-row h1 {
        font-size: 28px;
    }

    .snapchat-container .snapchat-row p {
        font-size: 14px!important;
    }
 
}
    </style>
</head>

<body>
    
    <div class="snapchat-container">
        <div class="snapchat-row">
                <h1>SNAPCHAT VIDEO DOWNLOADER</h1>
                <p>Experience Snapchat like never before with our high-quality video downloader. Download, share, and relive your favorite moments effortlessly.</p>
                <div class="snapchat-search-url">
                    <form action="" method="post">
                        <div class="snapchat-search-row">
                            <div class="col-md-6 offset-md-3">
                                <div class="input-group">
                                    <input type="text" name="search_url" id="search_url" class="form-control" placeholder="Enter Video URL Here">
                                    <input type="submit" name="submit" value='SUBMIT' class="btn btn-warning">
                                </div>
                            </div>
             
                    </form>
                </div>
                </div>
        </div>
        </div>
                <?php
if (isset($_POST['submit'])) {
    $url = $_POST['search_url'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://download-snapchat-video-spotlight-online.p.rapidapi.com/download?url=" . urlencode($url),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: download-snapchat-video-spotlight-online.p.rapidapi.com",
            "X-RapidAPI-Key: f702e6a434mshb5f93baf522d66dp14726bjsn307cf1171679"
        ],
    ]);


    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response);
    }
}
?>

            <div class="snapchat-download-row">
                    <?php if (isset($data->story->mediaUrl)){ ?>
                
                        <video class="elementor-video" src="<?= $data->story->mediaUrl ?>" controls="" preload="metadata" controlslist="nodownload" __idm_id__="188417"></video>
     
                        <div class='downloadBtns'>
                        <a class="downloadBtn" href="<?= $data->story->mediaUrl ?>" target="_blank">
                            <span>Download Video</span>
                        </a>

                        <a class="downloadBtn" href="download.php?action=pdownload&type=video&url=<?= urlencode($data->story->mediaUrl) ?>">
                            <span class="elementor-button-text">Download Force Video</span>
                        </a>

                                                <!-- Social Sharing Buttons -->
            <div class="social-buttons">
                <a class="social-btn" href="https://www.facebook.com/sharer/sharer.php?u=<?= $data->story->mediaUrl ?>" target="_blank">
                <i class="fa-brands fa-facebook-f fb"></i>
                </a>
                <a class="social-btn" href="https://api.whatsapp.com/send?text=<?= urlencode('Check out this Snapchat video: ' . $data->story->mediaUrl) ?>" target="_blank">
                <i class="fa-brands fa-whatsapp whatsapp"></i>
</a>
                <a class="social-btn" href="https://twitter.com/intent/tweet?url=<?= $data->story->mediaUrl ?>" target="_blank">
                <i class="fa-brands fa-twitter twitter"></i>
                </a>
                <a class="social-btn" href="mailto:?subject=Check%20out%20this%20Snapchat%20video&body=I%20found%20an%20interesting%20Snapchat%20video:%20<?= $data->story->mediaUrl ?>">
                <i class="fa-regular fa-envelope email"></i>
</a>
                <a class="social-btn" href="https://t.me/share/url?url=<?= $data->story->mediaUrl ?>&text=<?= urlencode('Check out this Snapchat video') ?>" target="_blank">
                <i class="fa-brands fa-telegram telegram"></i>
                </a>
            </div>
                        </div>


                    <?php } elseif(isset($data->message)){ ?>
                        <div class="alert alert-warning">
                            <?= $data->message ?>
                        </div>

                    <?php } ?>
                
            </div>



</body>

</html>