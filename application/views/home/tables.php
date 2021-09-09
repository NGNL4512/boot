<title>SB Admin 2 - Tables</title>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<h1 class="h3 mb-2 text-gray-800">條件搜尋</h1>
			<div class="row">
				<div class="input-group text-gray-900">
					<div class="col">
						<label for="aa"><b>序號</b></label>
						<input type="text" name="aa" id="aa" class="form-control form-control-user"
							placeholder="請輸入關鍵字">
					</div>
					<div class="col">
						<label for="bb"><b>標題搜尋</b></label>
						<input type="text" name="bb" id="bb" class="form-control form-control-user"
							placeholder="請輸入關鍵字">
					</div>
					<div class="col">
						<label for="cc"><b>文章內容搜尋</b></label>
						<input type="text" name="cc" id="cc" class="form-control form-control-user"
							placeholder="請輸入關鍵字">
					</div>
					<div class="col">
						<button class="btn btn-datatable btn-icon btn-transparent-dark btn-primary btn-lg"
							id="search2"><i data-feather="search"></i>搜尋</button>
						<button class="btn btn-datatable btn-icon btn-transparent-dark btn-primary btn-lg" id="re2"><i
								data-feather="book"></i>重製</button>
					</div>
				</div>
			</div>
			<br>
			<?php if ($slug == 0) {?>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-datatable btn-icon btn-transparent-dark btn-primary btn-sm"
				data-toggle="modal" data-target="#staticBackdrop" id="add_btn"><i
					data-feather="plus-square"></i>增加文章</button>
			<br><br>
			<?php }?>
			<div class="table-responsive">
				<table id="myDataTalbe" class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>序號</th>
							<th>標題</th>
							<th>文章</th>
							<?php if ($slug == 0) {?>
							<th>編號</th>
							<th>操作</th>
							<?php }?>
						</tr>
					</thead>
					<?php $i = 0;
foreach ($news as $news_item):
    $i++;?>
									<tr>
										<td><?php echo $i ?></td>
										<td><?php echo $news_item["title"] ?></td>
										<td><?php echo $news_item["text"] ?></td>
										<?php if ($slug == 0) {?>
										<td><?php echo $news_item["slug"] ?></td>
										<td>
											<?php
    $title = $news_item["title"];
        $slug2 = $news_item["slug"];
        $text = strip_tags($news_item["text"]); //清除標籤，要想出有標籤的傳遞方式
        ?>
											<button type="button"
												class="btn btn-datatable btn-icon btn-transparent-dark btn-primary btn-sm"
												data-toggle="modal" data-target="#staticBackdrop" id="edit_btn"
												onclick=edit_btn(<?php echo $news_item["id"] ?>,"<?php echo $title ?>","<?php echo $slug2 ?>","<?php echo $text ?>")><i
													data-feather="edit"></i>編輯
											</button>
											<button class="btn btn-datatable btn-icon btn-transparent-dark btn-danger btn-sm"
												type="button" id="del" onclick=delete2(<?php echo $news_item["id"] ?>)><i
													data-feather="trash-2"></i>刪除</button>
										</td>
										<?php }?>
									</tr>
									<?php endforeach?>
				</table>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>


<form action="" method="post" id="add">
	<!-- Modal -->

	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">文章</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="text" id="form_id" name="form_id" value="" hidden>
					<label for="add_title_text"><b>標題</b></label>
					<input type="text" name="add_title_text" id="add_title_text" class="form-control form-control-user"
						value="" placeholder="編輯標題">
					<label for="add_number"><b>編號</b></label>
					<input type="text" name="add_number" id="add_number" class="form-control form-control-user" value=""
						placeholder="編輯編號">
					<div>
						<textarea id="add_editor" name="add_text"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
					<button type="submit" class="btn btn-primary" id="send">存檔並發布</button>
				</div>
			</div>
		</div>
	</div>
	</from>
	<!-- End of Main Content -->
