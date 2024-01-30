<div class="modal modal-left fade modal-custom" id="left_modal_cate" tabindex="-1" role="dialog" aria-labelledby="left_modal_sm" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>หมวดหมู่ทั้งหมด</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times" aria-hidden="true" style="color: #000;"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
          <div class="row">
            <div class="col-12 px-0">
              <?php
                if (isset($category_all)) {
                  if (!isset($i_category_id)) {
                    $i_category_id = '';
                  }
                  foreach ($category_all as $value) {
                    if( $value->category_id == $i_category_id ) {
                ?>
                  <p><strong><i class="fa fa-circle" style="font-size: 8px;" aria-hidden="true"></i> <?php echo $value->category_name; ?></strong></p>
                <?php
                    } else {
                ?>
                  <a href="{{ url('product/category/'.$value->category_id) }}" class="text-white"><p style="color: #7D7D7D;"><?php echo $value->category_name; ?></p></a>
                <?php
                    }
                  }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-left fade modal-custom" id="left_modal_advanced" tabindex="-1" role="dialog" aria-labelledby="left_modal_sm" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong><i class="fa fa-filter" aria-hidden="true"></i> ค้นหาแบบละเอียด</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times" aria-hidden="true" style="color: #000;"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
          <div class="row">
            <div class="col-12 px-0 mb-3">
              <div class="row">
                <div class="col-6">
                  <p class="mb-0"><strong>ราคา</strong></p>
                </div>
                <div class="col-6 text-right">
                  <p class="mb-0"><strong style="color: #02A2D4; text-decoration: underline;">ล้างค่า</strong></p>
                </div>
              </div>
            </div>
            <div class="col-12 px-0 d-flex justify-content-between mb-3">
              <input type="number" class="form-control search-adv" placeholder="Min" style="background-color: #F9F9F9; border-color: #F9F9F9;">
              <p class="mb-0 px-2 d-flex align-items-center">-</p>
              <input type="number" class="form-control search-adv" placeholder="Max" style="background-color: #F9F9F9; border-color: #F9F9F9;">
            </div>
            <div class="col-12 px-0 mb-3">
              <div class="row">
                <div class="col-12 mb-2">
                  <p class="mb-0"><strong>เรทติ้งสินค้า</strong></p>
                </div>
                <div class="col-12">
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                    <label class="form-check-label" for="exampleRadios1">
                      <p class="mb-0" style="font-size: 18px !important; color: #B5B5B5;"><span style="color: #FFC107;">★★★★★</span></p>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      <p class="mb-0" style="font-size: 18px !important; color: #B5B5B5;"><span style="color: #FFC107;">★★★★</span>★ ขึ้นไป</p>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                    <label class="form-check-label" for="exampleRadios3">
                      <p class="mb-0" style="font-size: 18px !important; color: #B5B5B5;"><span style="color: #FFC107;">★★★</span>★★ ขึ้นไป</p>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option2">
                    <label class="form-check-label" for="exampleRadios4">
                      <p class="mb-0" style="font-size: 18px !important; color: #B5B5B5;"><span style="color: #FFC107;">★★</span>★★★ ขึ้นไป</p>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option2">
                    <label class="form-check-label" for="exampleRadios5">
                      <p class="mb-0" style="font-size: 18px !important; color: #B5B5B5;"><span style="color: #FFC107;">★</span>★★★★ ขึ้นไป</p>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 px-0 mb-3">
              <div class="row">
                <div class="col-12 mb-2">
                  <p class="mb-0"><strong>โปรโมชั่น</strong></p>
                </div>
                <div class="col-12">
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      <p class="mb-0"><strong>ส่งฟรี</strong></p>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                      <p class="mb-0"><strong>ส่วนลด</strong></p>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 px-0">
              <button class="btn form-control" style="background-color: #343A40; color: #fff; border-radius: 12px;">ค้นหา</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>