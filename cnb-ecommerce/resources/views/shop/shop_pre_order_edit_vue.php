<div id="app" class="row">
	<div class="col-12">
		<div class="d-flex flex-column flex-fill  p-4 position-relative" style="background-color: #fafafa;">
			<div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
				<label for="inputText" class="col-lg-2 col-md-2 col-12">ชื่อ</label>
				<div class="col-lg-9 col-md-9 col-12">
					<input type="text" v-model="option1" class="form-control titleTable" name="option1">
				</div>
			</div>
			<div v-for="(data,key) in dis1">
				<div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left rowDeleteOptionSelect">
					<label for="inputText" class="col-lg-2 col-md-2 col-12">
						<span v-if="key==0">ตัวเลือก</span>
					</label>

					<div class="col-lg-9 col-md-9 col-12">
						<input type="text" name="" v-model="dis1[key]" :id="key" class="form-control updateTable dis1" :name="'dis1['+key+']'">
					</div>
					<div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">
						<button @click="delOption1(key)" class="btn btn-danger btn-sm" type="button" v-if="key>0">
							<i type="button" class="fa fa-trash-o"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="form-group d-lg-flex d-md-flex">
				<label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
				<div class="col-lg-9 col-md-9 col-12">
					<button @click="addOption1" class="btn btn-outline-primary form-control" style="border-style: dashed;" type="button">
						<i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก-1
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mt-4">
		<div class="d-flex flex-column flex-fill  p-4 position-relative" style="background-color: #fafafa;">
			<div class="form-group d-lg-flex d-md-flex  text-lg-right text-md-right text-left">
				<label for="inputText" class="col-lg-2 col-md-2 col-12">ชื่อ</label>
				<div class="col-lg-9 col-md-9 col-12">
					<input type="text" v-model="option2" class="form-control titleTable" name="option2">
				</div>
			</div>
			<div v-for="(data,key) in dis2">
				<div class="form-group d-lg-flex d-md-flex text-lg-right text-md-right text-left rowDeleteOptionSelect">
					<label for="inputText" class="col-lg-2 col-md-2 col-12">
						<span v-if="key==0">ตัวเลือก</span>
					</label>

					<div class="col-lg-9 col-md-9 col-12">
						<input type="text" name="" v-model="dis2[key]" :id="key" class="form-control updateTable dis2" :name="'dis2['+key+']'">
					</div>
					<div class="col-lg-1 col-md-1 col-12 d-flex align-items-center">
						<button @click="delOption2(key)" class="btn btn-danger btn-sm" type="button" v-if="key>0">
							<i type="button" class="fa fa-trash-o"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="form-group d-lg-flex d-md-flex">
				<label for="inputText" class="col-lg-2 col-md-2 col-12"></label>
				<div class="col-lg-9 col-md-9 col-12">
					<button @click="addOption2" class="btn btn-outline-primary form-control" style="border-style: dashed;" type="button">
						<i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มตัวเลือก-2
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 mt-4">
		<div class="d-flex flex-column flex-fill  px-lg-4 px-md-4 px-2 py-lg-4 py-md-4 py-4 position-relative" style="background-color: #fafafa;">
			<div class="col-12">
				<h5><strong>SKU</strong></h5>
			</div>
			<div class="col-12">
				<div class="row ">
					<div class="col-12 mt-2">
						<table class="table">
							<thead>
								<tr>
									<td>{{ option1 }}</td>
									<td>{{ option2 }}</td>
									<td>SKU</td>
								</tr>
							</thead>
							<tbody>
								<template v-for="(data_loop,key_loop) in dis1">
									<template v-for="(data_loop2,key_loop2) in dis2">
										<tr>
											<td>{{ dis1[key_loop] }}</td>
											<td>{{ dis2[key_loop2] }}</td>
											<td>
												<input type="text" class="form-control" v-model="sku[0][key_loop][key_loop2][key_loop2]" :name="'sku['+((key_loop*dis2.length)+key_loop2)+']'">
											</td>
										</tr>
									</template>
								</template>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mt-4" v-for="(data,key) in datetime">
		<div class="d-flex flex-column flex-fill  px-lg-4 px-md-4 px-2 py-lg-4 py-md-4 py-4 position-relative" style="background-color: #fafafa;">
			<div class="position-absolute" style="right: 10px; top: 5px;">
				<i class="fa fa-times" style="cursor: pointer;" aria-hidden="true" v-if="key > 0" @click="delDatetime(key)"></i>
			</div>
			<div class="col-12">
				<h5><strong>ช่วงเวลาที่ {{key+1}}</strong></h5>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label :for="'date-start-'+key" class="col-form-label"><strong class="text-main">วันเริ่มต้น</strong></label>
							<input type="date" class="form-control" :id="'date-start-'+key" :name="'data['+key+'][start_date]'" v-model="datetime[key].start_date">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label :for="'date-end-'+key" class="col-form-label"><strong class="text-main">วันสิ้นสุด</strong></label>
							<input type="date" class="form-control" :id="'date-end-'+key" :name="'data['+key+'][end_date]'" v-model="datetime[key].end_date">
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row ">
					<div class="col-12 mt-2">
						<table class="table">
							<thead>
								<tr>
									<td>{{ option1 }}</td>
									<td>{{ option2 }}</td>
									<td>ราคา</td>
									<td>คลัง</td>
								</tr>
							</thead>
							<tbody>
								<template v-for="(data_loop,key_loop) in datetime[key].price">
									<template v-for="(data_loop2,key_loop2) in data_loop">
										<tr>
											<td>{{ dis1[key_loop] }}</td>
											<td>{{ dis2[key_loop2] }}</td>
											<td>
												<input type="number" v-model="datetime[key].price[key_loop][key_loop2][key_loop2]" :name="'data['+key+'][price]['+((key_loop*data_loop.length)+key_loop2)+']'" class="form-control">
											</td>
											<td>
												<input type="number" v-model="datetime[key].stock[key_loop][key_loop2][key_loop2]" :name="'data['+key+'][stock]['+((key_loop*data_loop.length)+key_loop2)+']'" class="form-control">
											</td>
										</tr>
									</template>
								</template>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="form-group row">
			<div class="col-12">
				<button type="button" @click="addDatetime" class="btn btn-outline-primary form-control" style="border-style: dashed;">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มช่วงเวลา
				</button>
			</div>
		</div>
	</div>



</div>