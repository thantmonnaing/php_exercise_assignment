
$(document).ready(function(){
		getdata();
		count();
		// alert("OK");
		$(".add_to_card").click(function(){
			var id = $(this).data('id');
			var codeno = $(this).data('codeno');
			var name = $(this).data('name');
			var photo = $(this).data('photo');
			var price = $(this).data('price');
			var discount = $(this).data('discount');

			var qty = 1;				
			var status = false;
			var item = {
				id:id,
				name:name,
				codeno:codeno,
				photo:photo,
				price:price	,
				discount:discount,
				qty:qty				
			}

				var item_arr;
				var item_list = localStorage.getItem('items');
				if(item_list == null){
					item_arr = [];
				}else{
					item_arr = JSON.parse(item_list);
				}
				$.each(item_arr,function(i,v){
					if(v.id == id){
						v.qty++;
						status = true;
					}
				})
				if(!status){
					item_arr.push(item);
				}
				var item_string = JSON.stringify(item_arr);
				localStorage.setItem('items',item_string);
				getdata();
				count();
			
		})

		$("#tbody").on('click','.btn_remove',function(){
				var id = $(this).data('id');
				var item_list = localStorage.getItem('items');
				var item_arr = JSON.parse(item_list);
				item_arr.splice(id,1);

				var arr_string = JSON.stringify(item_arr);
				localStorage.setItem('items',arr_string);

				getdata();
				count();
			})

		$("#tbody").on('click','.btn_increase',function(){
				var id = $(this).data('id');
				var item_list = localStorage.getItem('items');
				var item_arr = JSON.parse(item_list);
				item_arr[id].qty++;

				var arr_string = JSON.stringify(item_arr);
				localStorage.setItem('items',arr_string);

				getdata();
				count();

			})

			$("#tbody").on('click','.btn_decrease',function(){
				var id = $(this).data('id');
				var item_list = localStorage.getItem('items');
				var item_arr = JSON.parse(item_list);
				if(item_arr[id].qty > 1){
					item_arr[id].qty--;
				}else{
					item_arr.splice(id,1);
				}				
				
				var arr_string = JSON.stringify(item_arr);
				localStorage.setItem('items',arr_string);

				getdata();
				count();

			})

		function getdata(){
				var item_arr,html="";
				var total = 0;
				var subtotal = 0;
				var item_list = localStorage.getItem('items');
				if(item_list == null){
					item_arr = [];
				}else{
					item_arr = JSON.parse(item_list);
				}

				$.each(item_arr,function(index,value){
					var discount = '';
					total = value.price * value.qty;
					subtotal+= total;	
					if(value.discount != ''){
						discount = value.discount + 'Ks';
					}				
					html+=`
					<tr>
						<td colspan='3' class='text-center'><button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
									<i class="icofont-close-line"></i> 
								</button> </td>						
						<td><img src='${value.photo}' style='width:100px;height:100px;'></td>
						<td>${value.name}<br><br>${value.codeno}</td>						
						<td><button class="btn btn-outline-secondary btn_increase mr-5" data-id="${index}">+</button>${value.qty}<button class="btn btn-outline-secondary btn_decrease mx-5" data-id="${index}">-</button></td>
						<td><span class="text-danger">${discount}</span><br><br><del>${value.price} Ks</del></td>
						<td>${total} Ks</td>
					</tr>
					`;
				})

				
				var s_total = 'Total : '+subtotal + 'Ks';
				$("#cart_total").html(s_total);

				$("#tbody").html(html);
			}

			function count(){
				var item_arr;
				var total = 0;
				var subtotal = 0;
				var item_list = localStorage.getItem('items');
				if(item_list){
					item_arr = JSON.parse(item_list);
					$.each(item_arr,function(i,v){
						total+=v.qty;
						subtotal+=(v.price * v.qty);
					})					
				}
				var s_total = subtotal + "Ks";
				$("#total").html(s_total);
				$(".cartNoti").html(total);
			}



			$(".checkoutbtn").on('click',function(){
				
				var note = $("#notes").val();
				var items = localStorage.getItem('items');
				var items_arr = JSON.parse(items);

				var total = 0;
				var subtotal = 0;
				$.each(items_arr,function(i,v){
					total+=v.qty;
					subtotal+=(v.price * v.qty);
				})

				$.post('storeorder.php',{
					cart: items_arr,
					notes: note,
					total: subtotal
				},function(response){
					localStorage.clear();					
					location.href="ordersuccess.php";
				});	
				count();
			})


			$('.orderDetail').click(function(){

				var id = $(this).data('id');
				var orderdate = $(this).data('orderdate');
				var voucherno = $(this).data('voucherno');
				var total = $(this).data('total');
				var status = $(this).data('status');

				console.log(id);		

				$.post('getorderdetail.php',{
					id: id,
				},function(response){
					console.log(response);

					var orderdetails = JSON.parse(response); 

					var shoppingcartData='';

					shoppingcartData +=`<div>`;

					$.each(orderdetails,function (i,v) 
					{
						var id = v.id;
						var codeno = v.codeno;
						var name = v.name;
						var unitprice = v.price;
						var discount = v.discount;
						var photo = v.photo;
						var qty = v.qty;

						if (discount) {
							var price = discount;
						}
						else{
							var price = unitprice;
						}
						var subtotal = price * qty;

						shoppingcartData += `<tr> 
						<td> 
						<img src="${photo}" class="cartImg">
						</td>
						<td>
						<p> ${name} </p>
						<p> ${codeno} </p>
						</td>
						<td>
						<p> ${qty} </p>
						</td>
						<td>`; 
						if (discount > 0) {
							shoppingcartData += `<p class="text-danger"> 
							${discount} Ks
							</p>
							<p class="font-weight-lighter">
							<del> ${unitprice} Ks </del>
							</p>
							`;
						}
						else{
							shoppingcartData += `<p class="text-danger"> 
							${unitprice} Ks
							</p>`;
						}

						shoppingcartData+=`</td>
						<td> 
						<p> ${subtotal} Ks </p> 
						</td>
						</tr>`;
						total += subtotal ++;
					});

					$('#orderDetail').html(shoppingcartData);

				});

				$('#invoiceNo').html(voucherno);
				$('#dateNo').html(orderdate);

				if (status == "Order") {
					statusBadge = '<h5> <span class="badge badge-warning">'+status+'</span> </h5>';
					$('#orderStatus').html(statusBadge);
				}
				else if (status == "Confirm") {
					statusBadge = '<h5> <span class="badge badge-success">'+status+'</span> </h5>';
					$('#orderStatus').html(statusBadge);
				}
				else if (status == "Delete") {
					statusBadge = '<h5> <span class="badge badge-danger">'+status+'</span> </h5>';
					$('#orderStatus').html(statusBadge);
				}
				else{
					statusBadge = '<h5> <span class="badge badge-primary">'+status+'</span> </h5>';
					$('#orderStatus').html(statusBadge);
				}
				$('#invoiceTotal').html(total);
				$('#orderTotal').html(total);


				$('#detailModal').modal('show');

			});



			$('.profile_editBtn').show();
			$('.profile_cancelBtn').hide();

			$('.profile_editBtn').on('click', function(){
				$("fieldset").removeAttr("disabled");
				$("#imageUpload").removeAttr("disabled");

				$('.profile_editBtn').hide();
				$('.profile_cancelBtn').show();

			});

			$('.profile_cancelBtn').on('click', function(){
				$('#imageUpload').prop('disabled', true);
				$('fieldset').prop('disabled', true);


				$('.profile_editBtn').show();
				$('.profile_cancelBtn').hide();

			});

			function readURL(input){
				if (input.files[0]){
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#imagePreview').css('background-image', 'url('+e.target.result +')');
						$('#imagePreview').hide();
						$('#imagePreview').fadeIn(650);
					}
					reader.readAsDataURL(input.files[0]);
					console.log('preivew');
				}
				console.log(input.files);
			}
			$("#imageUpload").change(function() {
				readURL(this);
			});


			$('#inputPassword').change(function ()
			{
				var password=$(this).val();
				console.log(password.length);

				if(password.length > 8)
				{
					$('#error').html(`<span class="text-danger">* Password shouldn't exceed eight digit</span>`);
				}
			});


			$('#inputConfirmPassword').change(function () 
			{
				var cpassword = $(this).val();
				var password = $("#inputPassword").val();


				if(password!=cpassword)
				{
					$('#cerror').html(`<span class="text-danger">* Confirm Password don't match!</span>`);
				}
				else{
					$('#cerror').html();
					$('#cerror').html(`<span class="text-success">* Confirm Password match!</span>`);

				}
			});

	})




				