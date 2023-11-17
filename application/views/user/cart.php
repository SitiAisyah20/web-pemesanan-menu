<div class="hero_area">
    <div class="bg-box">
      <img src="<?php echo base_url('assets/images/footer.png');?>" alt="">
    </div>
     <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="<?php echo site_url('user');?>">
            <span>
              Wedangan Lodji
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user');?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user/menu');?>">Menu<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user/about');?>">About</a>
              </li>
            </ul>
            <div class="user_option">
              <a class="cart_link" href="<?php echo site_url('user/cart');?>">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
    <!-- end header section -->
    <br><br><br>
	<!-- Include jQuery library -->
	<script src="<?php echo base_url('assets/user/js/jquery-3.3.1.min.js'); ?>"></script>
	<script>
	function updateCartItem(obj, rowid){
		$.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
			if(resp == 'ok'){
				location.reload();
			}else{
				alert('Cart update failed, please try again.');
			}
		});
	}
	</script>
  <!-- Shop Cart Section Begin -->
      <section class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th style="width:20%"></th>
                                  <th style="width:25%">Menu</th>
                                  <th style="width:10%">Price</th>
                                  <th style="width:10%">Quantity</th>
                                  <th style="width:10%">Total</th>
                                  <th style="width:5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
                                <tr>
                                  <td>
                                    <?php $imageURL = !empty($item["image"])?base_url('uploads/'.$item["image"]):base_url('uploads/'); ?>
                                    <img src="<?php echo $imageURL; ?>" alt="" style="height: 100px; width: 100px;">
                                  </td>
                                  <td>
                                    <h6><?php echo $item["name"]; ?></h6>
                                  </td>
                                  <td>
                                    <?php echo 'Rp.'.$item["price"]; ?>
                                  </td>
                                  <td>
                                    <input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" 
                                    onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
                                  </td>
                                  <td>
                                    <?php echo 'Rp.'.$item["subtotal"]; ?>
                                  </td>
                                  <td>
                                    <button type="button" class="close" aria-label="Close" onclick="return confirm
                                    ('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>'
                                    :false;">
                                    <span aria-hidden="true">&times;</span>
                                    </button><i class="itrash">
                                  </td>                                    
                                    <?php } }else{ ?>
                                      <tr>
                                        <td colspan="6">
                                          <p>Your cart is empty.....</p>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                  <a href="<?php echo site_url('user/menu');?>">Continue Order</a>
                </div>
              </div>
              <div class="col-lg-4 offset-lg-2">
                <?php if($this->cart->total_items() > 0){ ?>
                  <div class="cart__total__procced">
                    <h6 style="text-align: center;">Cart total</h6><br>
                    <ul>
                      <li>Total <span><strong><?php echo 'Rp.'.$this->cart->total(); ?></strong></span></li>
                    </ul>
                    <a href="<?php echo site_url('user/checkout');?>" class="primary-btn">Proceed to checkout</a>
                  </div>
                <?php } ?>
              </div>
            </div>
        </div>
      </section>
    <!-- Shop Cart Section End -->

    
