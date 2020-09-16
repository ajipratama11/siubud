$(document).ready(function () {
	var baseUrl = $("#baseUrl").data("url");
	$(".datatable").DataTable();
	$(".select2").select2();
	$(".datepicker").datepicker({
		format: "yyyy/mm/dd",
	});
	$("button[type='reset']").click(function () {
		$(".select2").val(null).trigger("change");
	});
	$(".custom-file-input").on("change", function () {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	$(".submitConfirm").submit(function (e) {
		var id = $(this).attr("id");
		e.preventDefault();
		swal(
			{
				title: "Validasi Judul",
				text: "Apakah anda yakin untuk memvalidasi tugas akhir ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Perbarui",
				closeOnConfirm: false,
			},
			function () {
				$("#" + id)
					.unbind("submit")
					.submit();
			}
		);
	});
	$(".confirm").click(function (e) {
		e.preventDefault();
		var url = $(this).attr("href");
		swal(
			{
				title: "Data Akan Dihapus",
				text: "Apakah anda yakin untuk menghapus data ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Hapus",
				closeOnConfirm: false,
			},
			function () {
				window.location = url;
			}
		);
	});
	$(".openModal").click(function (e) {
		e.preventDefault();
		var url = $(this).attr("href");
		$.ajax({
			url: url,
			success: function (data) {
				$(".place-modal").html(data);
				$(".modalJS").modal("show");
			},
		});
	});
	function setHarga(thisParam) {
		var thisVal = thisParam.find(":selected").data("idr");
		var target = thisParam.data("target");
		$(target).val(thisVal);
	}
	$(".setHarga").change(function () {
		setHarga($(this));
	});
	$(".addDetail").click(function (e) {
		e.preventDefault();
		var url = $(this).attr("href");
		var counting = parseInt($(".loop-detail").attr("data-counting"));
		counting++;

		$.ajax({
			url: url,
			method: "get",
			data: { counting: counting },
			success: function (data) {
				$(".loop-detail").append(data);
				$(".loop-detail").attr("data-counting", counting);
				$(".removeField").click(function (e) {
					e.preventDefault();
					var target = $(this).data("target");
					counting--;
					$(".loop-detail").attr("data-counting", counting);
					$(".detail-field[data-id='" + target + "']").remove();
					getTotal();
				});
				$(".select2").select2();
				$(".qtyHarga").keyup(function () {
					qtyHarga($(this));
				});
				$(".setHarga").change(function () {
					setHarga($(this));
				});
			},
		});
	});
	function qtyHarga(thisParam) {
		var id = "#" + thisParam.attr("id");
		var parent = thisParam.data("parent");
		var subtotal = thisParam.data("subtotal");

		var thisVal = parseInt($(id).val());
		thisVal = isNaN(thisVal) ? 0 : thisVal;
		var parentVal = parseInt($(parent).val());
		var subtotalVal = thisVal * parentVal;
		subtotalVal = isNaN(subtotalVal) ? thisVal : subtotalVal;
		$(subtotal).val(subtotalVal);
		getTotal();
	}
	function getTotal() {
		var total = 0;
		$(".subtotal").each(function () {
			total = total + parseInt($(this).val());
		});
		$("#total").html(rupiah(total));
	}
	$(".qtyHarga").keyup(function () {
		qtyHarga($(this));
	});

	function rupiah(nominal) {
		var reverse = nominal.toString().split("").reverse().join(""),
			ribuan = reverse.match(/\d{1,3}/g);
		ribuan = ribuan.join(".").split("").reverse().join("");

		// Cetak hasil
		return ribuan;
	}
});
