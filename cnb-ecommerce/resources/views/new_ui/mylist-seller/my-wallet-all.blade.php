<div class="col-12 px-0">
				<table class="table-bordered">
					<thead>
						<tr>
							<th scope="col" class="width200 p-4 text-left"><strong>วันที่</strong></th>
							<th scope="col" class="width200 text-left"><strong>รายละเอียด</strong></th>
							<th scope="col" class="width200 text-left"><strong>จำนวนเงิน</strong></th>
							<th scope="col" class="width200 text-left"><strong>สถานะ</strong></th>
						</tr>
					</thead>
					<tbody>
@for ($i = 0; $i < 30; $i++)
						<tr>
							<td scope="row" data-label="วันที่">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0"><strong>01/06/2563 09:00</strong></h6>
									</div>
								</div>
							</td>
							<td data-label="รายละเอียด">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0 text-dots"><strong>รายรับ</strong></h6>
									</div>
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0" style="color: #919191;">Basics by sita | A224 - One เสื้อผ้าแฟชั่นสไตล์เกาหลีน่ารักๆ สินค้า</h6>
									</div>
								</div>
							</td>
							<td data-label="จำนวนเงิน" class="text-lg-left text-md-right text-sm-right">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0"><strong style="color: #23c197;">+ 1,250</strong></h6>
									</div>
								</div>
							</td>
							<td data-label="สถานะ">
								<div class="row">
									<div class="col-12 mb-2 text-lg-left text-md-right text-sm-right">
										<h6 class="mb-0"><strong>สำเร็จแล้ว</strong></h6>
									</div>
								</div>
							</td>
						</tr>
@endfor
					</tbody>
				</table>
			</div>