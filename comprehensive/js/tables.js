let theEditor;
var table;
$(document).ready(function () {
	//editor
	ClassicEditor.create(document.querySelector('#add_editor'), {
			// 這裡可以設定 plugin
		})
		.then(editor => {
			console.log('Editor was initialized', editor);
			theEditor = editor;
		})
		.catch(err => {
			console.error(err.stack);
		});
	//Popover
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	})

	//datatable 
	table = $("#myDataTalbe").DataTable({
		/*language: {
			url: "<?php echo base_url('/comprehensive/js/zh_Hant.json') ?>"
		},
		dom:
		    "<'row'<'col-sm-12't>>" +
		    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
		`l`表示長度，左上角的改變每頁顯示條數控件
		  `f`代表過濾，過濾搜索框控件
		  `t`代表表格，表格
		  `i`代表信息，左下角的表格信息顯示控件
		  `p`代表分頁，右下角的分頁控件
		  `r`代表處理，表格中間的數據加載等待提示框控件
		  `B`代表按鈕，Datatables可以提供左上按鈕，默認顯示在角*/
		//searching: true,//false關閉filter功能
		//slengthMenu:false;
		//lengthMenu: [5, 10], // 選單值設定
		pageLength: 10, // 初期每頁列數
		ordering: true, //表列顯示是否欄位排序
		//Paginate: false, // 是否換頁
		paging: true, //下拉式X筆資料
		info: true, // 顯示情報
		order: [0, 'desc']
		//fixedHeader: true, // 標題置頂
		//columnDefs: [{targets: [8], orderable: false }]//規定某列不排序
	});
	$('#search2').on('click', function () {
		table.
		column(0).search(document.getElementById("aa").value).
		column(1).search(document.getElementById("bb").value).
		column(2).search(document.getElementById("cc").value).draw();
	});
	$('#re2').on('click', function () {
		document.getElementById("aa").value = "";
		document.getElementById("bb").value = "";
		document.getElementById("cc").value = "";
		table.
		column(0).search("").
		column(1).search("").
		column(2).search("").draw();
	});
	
	$("#add_btn").click(function () {
		
		//table.draw();
		document.getElementById("add").reset();
		theEditor.setData('');
		$("#add").removeAttr('action');
		$("#add").attr('action', 'http://127.0.0.1:8080/front_page/index.php/test/add_text');
	});
	$("#send").click(function () {
		table.draw();
	});
	$("#del").click(function () {
		alert("1");
		$.ajax({
			type: "GET",
			url: "http://127.0.0.1:8080/front_page/index.php/test/tables"+30,

			//dataType: "text",
			success: function () {
				
				table.draw();
			}
		})
		alert("3");
	});
});

//svg image
feather.replace()


//success,warning,error,info,input
//document.getElementById("delete").addEventListener("click",
//編輯文章連結
function edit_btn($id, $title, $slug, $text) {
	document.getElementById("form_id").value = $id;
	document.getElementById("add_title_text").value = $title;
	document.getElementById("add_number").value = $slug;
	theEditor.setData($text);
	//$("#add").attr('action', 'http://127.0.0.1:8080/front_page/index.php/test/edit_text');
}
//前端刪除資料庫文章
function delete2($id) {
	swal({
			title: "確定刪除嗎",
			text: "將無法恢復該文件",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "確認",
			cancelButtonText: '取消',
			closeOnConfirm: false
		},
		function () {
			alert("2");
			//window.alert($id);
			swal("刪除!", "內容已刪除完畢", "success");
			//window.location.href = "http://127.0.0.1:8080/front_page/index.php/test/detext/" + $id;
			
		});
}
