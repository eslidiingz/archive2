<!-- cancel modal -->
<div class="modal fade" id="ratingmodal" tabindex="-1" role="dialog" aria-labelledby="rating_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:350px">
        <div class="modal-content shadow-sm rounded border-0">
            <div class="modal-header border-0">
                <h6 class="modal-title black" id="rating_modalLabel">ให้คะแนนสินค้า</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="black" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('rating') }}">
                    @csrf
                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="invs_id" id="invs_id">
                        <input type="text" class="form-control" name="shop_id" id="shop_id">
                        <input type="text" class="form-control" name="user_id" id="user_id">
                        <input type="text" class="form-control" name="product_id" id="product_id">
                        <input type="text" class="form-control" name="date" id="date">
                        <input type="text" class="form-control" name="status" id="status">
                    </div>
                    <div class="form-group" hidden>
                    </div>
                    <div class="rol-12">
                        <div class="form-group">
                            <label for="typeSelect" class="black">คะแนน</label>
                            <select class="form-control" id="score" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="note" class="black">ความคิดเห็น</label>
                            <textarea class="form-control" id="note" name="comment" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="pic" class="black">ภาพประกอบ</label>
                            <input type="file" class="form-control-file" id="pic" name="picture">
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
