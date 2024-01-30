
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="page-wrapper">
            <div id="body">
                <div class="row">
                    <div id="chat-circle" class="btn btn-raised">
                        <svg width="1em"  viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                        </svg>
                        <div id="chat-overlay"></div>

                    </div>

                    <div class="chat-box-messenger">
                        <div class="chat-box-messenger-header">
                            Chat
                            <span class="chat-box-messenger-toggle">
                                <i>×</i>
                            </span>
                        </div>
                        <div class="chat-box-messenger-body">
                            <div class="chat-box-messenger-overlay">
                            </div>
                            <div class="img-message">
                                <!-- img chat log -->
                            </div>
                            <div class="chat-logs">
                                <!--chat-log -->
                            </div>

                        </div>
                        <div class="chat-input">
                            <form class="form-message" method="post" action="">
                                <input type="text" id="chat-input" class="form-control chat-input" placeholder="Send a message...">
                                <label for="file-upload" class="chat-image chat-img-submit">
                                    <i class="fa fa-image" aria-hidden="true"></i>
                                </label>
                                <input id="file-upload"  type="file" accept="image/png,image/gif,image/jpeg"/>

                                <button type="submit" class="chat-submit fa fa-send" id="chat-submit"onclick="chat();"></button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

<script>
    var res_imgs; //value image in tag up load file
    $(function() {
        var INDEX = 0;
        if (INDEX === 0) {
            generate_message("สวัสดีชาว shop สามารถติดต่อสอบถามได้เลยคะ", "user");
        }
        $("#chat-submit").click(function(e) {
            e.preventDefault();
            var msg = $("#chat-input").val();
            if (msg.trim() == '') {
                return false;
            }
            generate_message(msg, 'self');
            var buttons = [{
                    name: 'Existing User',
                    value: 'existing'
                },
                {
                    name: 'New User',
                    value: 'new'
                }
            ];
            // setTimeout(function() {
            //     generate_message(msg, 'user');
            // }, 1000)

        })

        function generate_message(msg, type) {
            INDEX++;
            var str = "";
            str += "<div id='cm-msg-" + INDEX + "' class=\"chat-msg " + type + "\">";
            str += "          <svg width='1em' hight='1em' viewBox='0 0 16 16' class='bi bi-person-circle msg-avatar' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>";
            str += "            <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z'/>";
            str += "            <path fill-rule='evenodd' d='M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>";
            str += "            <path fill-rule='evenodd' d='M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z'/>";
            str += "          </svg>";
            str += "          <div class=\"cm-msg-text\">";
            str += check_image();
            str += msg;
            str += "          <\/div>";
            str += "<\/div>";

            str = wordWrap(str, 30);
            $(".chat-logs").append(str);
            $("#cm-msg-" + INDEX).hide().fadeIn(300);
            if (type == 'self') {
                $("#chat-input").val("");
            }
            $(".chat-logs").stop().animate({
                scrollTop: $(".chat-logs")[0].scrollHeight
            }, 1000);
            console.log(msg);
            console.log(type);
            console.log(INDEX);

        }

        function wordWrap(str, maxWidth) {
            var newLineStr = "\n";
            done = false;
            res = '';
            while (str.length > maxWidth) {
                found = false;
                // Inserts new line at first whitespace of the line
                for (i = maxWidth - 1; i >= 0; i--) {
                    if (testWhite(str.charAt(i))) {
                        res = res + [str.slice(0, i), newLineStr].join('');
                        str = str.slice(i + 1);
                        found = true;
                        break;
                    }
                }
                // Inserts new line at maxWidth position, the word is too long to wrap
                if (!found) {
                    res += [str.slice(0, maxWidth), newLineStr].join('');
                    str = str.slice(maxWidth);
                }

            }

            return res + str;
        }

        function testWhite(x) {
            var white = new RegExp(/^\s$/);
            return white.test(x.charAt(0));
        };
        // function generate_button_message(msg, buttons) {
        //     /* Buttons should be object array
        //       [
        //         {
        //           name: 'Existing User',
        //           value: 'existing'
        //         },
        //         {
        //           name: 'New User',
        //           value: 'new'
        //         }
        //       ]
        //     */
        //     INDEX++;
        //     var btn_obj = buttons.map(function(button) {
        //         return "              <li class=\"button\"><a href=\"javascript:;\" class=\"btn btn-primary chat-btn\" chat-value=\"" + button.value + "\">" + button.name + "<\/a><\/li>";
        //     }).join('');
        //     var str = "";
        //     str += "<div id='cm-msg-" + INDEX + "' class=\"chat-msg user\">";
        //     str += "          <span class=\"msg-avatar\">";
        //     str += "            <img src=\"https:\/\/image.crisp.im\/avatar\/operator\/196af8cc-f6ad-4ef7-afd1-c45d5231387c\/240\/?1483361727745\">";
        //     str += "          <\/span>";
        //     str += "          <div class=\"cm-msg-text\">";
        //     str += msg;
        //     str += "          <\/div>";
        //     str += "          <div class=\"cm-msg-button\">";
        //     str += "            <ul>";
        //     str += btn_obj;
        //     str += "            <\/ul>";
        //     str += "          <\/div>";
        //     str += "        <\/div>";
        //     $(".chat-logs").append(str);
        //     $("#cm-msg-" + INDEX).hide().fadeIn(300);
        //     $(".chat-logs").stop().animate({
        //         scrollTop: $(".chat-logs")[0].scrollHeight
        //     }, 1000);
        //     $("#chat-input").attr("disabled", true);
        // }

        $(document).delegate(".chat-btn", "click", function() {
            var value = $(this).attr("chat-value");
            var name = $(this).html();
            $("#chat-input").attr("disabled", false);
            generate_message(name, 'self');
        })

        $("#chat-circle").click(function() {
            $("#chat-circle").toggle('scale');
            $(".chat-box-messenger").toggle('scale');
        })

        $(".chat-box-messenger-toggle").click(function() {
            $("#chat-circle").toggle('scale');
            $(".chat-box-messenger").toggle('scale');
        })

        function check_image() {
            $("#file-upload").on("change", function() {
                var file = $("#file-upload").val();
                // console.log("on change value = " + file);
                $("#chat-input").val(file);
                readURL(this);
            });

            if ($("#file-upload").val() != "") {
                var file = $("#file-upload").val();
                var text = "<img id='frame_preview' class='frame_preview' src='" + res_imgs + "' />";

                $("#file-upload").val("");
                console.log("value upload " + file);
                console.log("value image " + res_imgs);
                console.log("if image");
                return text;
            } else {
                return "";
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // $("#frame_preview").attr("src", e.target.result);
                    // console.log("Hi mark" + e.target.result);
                    res_imgs = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
            return res_imgs;
        }

    });

    function chat() {
    var chat_input = $("#chat-input").val();
    // console.log('#############input : ' + chat_input);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
            type: 'POST',
            
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data:{
                "data":chat_input
            },
            url: "{{route('send-message')}}",
            success: function(respones){
             console.log(respones);
            // console.log("chat-input : "+chat_input);
         }
        });
}



    // $("#file-upload").on("change click", function() {
    //     var file = $("#file-upload").val();
    //     console.log("on change value = " + file);
    //     $("#chat-input").val(file);

    //     // var fd = new FormData();
    //     // var files = $('#file-upload')[0].files[0];
    //     // fd.append('file', files);
    //     // $.ajax({
    //     //     url: config.base_url + 'test/api/test_api/uploadFile',
    //     //     type: 'post',
    //     //     data: fd,
    //     //     contentType: false,
    //     //     processData: false,
    //     //     success: function(response) {
    //     //         if (response != 0) {
    //     //             alert('file uploaded');
    //     //         } else {
    //     //             alert('file not uploaded');
    //     //         }
    //     //     },
    //     // });

    // });
</script>
<style>
    #chat-circle {
        position: fixed;
        bottom: 70px;
        right: 50px;
        background: #c75ba1;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        color: white;
        padding: 20px;
        cursor: pointer;
        box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);

    }

    #chat-circle:hover {
        opacity: 0.8;
    }

    #file-upload{
        visibility: hidden;
    }
    /* .btn#my-btn {
        background: white;
        padding-top: 13px;
        padding-bottom: 12px;
        border-radius: 45px;
        padding-right: 40px;
        padding-left: 40px;
        color: #5865C3;
    } */

    #chat-overlay {
        background: rgba(255, 255, 255, 0.1);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: none;
    }



    .chat-box-messenger {
        display: none;
        background: #efefef;
        position: fixed;
        right: 30px;
        bottom: 50px;
        width: 350px;
        max-width: 85vw;
        max-height: 100vh;
        border-radius: 5px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        /*   box-shadow: 0px 5px 35px 9px #464a92; */
        box-shadow: 0px 5px 35px 9px #ccc;
        z-index: 20;
    }

    .chat-box-messenger-toggle {
        float: right;
        margin-right: 15px;
        cursor: pointer;
    }

    .chat-box-messenger-header {
        background: #c75ba1;
        height: 55px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        color: white;
        text-align: center;
        font-size: 20px;
        padding-top: 12px;
        z-index: 20;
    }

    .chat-box-messenger-body {
        position: relative;
        height: 370px;
        height: auto;
        border: 1px solid #ccc;
        overflow: hidden;

    }

    .chat-box-messenger-body:after {
        content: "";
        /* background-image: url(' '); */
        opacity: 0.1;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        height: 100%;
        position: absolute;
        z-index: -1;
    }

    #chat-input {
        background: #f4f7f9;
        width: 100%;
        width: calc(100% - 80px);
        position: relative;
        height: 47px;
        padding-top: 10px;
        padding-right: 50px;
        padding-bottom: 10px;
        padding-left: 15px;
        border: none;
        resize: none;
        outline: none;
        border: 1px solid #ccc;
        color: #888;
        border-top: none;
        border-bottom-right-radius: 30px;
        border-bottom-left-radius: 30px;
        border-top-right-radius: 30px;
        /* border-top-left-radius: 10px; */
        overflow: hidden;
    }

    .chat-input>form {
        margin-bottom: 0;
    }

    .form-message {
        background-color: #FFFFFF;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        height: 46px;
        /* border-top-left-radius: 10px;    */
    }

    .chat-submit {
        position: absolute;
        right: 10px;
        background: transparent;
        box-shadow: none;
        border: none;
        border-radius: 50%;
        color: #c75ba1;
        width: 35px;
        height: 27px;
        margin-top: 5px;
        opacity: 1;
        bottom: 10px;
    }

    .fa-send {
        padding-right: 10px;
    }



    .chat-submit:hover {
        cursor: pointer;
        opacity: 0.5;
    }

    .chat-img-submit {

        opacity: 1;
    }

    .chat-img-submit:hover {
        cursor: pointer;
        opacity: 0.5;
    }

    .fa fa-send:hover {
        background-color: #c75ba1;
    }

    /* .fa-send:hover {
        color: #FFFFFF;
    } */


    .chat-image {
        position: absolute;
        right: 30px;
        background: transparent;
        box-shadow: none;
        border: none;
        border-radius: 50%;
        color: #c75ba1;
        width: 35px;
        bottom: 5px;
    }


    .chat-logs {
        padding: 15px;
        height: 370px;
        overflow-y: auto;
    }

    .chat-logs::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    .chat-logs::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    .chat-logs::-webkit-scrollbar-thumb {
        background-color: #c75ba1;
    }

     @media only screen and (max-width: 500px) {
        #chat-circle {
            transform: scale(0.6);
            right: 5px;
        }
    }

    @media only screen and (max-width: 500px) {
        .chat-box-messenger {
            transform: scale(0.6);
        }
    }



    .chat-msg.user>.msg-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        float: left;
        width: 15%;
    }

    .chat-msg.self>.msg-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        float: right;
        width: 15%;
    }

    .cm-msg-text {
        background: white;
        padding: 10px 15px 10px 15px;
        color: #666;
        /* max-width: 75%; */
        /* width: 50px; */
        float: left;
        margin-left: 10px;
        position: relative;
        margin-bottom: 20px;
        border-radius: 30px;
    }

    .chat-msg {
        clear: both;
    }

    .chat-msg.self>.cm-msg-text {
        float: right;
        margin-right: 10px;
        background: #c75ba1;
        color: white;
    }

    .cm-msg-button>ul>li {
        list-style: none;
        float: left;
        width: 50%;
    }

    .cm-msg-button {
        clear: both;
        margin-bottom: 70px;
    }
     .frame_preview {
        width: 100px;
        height: 100px;
        background: white;
    }
</style>
