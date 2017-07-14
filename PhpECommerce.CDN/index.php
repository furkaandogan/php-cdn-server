<html>
<head>
    <title>Exlinetr CDN Server v1</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <h2>Exlinetr CDN Server v1</h2>
    <form enctype="multipart/form-data" method="post" action="FileUpload.php">
        <input type="hidden" name="AppID" value="TestUploadApplication" />
        <input type="hidden" name="Content" value="Test" />
        <input type="hidden" name="FileType" value="Images" />
        <input type="file" name="image[]" multiple accept="image/*" />
        <input type="submit" value="Upload" />
    </form>

    <style type="text/css">
        .exUploadContent {
            position: relative;
            border: 1px solid #f2f2f2;
            min-height: 300px;
            min-width: 300px;
            max-height: 300px;
            max-width: 300px;
            box-shadow: 0px 0px 60px #f2f2f2 inset;
            max-height: 90%;
            max-width: 90%;
            margin: auto;
        }

            .exUploadContent .fileInput {
                display: none;
            }

            .exUploadContent img {
                width: 100%;
                height: 100%;
                opacity: .1;
                background: url("/Source/Images/uploadImage.png");
                border: 0;
                background-repeat: no-repeat;
                background-position: center 150px;
            }

            .exUploadContent .thumb {
                position: absolute;
                width: 100%;
                opacity: 1;
                position: absolute;
                width: 100%;
                opacity: 1;
                bottom: 1;
            }

                .exUploadContent .thumb ul {
                    float: left;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    max-height: 350px;
                    overflow-y: scroll;
                    overflow-x: hidden;
                }

                    .exUploadContent .thumb ul li {
                        position: relative;
                        width: 160px;
                        height: 160px;
                        float: left;
                        margin: 5px;
                        overflow: hidden;
                        border: 1px solid #F2F2F2;
                        border-radius: 5px;
                    }

                        .exUploadContent .thumb ul li i {
                            padding: 5px;
                            color: white;
                            font-size: 12px;
                            position: absolute;
                            float: right;
                            background-color: #F52222;
                            cursor: pointer;
                            font-family: arial;
                        }

                        .exUploadContent .thumb ul li img {
                            width: 100%;
                            height: 100%;
                            float: left;
                            margin: 5px;
                            opacity: 1;
                            background: url("/Source/Images/loading.gif");
                            background-position: center center;
                            background-size: contain;
                            margin: 0;
                        }
    </style>
    <script type="text/javascript">
        exlineFileUpload = (function () {
            var attrs = {
                cdn: "ex-fileupload-post"
            }
            var options = {
                post: "",
                isCross: true,

            }
            function load(options) {
                $("[ex-fileupload]").on("change", defualtChange());

            }

            function defualtChange() {
                $this = $(this);
                if ($this) {
                    setOptionsByFileElement($this);
                }
            }

            function setOptionsByFileElement($element) {

                var postAddres = $this.attr(attrs.cdn);
                if (postAddres) {
                    options.post = postAddres;
                }
            }

            return {

                load: function (options) {
                    load(options);
                }

            }

        })();

        $(document).ready(function () {
            $(".exUploadContent .uploadElement").click(function () {
                $this = $(this);
                if ($this) {
                    $fileInput = $($this.parent().find(".fileInput"));
                    if ($fileInput) {
                        $fileInput.click();
                    }
                }
            });
        });

    </script>
    <div class="exUploadContent">
        <img class="uploadElement" />
        <div class="thumb">
            <ul>
                <?php 
                for ($i = 0; $i < 15; $i++)
                {
                    echo '<li>
                    <i><span>X</span></i>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9kw6hxEqNn5YS4MHMOf1fTsuu_0EOfIf0qeV_diYJPjdpXlIZ" />
                </li>
                <li>
                    <i><span>X</span></i>
                    <img src="http://www.blackenterprise.com/files/2011/04/BusinessProfileFace.jpg" />
                </li>
                <li>
                    <i><span>X</span></i>
                    <img src="http://www.yerliteknoloji.net/wp-content/uploads/2015/12/ask-whatsapp.jpg" />
                </li>';
                    
                    
                } ?>
            </ul>
        </div>
        <input class="fileInput" ex-fileupload ex-fileupload-post="" type="file" accept="image/*" />
    </div>

</body>
</html>


