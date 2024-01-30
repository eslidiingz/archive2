<!-- Modal -->
<div class="modal fade" id="Wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" method="get" action="addwallet">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>เติมเงินวอลเลต</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 px-0">
          <input type="number" class="form-control" id="addWallet" name="wallet" placeholder="ใส่จำนวนเงิน">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-c75ba1 form-control" disabled="" id="btnSubmitAddWallet">ดำเนินการต่อ</button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('.modal#Wallet form #addWallet').on('keypress change keyup',function(){
        wallet = $(this).val();
        // console.log("wallet", wallet);
        if(wallet > 0){
          $('#btnSubmitAddWallet').prop('disabled',false);
        }else{
          $('#btnSubmitAddWallet').prop('disabled',true);
        }
      });
      $('#btnSubmitAddWallet').on('click',function(){
        $(this).parents('.modal#Wallet').find('form').submit();
      });
    });
</script>
