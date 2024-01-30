<style>
      .chat-btn {
        position: fixed;
        bottom: 80px;
        right: 20px;
        background: #c75ba1;
        width: 150px;
        height: 70px;
        color: white;
        padding: 20px;
        cursor: pointer;
        box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }
  
    .chat-btn:hover {
        opacity: 0.8;
    }

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 0px solid #f1f1f1;
  z-index: 9999999;
}


.boxchat {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.boxchat2 {
  border: 2px solid #dedede;
  background-color: #fde9f6;
  border-radius: 5px;
  padding: 5px;
  margin: 2px 0;
}
.boxchat2::after {
  content: "";
  clear: both;
  display: table;
}

.boxchat2 img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.boxchat::after {
  content: "";
  clear: both;
  display: table;
}

.boxchat img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.boxchat img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.chat{
  width: auto;  height: 30%;
}


.inbox_chat { 
  height: 250px; 
  overflow-y: scroll;}
  .inbox_chat2 { 
  height: 150px; 
  overflow-y: scroll;}

  /* .input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
} */
</style>



    <button type="button" class="btn chat-btn "data-toggle="dropdown" aria-haspopup="true" onclick="openForm()" aria-expanded="false">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg>
        ข้อความ 
        <span class="badge badge-light">9</span>
        <span class="sr-only">unread messages</span>
    </button>
    <div class="chat-popup" id="myForm">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">
              <button class="btn btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-bar-expand" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.646 10.146a.5.5 0 0 1 .708 0L8 13.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-4.292a.5.5 0 0 0 .708 0L8 2.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708zM1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8z"/>
                </svg>
              </button>
              <b>ข้อความ</b>
            </h5>
            <button type="button" class="close" onclick="closeForm()">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </button>
          </div>
          {{-- user ที่ส่งchat --}}
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <h5 class="modal-title" id="exampleModalLabel">User</h5>
              <div class="inbox_chat2">
                <div class="container boxchat2">
                  <img src="/new_ui/img/userchattest.png" alt="Avatar" style="width:100%;"class="imgimg">
                  <h5>Kenneth A. Gonzales <span class="time-right"> 
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"style="color:red">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg></span></h5>
                  <p>Test, which is a new approach to have all .....</p>
                  <span class="time-right">11:00</span>
                </div>
                <div class="container boxchat2">
                  <img src="/new_ui/img/userchattest.png" alt="Avatar" style="width:100%;"class="imgimg">
                    <h5>Terry C. Bhakta <span class="time-right"> 
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"style="color:red">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg></span></h5>
                    <p>Test, which is a new approach to have ......</p>
                  <span class="time-right">11:00</span>
                </div>
                <div class="container boxchat2">
                  <img src="/new_ui/img/userchattest.png" alt="Avatar" style="width:100%;"class="imgimg">
                  <h5>Robert M. Barrera  <span class="time-right"> 
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"style="color:red">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg></span></h5>
                  <p>Test, which is a new approach to have .....</p>
                  <span class="time-right">11:00</span>
                </div>
              </div>
            </div>
          </div>
          {{-- จบuser ที่ส่งchat --}}
          <div class="modal-body chat">
            <h5 class="modal-title" id="exampleModalLabel">Kenneth A. Gonzales.</h5>
            <div class="inbox_chat">
              <div class="container boxchat">
                  <img src="/new_ui/img/userchattest.png" alt="Avatar" style="width:100%;"class="imgimg">
                <p>Hello. How are you today?</p>
                <span class="time-right">11:00</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Hey! I'm fine. Thanks for asking!</p>
                <span class="time-left">11:01</span>
              </div>
              <div class="container boxchat">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" style="width:100%;">
                <p>Sweet! So, what do you wanna do today?</p>
                <span class="time-right">11:02</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
              <div class="container boxchat darker">
                <img src="/new_ui/img/userchattest.png" alt="Avatar" class="right" style="width:100%;">
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
              <div class="input-group-append" id="button-addon4">
                <button class="btn btn-outline-secondary" type="button"style="background-color:#c75ba1;">
                  <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"style="color:#fff ">
                    <path fill-rule="evenodd" d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V13a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-1zm5-6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                  </svg>
                </button>
                <button class="btn btn-outline-secondary" type="button"style="background-color:#c75ba1;"><i class="fa fa-paper-plane-o" aria-hidden="true"style="color:#fff;"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



 

<script>   
    function openForm() {
  document.getElementById('myForm').style.display = "block";
}

function closeForm() {
  document.getElementById('myForm').style.display = "none";
}
</script>
