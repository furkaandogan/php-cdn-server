exlineFileUpload = (function () {
    var attrs = {
        cdn: "ex-fileupload-post",
        contentFolder: "ex-fileupload-contentfolder",
        isCross: "ex-fileupload-iscross",
        fileType: "ex-fileupload-filetype",
        thumbContext: "ex-fileupload-thumb",
        compeletedFunc: "ex-fileupload-completed"
    }
    var options = {
        getFile: "http://localhost:11724/GetFile.php",
        post: "http://localhost:11724/FileUpload.php?XDEBUG_SESSION_START=FDBE96F2",//"http://cdn.exlinetr.com/FileUpload.php",
        appId: "",
        contentFolder: "",
        fileType: "",
        isCross: true,
        thumbContext: "",
        pageLoading: function (_options) {
            $.get("", {}).done(function (response) {
                thumbRender(_options, response, undefined);
            })
        },
        completed: function (_options, results, $input) {
            thumbRender(_options, results, $input);
        },
    }

    function thumbRender(_options, results, $input) {
        if (results) {
            var _html = undefined;
            for (var i = 0; i < results.length; i++) {
                if (_html == undefined) {
                    _html = "";
                }
                _html += '<li><i><span>X</span></i> <img src="' + getFileUrl(results[i], 160, 160) + '" /> </li>';
            }
            if (_html) {
                $(_options.thumbContext).append(_html);
            }
        }
    }

    function setInputOptions($input) {
        if ($input) {
            var contentFolder = $input.attr(attrs.contentFolder);
            if (contentFolder) {
                options.contentFolder = contentFolder;
            }
            var isCross = $input.attr(attrs.isCross);
            if (isCross) {
                options.isCross = isCross;
            }
            var fileType = $input.attr(attrs.fileType);
            if (fileType) {
                options.fileType = fileType;
            }
            var thumbContext = $input.attr(attrs.thumbContext);
            if (thumbContext) {
                options.thumbContext = thumbContext;
            }
            var uploaded = $input.attr(attrs.compeletedFunc);
            if (uploaded) {
                options.completed = window[uploaded];
            }

        }
        return options;
    }
    function setUserOptions(_options) {
        if (_options) {
            options = _options;
        }
        return options;
    }
    function load(_options) {
        options = setUserOptions(_options);
        $("[ex-fileupload]").on("change", defualtChange);

    }

    function upload(_opitons, $input) {
        if ($input) {
            var data = new FormData();
            data.append("AppID", _opitons.appId);
            data.append("Content", _opitons.contentFolder);
            data.append("FileType", _opitons.fileType);
            for (var i = 0; i < $input[0].files.length; i++) {

                data.append("image[" + i + "]", $input[0].files[i]);
            }

            $.ajax({
                url: _opitons.post,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                data: data,
                success: function (response) {
                    console.log(_opitons);
                    _opitons.completed(_opitons, response, $input);
                },
                error: function (er) {
                    alert(er);
                }
            });
        }
    }

    function defualtChange() {
        $this = $(this);
        _options = options;
        if ($this) {
            var _options = setInputOptions($this);
        }
        upload(_options, $this);
    }

    function getFileUrl(path, w, h) {
        return options.getFile + "?FilePath=" + path + "&w=" + w + "&h=" + h;
    }

    return {
        load: function (options) {
            load(options);
            $(".exUploadContent .uploadElement").click(function () {
                $this = $(this);
                if ($this) {
                    $fileInput = $($this.parent().find(".fileInput"));
                    if ($fileInput) {
                        $fileInput.click();
                    }
                }
            });
        },
        thumbRender: function (_options, results, $input) {
            thumbRender(_options, results, $input);
        },
        getFileUrl: function (path, width, heigth) {
            return getFileUrl(path, width, heigth);
        }
    }

})();
