<!-- cancel modal -->
<div class="modal fade" id="cancelmodal3" tabindex="-1" role="dialog" aria-labelledby="cancel_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:350px">
        <div class="modal-content shadow-sm rounded border-0">
            <div class="modal-header border-0">
                <h6 class="modal-title black" id="cancel_modalLabel">ยกเลิกคำสั่งซื้อ</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="black" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="send_cancel" action="">

                    @csrf
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="inv_id" id="inv_id2">
                    </div>
                    <div class="rol-12">
                        <div class="form-group">
                            <label for="typeSelect" class="black">ประเภทของการยกเลิก</label>
                            <select class="form-control" id="typeSelect" name="typeSelect">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="note" class="black">รายละเอียด</label>
                            <textarea class="form-control" id="note2" name="note" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="pic" class="black">ภาพประกอบ</label>
                            <input type="file" class="form-control-file" id="pic2" name="pic">
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-grey" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- cancel detail modal -->
